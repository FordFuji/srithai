<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('article/model_article');
		$this->load->model('article/model_article_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		$this->path_upload = FCPATH.'uploads/article/';
		
		if($this->session->userdata('session_login') != true) {
			redirect(site_url());
		}
	}
	
	// article
	public function article() {
		
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
		$this->load->view('article/article/list', $data);
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
 
        $results = $this->model_article_datatable->article_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function article_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_article->get_data_single($id);
		
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
		
		$this->load->view('article/article/form', $data);
	}
	
	public function article_save_update($id = ''){	
		$data = array(
			'article_date' => $this->input->post('article_date'),
			'article_name_th' =>  $this->input->post('article_name_th'),
			'article_name_en' =>  $this->input->post('article_name_en'),
			'article_description_th' =>  $this->input->post('article_description_th'),
			'article_description_en' =>  $this->input->post('article_description_en'),
			'article_detail_th' =>  $this->input->post('article_detail_th'),
			'article_detail_en' =>  $this->input->post('article_detail_en'),
			'article_datetime_update' => date('Y-m-d H:i:s'),
			'article_ip_update' => $_SERVER['REMOTE_ADDR']
		);
		
		if(!empty($_FILES['article_image'])) {
			$config['upload_path']          = FCPATH.'uploads/article/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('article_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/article/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/article/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1280;
				$config_resize['height'] = 853;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['article_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		if($id != '') {	
			$this->model_article->update_data($data, $id);
			
			redirect('article/backend/article', 'location');
			
		// insert
		} else {	
			$data['article_datetime_create'] = date('Y-m-d H:i:s');
			$data['article_ip_create'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_article->insert_data($data);
			
			redirect('article/backend/article', 'location');
		}
	}
	
	public function article_delete($id){
		$this->model_article->delete_data($id);

		redirect('article/backend/article','location');
	} 
	// end article

	// banner_article
	public function banner_article($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_article->get_banner_article_data_single(1);
		
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
		
		$this->load->view('article/banner_article/form', $data);
	}
	
	public function banner_article_save_update($id = ''){	
		$data = array(
			'banner_article_name_th' =>  $this->input->post('banner_article_name_th'),
			'banner_article_name_en' =>  $this->input->post('banner_article_name_en'),
			'banner_article_datetime_update' => date('Y-m-d H:i:s')
		);
		
		if(!empty($_FILES['banner_article_image'])) {
			$config['upload_path']          = FCPATH.'uploads/banner_article/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('banner_article_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/banner_article/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/banner_article/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 480;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['banner_article_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		//if($id != '') {	
			$this->model_article->banner_article_update_data($data, 1);
			
			redirect('article/backend/banner_article', 'location');
			
		// insert
		// } else {	
		// 	$data['banner_article_datetime_create'] = date('Y-m-d H:i:s');
				
		// 	$this->model_article->insert_data($data);
			
		// 	redirect('article/backend/banner_article', 'location');
		// }
	}
	// end banner_article
}
?>