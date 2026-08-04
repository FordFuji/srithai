<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('shipping_price/model_shipping_price');
		//$this->load->model('shipping_price/model_shipping_price_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		$this->path_upload = FCPATH.'uploads/shipping_price/';
		
		if($this->session->userdata('session_login') != true) {
			redirect(site_url());
		}
	}
	
	public function index() {
		$data['row'] = $this->model_shipping_price->get_data_single();
		$data['row2'] = $this->model_shipping_price->get_data_single2();
		
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
		$this->load->view('shipping_price/shipping_price/form', $data);
		/* end body */
	}
	
	/*public function server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_shipping_price_datatable->shipping_price_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_shipping_price->get_data_single($id);
		
		/* start header, menu */
		/*$data['title'] = $this->model_template_main->get_title_menu();
		$data['active'] = $this->model_template_main->get_active_menu();
		$data['sub_menu_active'] = $this->model_template_main->get_active_sub_menu();
		$data['row_user'] = $this->model_template_main->get_user_single();
		$data['department'] = $this->model_template_main->get_department_single();
		$data['rows_menu'] = $this->model_template_main->get_menu_list();
		$data['rows_sub_menu'] = $this->model_template_main->get_sub_menu_list();
		
		$this->load->view('template_main/template_main/header', $data);
		$this->load->view('template_main/template_main/menu_sidebar', $data);
		/* end header, menu */
		
		/*$this->load->view('shipping_price/shipping_price/form', $data);
	}*/
	
	public function save_update($id = ''){	
		$data = array(
			'shipping_price_1000' =>  $this->input->post('shipping_price_1000'),
			'shipping_price_1000_1999' =>  $this->input->post('shipping_price_1000_1999'),
			'shipping_price_2000_2999' =>  $this->input->post('shipping_price_2000_2999'),
			'shipping_price_3000_3999' =>  $this->input->post('shipping_price_3000_3999'),
			'shipping_price_4000_4999' =>  $this->input->post('shipping_price_4000_4999'),
			'shipping_price_5000_5999' =>  $this->input->post('shipping_price_5000_5999'),
			'shipping_price_6000_6999' =>  $this->input->post('shipping_price_6000_6999'),
			'shipping_price_7000_7999' =>  $this->input->post('shipping_price_7000_7999'),
			'shipping_price_8000_8999' =>  $this->input->post('shipping_price_8000_8999'),
			'shipping_price_9000_9999' =>  $this->input->post('shipping_price_9000_9999'),
			'shipping_price_10000_10999' =>  $this->input->post('shipping_price_10000_10999'),
			'shipping_price_11000_11999' =>  $this->input->post('shipping_price_11000_11999'),
			'shipping_price_12000_12999' =>  $this->input->post('shipping_price_12000_12999'),
			'shipping_price_13000_13999' =>  $this->input->post('shipping_price_13000_13999'),
			'shipping_price_14000_14999' =>  $this->input->post('shipping_price_14000_14999'),
			'shipping_price_15000_15999' =>  $this->input->post('shipping_price_15000_15999'),
			'shipping_price_16000_16999' =>  $this->input->post('shipping_price_16000_16999'),
			'shipping_price_17000_17999' =>  $this->input->post('shipping_price_17000_17999'),
			'shipping_price_18000_18999' =>  $this->input->post('shipping_price_18000_18999'),
			'shipping_price_19000_19999' =>  $this->input->post('shipping_price_19000_19999'),
			//'shipping_price_20000_100000000' =>  $this->input->post('shipping_price_20000_100000000'), 
			'shipping_price_datetime_create' => date('Y-m-d H:i:s'),
			'shipping_price_datetime_update' => date('Y-m-d H:i:s')
		);
		
		/*if(!empty($_FILES['shipping_price_image'])) {
			$config['upload_path']          = FCPATH.'uploads/shipping_price/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('shipping_price_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/shipping_price/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/shipping_price/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 520;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['shipping_price_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}*/
		
		// update 
		//if($id != '') {	
			$this->model_shipping_price->update_data($data, 1);

			$data = array(
				'shipping_price_1000' =>  $this->input->post('shipping_price_1000_2'),
				'shipping_price_1000_1999' =>  $this->input->post('shipping_price_1000_1999_2'),
				'shipping_price_2000_2999' =>  $this->input->post('shipping_price_2000_2999_2'),
				'shipping_price_3000_3999' =>  $this->input->post('shipping_price_3000_3999_2'),
				'shipping_price_4000_4999' =>  $this->input->post('shipping_price_4000_4999_2'),
				'shipping_price_5000_5999' =>  $this->input->post('shipping_price_5000_5999_2'),
				'shipping_price_6000_6999' =>  $this->input->post('shipping_price_6000_6999_2'),
				'shipping_price_7000_7999' =>  $this->input->post('shipping_price_7000_7999_2'),
				'shipping_price_8000_8999' =>  $this->input->post('shipping_price_8000_8999_2'),
				'shipping_price_9000_9999' =>  $this->input->post('shipping_price_9000_9999_2'),
				'shipping_price_10000_10999' =>  $this->input->post('shipping_price_10000_10999_2'),
				'shipping_price_11000_11999' =>  $this->input->post('shipping_price_11000_11999_2'),
				'shipping_price_12000_12999' =>  $this->input->post('shipping_price_12000_12999_2'),
				'shipping_price_13000_13999' =>  $this->input->post('shipping_price_13000_13999_2'),
				'shipping_price_14000_14999' =>  $this->input->post('shipping_price_14000_14999_2'),
				'shipping_price_15000_15999' =>  $this->input->post('shipping_price_15000_15999_2'),
				'shipping_price_16000_16999' =>  $this->input->post('shipping_price_16000_16999_2'),
				'shipping_price_17000_17999' =>  $this->input->post('shipping_price_17000_17999_2'),
				'shipping_price_18000_18999' =>  $this->input->post('shipping_price_18000_18999_2'),
				'shipping_price_19000_19999' =>  $this->input->post('shipping_price_19000_19999_2'),
				//'shipping_price_20000_100000000' =>  $this->input->post('shipping_price_20000_100000000'), 
				'shipping_price_datetime_create' => date('Y-m-d H:i:s'),
				'shipping_price_datetime_update' => date('Y-m-d H:i:s')
			);

			$this->model_shipping_price->update_data($data, 2);
			
			redirect('shipping_price/backend/index', 'location');
			
		// insert
		/*} else {	
			$data['shipping_price_username_create'] = $this->session->userdata('session_username');
			$data['shipping_price_datetime_create'] = date('Y-m-d H:i:s');
			$data['shipping_price_ip_create'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_shipping_price->insert_data($data);
			
			redirect('shipping_price/backend/index', 'location');
		}*/
	}
	
	/*public function delete($id){
		$this->model_shipping_price->delete_data($id);

		redirect('shipping_price/backend/index','location');
	}*/
}
?>