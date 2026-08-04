<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('contact_us/model_contact_us');
		$this->load->model('contact_us/model_contact_us_form_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		$this->path_upload = FCPATH.'uploads/contact_us/';
		
		if($this->session->userdata('session_login') != true) {
			redirect(site_url());
		}
	}
	
	public function contact_us() {
		$data['row'] = $this->model_contact_us->get_contact_us_single(1);

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
		$this->load->view('contact_us/contact_us/form', $data);
		/* end body */
	}
	
	public function contact_us_save_update(){	
		$data = array(
			'contact_us_description_th' => $this->input->post('contact_us_description_th'),
			'contact_us_description_en' =>  $this->input->post('contact_us_description_en'),
			'contact_us_center_th' => $this->input->post('contact_us_center_th'),
			'contact_us_center_en' =>  $this->input->post('contact_us_center_en'),
			'contact_us_address_th' =>  $this->input->post('contact_us_address_th'),
			'contact_us_address_en' => $this->input->post('contact_us_address_en'),
			'contact_us_tel_th' =>  $this->input->post('contact_us_tel_th'),
			'contact_us_tel_en' =>  $this->input->post('contact_us_tel_en'),
			'contact_us_fax_th' => $this->input->post('contact_us_fax_th'),
			'contact_us_fax_en' =>  $this->input->post('contact_us_fax_en'),
			'contact_us_email' =>  $this->input->post('contact_us_email'),
			'contact_us_google_map_embed' =>  $this->input->post('contact_us_google_map_embed'),
			'contact_us_datetime_update' => date('Y-m-d H:i:s'),
			'contact_us_ip_update' => $_SERVER['REMOTE_ADDR']
		);
		
		$this->model_contact_us->update_contact_us($data, 1);
		
		redirect('contact_us/backend/contact_us', 'location');
	}

	public function contact_us_form() {
		
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
		$this->load->view('contact_us/contact_us_form/list', $data);
		/* end body */
	}
	
	public function contact_us_form_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_contact_us_form_datatable->contact_us_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
?>