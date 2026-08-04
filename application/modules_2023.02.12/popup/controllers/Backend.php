<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('popup/model_popup');
		$this->load->model('popup/model_popup_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		$this->path_upload = FCPATH.'uploads/popup/';
		
		if($this->session->userdata('session_login') != true) {
			redirect(site_url());
		}
	}
	
	// public function index() {
		
	// 	/* start header, menu */
	// 	$data['title'] = $this->model_template_main->get_title_menu();
	// 	$data['active'] = $this->model_template_main->get_active_menu();
	// 	$data['sub_menu_active'] = $this->model_template_main->get_active_sub_menu();
	// 	$data['row_user'] = $this->model_template_main->get_user_single();
	// 	$data['department'] = $this->model_template_main->get_department_single();
	// 	$data['rows_menu'] = $this->model_template_main->get_menu_list();
	// 	$data['rows_sub_menu'] = $this->model_template_main->get_sub_menu_list();
		
	// 	$this->load->view('template_main/template_main/header', $data);
	// 	$this->load->view('template_main/template_main/menu_sidebar', $data);
	// 	/* end header, menu */
		
	// 	/* start body */
	// 	$this->load->view('popup/popup/list', $data);
	// 	/* end body */
	// }
	
	// public function server_processing() {
    //     $order_index = $this->input->get('order[0][column]');
    //     $param['page_size'] = $this->input->get('length');
    //     $param['start'] = $this->input->get('start');
    //     $param['draw'] = $this->input->get('draw');
    //     $param['keyword'] = trim($this->input->get('search[value]'));
    //     $param['column'] = $this->input->get("columns[{$order_index}][data]");
    //     $param['dir'] = $this->input->get('order[0][dir]');
 
    //     $results = $this->model_popup_datatable->popup_datatable($param);
 
    //     $data['draw'] = $param['draw'];
    //     $data['recordsTotal'] = $results['count'];
    //     $data['recordsFiltered'] = $results['count_condition'];
    //     $data['data'] = $results['data'];
    //     $data['error'] = $results['error_message'];
 
    //     $this->output->set_content_type('application/json')->set_output(json_encode($data));
    // }
	
	public function index($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_popup->get_data_single(1);
		
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
		
		$this->load->view('popup/popup/form', $data);
	}
	
	public function save_update($id = ''){	
		$data = array(
			'popup_link' => $this->input->post('popup_link'),
			'popup_datetime_update' => date('Y-m-d H:i:s'),
		);
		
		if(!empty($_FILES['popup_image'])) {
			$config['upload_path']          = FCPATH.'uploads/popup/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('popup_image')) {
				$data_image = $this->upload->data();
				
				// $config_resize['image_library'] = 'gd2';
				// $config_resize['source_image'] = FCPATH.'uploads/popup/'.$data_image['file_name'];
				// $config_resize['new_image'] = FCPATH.'uploads/popup/'.$data_image['file_name'];
				// $config_resize['create_thumb'] = FALSE;
				// $config_resize['maintain_ratio'] = FALSE;
				// $config_resize['width'] = 1920;
				// $config_resize['height'] = 520;

				// $this->load->library('image_lib', $config_resize);
				// $this->image_lib->initialize($config_resize);
				// $this->image_lib->resize();
				
				$data['popup_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 	
		$this->model_popup->update_data($data, 1);
		
		redirect('popup/backend/index', 'location');
	}
	
	// public function delete($id){
	// 	$this->model_popup->delete_data($id);

	// 	redirect('popup/backend/index','location');
	// } 
}
?>