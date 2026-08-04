<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('ford/model_ford');
		$this->load->model('ford/model_ford_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		$this->path_upload = FCPATH.'uploads/ford/';
		
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
		$this->load->view('ford/ford/list', $data);
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
 
        $results = $this->model_ford_datatable->ford_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_ford->get_data_single($id);
		
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
		
		$this->load->view('ford/ford/form', $data);
	}
	
	public function save_update($id = ''){	
		$data = array(
			'ford_name' => $this->input->post('ford_name'),
			'ford_select' =>  $this->input->post('ford_select'),
			'ford_ckeditor' =>  $this->input->post('ford_ckeditor'),
			'ford_username_update' => $this->session->userdata('session_username'),
			'ford_datetime_update' => date('Y-m-d H:i:s'),
			'ford_ip_update' => $_SERVER['REMOTE_ADDR']
		);
		
		if(!empty($_FILES['ford_image'])) {
			$config['upload_path']          = FCPATH.'uploads/ford/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('ford_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/ford/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/ford/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 520;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['ford_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		if($id != '') {	
			$this->model_ford->update_data($data, $id);
			
			redirect('ford/backend/index', 'location');
			
		// insert
		} else {	
			$data['ford_username_create'] = $this->session->userdata('session_username');
			$data['ford_datetime_create'] = date('Y-m-d H:i:s');
			$data['ford_ip_create'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_ford->insert_data($data);
			
			redirect('ford/backend/index', 'location');
		}
	}
	
	public function delete($id){
		$this->model_ford->delete_data($id);

		redirect('ford/backend/index','location');
	} 
}
?>