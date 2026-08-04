<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('customer_group/model_customer_group');
		$this->load->model('customer_group/model_customer_group_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		$this->path_upload = FCPATH.'uploads/customer_group/';
		
		if($this->session->userdata('session_login') != true) {
			redirect(site_url());
		}
	}
	
	public function index() {
		
		/* start header, menu */
		$data['title'] = $this->model_template_main->get_title_menu();
		$data['active'] = $this->model_template_main->get_active_menu();
		$data['sub_menu_active'] = $this->model_template_main->get_active_sub_menu();
		$data['row_user'] = $this->model_template_main->get_user_single();
		$data['department'] = $this->model_template_main->get_department_single();
		$data['rows_menu'] = $this->model_template_main->get_menu_list();
		$data['rows_sub_menu'] = $this->model_template_main->get_sub_menu_list();
		
		$this->load->view('template_main/template_main/header', $data);
		$this->load->view('template_main/template_main/menu_sidebar', $data);
		/* end header, menu */
		
		/* start body */
		$this->load->view('customer_group/customer_group/list', $data);
		/* end body */
	}
	
	public function server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_customer_group_datatable->customer_group_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_customer_group->get_data_single($id);

		$data['category1'] = $this->model_customer_group->getCategory1();
		
		/* start header, menu */
		$data['title'] = $this->model_template_main->get_title_menu();
		$data['active'] = $this->model_template_main->get_active_menu();
		$data['sub_menu_active'] = $this->model_template_main->get_active_sub_menu();
		$data['row_user'] = $this->model_template_main->get_user_single();
		$data['department'] = $this->model_template_main->get_department_single();
		$data['rows_menu'] = $this->model_template_main->get_menu_list();
		$data['rows_sub_menu'] = $this->model_template_main->get_sub_menu_list();
		
		$this->load->view('template_main/template_main/header', $data);
		$this->load->view('template_main/template_main/menu_sidebar', $data);
		/* end header, menu */
		
		$this->load->view('customer_group/customer_group/form', $data);
	}
	
	public function save_update($id = ''){	
		$data = array(
			'customer_group_name_th' =>  $this->input->post('customer_group_name_th'),
			'customer_group_name_en' =>  $this->input->post('customer_group_name_en'),
			'customer_group_description_th' =>  $this->input->post('customer_group_description_th'),
			'customer_group_description_en' =>  $this->input->post('customer_group_description_en'),
			'customer_group_datetime_update' => date('Y-m-d H:i:s')
		);
		
		if(!empty($_FILES['customer_group_icon'])) {
			$config['upload_path']          = FCPATH.'uploads/customer_group/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('customer_group_icon')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/customer_group/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/customer_group/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 200;
				$config_resize['height'] = 200;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['customer_group_icon'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		if($id != '') {	
			$this->model_customer_group->update_data($data, $id);

			$customer_group_id = $id;
		// insert
		} else {	
			$data['customer_group_datetime_create'] = date('Y-m-d H:i:s');
				
			$this->model_customer_group->insert_data($data);
			
			$customer_group = $this->model_customer_group->getCustomerGroupIDLasted();

			if(!empty($customer_group)) {
				$customer_group_id = $customer_group->customer_group_id;
			}
		}

		$product_id = $this->input->post('product_id');

		if(!empty($product_id)) {
			$where = array(
				'customer_group_id' => $customer_group_id
			);

			$this->db->delete('ci_map_customer_group', $where);

			foreach($product_id as $p) {
				$data = array(
					'customer_group_id' => $customer_group_id,
					'product_id' => $p,
					'map_customer_group_datetime_create' => date('Y-m-d H:i:s')
				);

				$this->db->insert('ci_map_customer_group', $data);
			}
		}

		redirect('customer_group/backend/index', 'location');
	}
	
	public function delete($id){
		$this->model_customer_group->delete_data($id);

		redirect('customer_group/backend/index','location');
	} 
}
?>