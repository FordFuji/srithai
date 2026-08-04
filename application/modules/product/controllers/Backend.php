<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('product/model_product');
		$this->load->model('product/model_color_datatable');
		$this->load->model('product/model_size_datatable');
		$this->load->model('product/model_category1_datatable');
		$this->load->model('product/model_category2_datatable');
		$this->load->model('product/model_product_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		$this->path_upload = FCPATH.'uploads/category1/';
		
		if($this->session->userdata('session_login') != true) {
			redirect(site_url());
		}
	}

	// color
	public function color() {
		
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
		$this->load->view('product/color/list', $data);
		/* end body */
	}
	
	public function color_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_color_datatable->color_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function color_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_product->get_color_single($id);
		
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
		
		$this->load->view('product/color/form', $data);
	}
	
	public function color_save_update($id = ''){	
		$data = array(
			'color_name_th' => $this->input->post('color_name_th'),
			'color_name_en' =>  $this->input->post('color_name_en'),
			'color_datetime_update' => date('Y-m-d H:i:s'),
			'color_ip_update' => $_SERVER['REMOTE_ADDR']
		);
		
		if(!empty($_FILES['color_image'])) {
			$config['upload_path']          = FCPATH.'uploads/color/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('color_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/color/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/color/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1280;
				$config_resize['height'] = 960;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['color_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		if($id != '') {	
			$this->model_product->update_color($data, $id);
			
			redirect('product/backend/color', 'location');
			
		// insert
		} else {	
			$data['color_datetime_create'] = date('Y-m-d H:i:s');
			$data['color_ip_create'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_product->insert_color($data);
			
			redirect('product/backend/color', 'location');
		}
	}
	
	public function color_delete($id){
		$this->model_product->delete_color($id);

		redirect('product/backend/color','location');
	} 
	// end color

	// size
	public function size() {
		
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
		$this->load->view('product/size/list', $data);
		/* end body */
	}
	
	public function size_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_size_datatable->size_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function size_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_product->get_size_single($id);
		
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
		
		$this->load->view('product/size/form', $data);
	}
	
	public function size_save_update($id = ''){	
		$data = array(
			'size_name_th' => $this->input->post('size_name_th'),
			'size_name_en' =>  $this->input->post('size_name_en'),
			'size_datetime_update' => date('Y-m-d H:i:s'),
			'size_ip_update' => $_SERVER['REMOTE_ADDR']
		);
		
		if(!empty($_FILES['size_image'])) {
			$config['upload_path']          = FCPATH.'uploads/size/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('size_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/size/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/size/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1280;
				$config_resize['height'] = 960;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['size_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		if($id != '') {	
			$this->model_product->update_size($data, $id);
			
			redirect('product/backend/size', 'location');
			
		// insert
		} else {	
			$data['size_datetime_create'] = date('Y-m-d H:i:s');
			$data['size_ip_create'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_product->insert_size($data);
			
			redirect('product/backend/size', 'location');
		}
	}
	
	public function size_delete($id){
		$this->model_product->delete_size($id);

		redirect('product/backend/size','location');
	} 
	// end size
	
	// category1
	public function category1() {
		
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
		$this->load->view('product/category1/list', $data);
		/* end body */
	}
	
	public function category1_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_category1_datatable->category1_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function category1_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_product->get_category1_single($id);

		$data['rows'] = $this->model_product->getCategory1Banner($id);
		
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
		
		$this->load->view('product/category1/form', $data);
	}
	
	public function category1_save_update($id = ''){	
		$data = array(
			'category1_name_th' => $this->input->post('category1_name_th'),
			'category1_name_en' =>  $this->input->post('category1_name_en'),
			'category1_datetime_update' => date('Y-m-d H:i:s'),
			'category1_ip_update' => $_SERVER['REMOTE_ADDR']
		);
		
		if(!empty($_FILES['category1_image'])) {
			$config['upload_path']          = FCPATH.'uploads/category1/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('category1_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/category1/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/category1/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1280;
				$config_resize['height'] = 960;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['category1_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		if($id != '') {	
			$this->model_product->update_category1($data, $id);
			
			$category1_id = $id;
			
		// insert
		} else {	
			$data['category1_datetime_create'] = date('Y-m-d H:i:s');
			$data['category1_ip_create'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_product->insert_category1($data);
			
			$this->db->order_by('category1_id', 'desc');
			$query = $this->db->get('ci_category1');

			$row = $query->row();

			if(!empty($row)) {
				$category1_id = $row->category1_id;
			}
		}

		$map_category1_banner = $_FILES['map_category1_banner']['tmp_name'];
		if(!empty($map_category1_banner)) {
			foreach($map_category1_banner as $val) {
				$md5_banner = md5(rand()).'.png';
				if(move_uploaded_file($val, FCPATH.'uploads/category1/'.$md5_banner)) {
					$data_banner = array(
						'category1_id' => $category1_id,
						'map_category1_banner' => $md5_banner,
						'map_category1_datetime_create' => date('Y-m-d H:i:s')
					);

					$this->db->insert('ci_map_category1', $data_banner);
				}
			}
		}


		redirect('product/backend/category1', 'location');
	}
	
	public function category1_delete($id){
		$this->model_product->delete_category1($id);

		redirect('product/backend/category1','location');
	} 

	public function deletePhoto($id, $map_category1_id) {
		$where = array(
			'map_category1_id' => $map_category1_id
		);

		$this->db->delete('ci_map_category1', $where);

		redirect('product/backend/category1_form/'.$id);
	}
	// end category1

	// category2
	public function category2() {
		
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
		$this->load->view('product/category2/list', $data);
		/* end body */
	}
	
	public function category2_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_category2_datatable->category2_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function category2_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_product->get_category2_single($id);

		$data['rows'] = $this->model_product->get_category1_list();
		
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
		
		$this->load->view('product/category2/form', $data);
	}
	
	public function category2_save_update($id = ''){	
		$data = array(
			'category1_id' => $this->input->post('category1_id'),
			'category2_name_th' => $this->input->post('category2_name_th'),
			'category2_name_en' =>  $this->input->post('category2_name_en'),
			'category2_datetime_update' => date('Y-m-d H:i:s'),
			'category2_ip_update' => $_SERVER['REMOTE_ADDR']
		);
		
		if(!empty($_FILES['category2_image'])) {
			$config['upload_path']          = FCPATH.'uploads/category2/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('category2_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/category2/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/category2/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1280;
				$config_resize['height'] = 960;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['category2_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		if($id != '') {	
			$this->model_product->update_category2($data, $id);
			
			redirect('product/backend/category2', 'location');
			
		// insert
		} else {	
			$data['category2_datetime_create'] = date('Y-m-d H:i:s');
			$data['category2_ip_create'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_product->insert_category2($data);
			
			redirect('product/backend/category2', 'location');
		}
	}
	
	public function category2_delete($id){
		$this->model_product->delete_category2($id);

		redirect('product/backend/category2','location');
	} 
	// end category2

	// product
	public function product() {
		
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
		$this->load->view('product/product/list', $data);
		/* end body */
	}
	
	public function product_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_product_datatable->product_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function product_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_product->get_product_single($id);

		$data['category1'] = $this->model_product->get_category1_list();

		$data['color'] = $this->model_product->get_color_list();
		$data['size'] = $this->model_product->get_size_list();

		$data['product_photo'] = $this->model_product->get_product_photo($id);

		$data['category1'] = $this->model_product->get_category1_list();
		
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
		
		$this->load->view('product/product/form', $data);
	}
	
	public function product_save_update($id = ''){	
		$data = array(
			'category2_id' => $this->input->post('category2_id'),
			'product_name_th' =>  $this->input->post('product_name_th'),
			'product_name_en' =>  $this->input->post('product_name_en'),
			'product_description_th' =>  $this->input->post('product_description_th'),
			'product_description_en' =>  $this->input->post('product_description_en'),
			'product_price_before_discount' =>  $this->input->post('product_price_before_discount'),
			'product_price' =>  $this->input->post('product_price'),
			'product_descriptions_th' =>  $this->input->post('product_descriptions_th'),
			'product_descriptions_en' =>  $this->input->post('product_descriptions_en'),
			'product_specifications_th' =>  $this->input->post('product_specifications_th'),
			'product_specifications_en' =>  $this->input->post('product_specifications_en'),
			'product_details_th' =>  $this->input->post('product_details_th'),
			'product_details_en' =>  $this->input->post('product_details_en'),
			'product_stock' =>  $this->input->post('product_stock'),
			'product_code' =>  $this->input->post('product_code'),
			'product_weight' =>  $this->input->post('product_weight'),
			'product_sort' =>  $this->input->post('product_sort'),
			'product_enable' =>  $this->input->post('product_enable'),
			'product_datetime_update' => date('Y-m-d H:i:s'),
			'product_ip_update' => $_SERVER['REMOTE_ADDR']
		);

		if($this->input->post('product_promotion') == 'Yes') {
			$data['product_promotion'] = 'Yes';
		} else {
			$data['product_promotion'] = 'No';
		}

		if($this->input->post('product_recommened') == 'Yes') {
			$data['product_recommened'] = 'Yes';
		} else {
			$data['product_recommened'] = 'No';
		}

		if($this->input->post('product_new_arrivals') == 'Yes') {
			$data['product_new_arrivals'] = 'Yes';
		} else {
			$data['product_new_arrivals'] = 'No';
		}
		
		if(!empty($_FILES['product_image'])) {
			$config['upload_path']          = FCPATH.'uploads/product/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('product_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/product/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/product/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 800;
				$config_resize['height'] = 800;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['product_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		if($id != '') {	
			$this->model_product->update_product($data, $id);

			$product_id = $id;
		// insert
		} else {	
			$data['product_datetime_create'] = date('Y-m-d H:i:s');
			$data['product_ip_create'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_product->insert_product($data);

			$this->db->order_by('product_id', 'desc');
			$query = $this->db->get('ci_product');
			
			$row = $query->row();

			if(!empty($row)) {
				$product_id = $row->product_id;
			}
		}

		$where = array(
			'product_id' => $product_id
		);

		$this->db->delete('ci_map_product', $where);

		$color_size = $this->input->post('color_size');
		if(!empty($color_size)) {
			foreach($color_size as $cs) {
				$exp_cs = explode('&', $cs);

				$this->db->where('product_id', $product_id);
				$this->db->where('color_id', $exp_cs[0]);
				$this->db->where('size_id', $exp_cs[1]);
				$query = $this->db->get('ci_map_product');

				$row = $query->row();

				if(empty($row)) {
					$data = array(
						'product_id' => $product_id,
						'color_id' => $exp_cs[0],
						'size_id' => $exp_cs[1],
						'map_product_datetime_create' => date('Y-m-d H:i:s'),
						'map_product_ip_create' => $_SERVER['REMOTE_ADDR'],
						'map_product_datetime_update' => date('Y-m-d H:i:s'),
						'map_product_ip_update' => $_SERVER['REMOTE_ADDR']
					);

					$this->db->insert('ci_map_product', $data);
				}
			}
		}

		// product related
		$map_product_related_product_id = $this->input->post('map_product_related_product_id');

		if(!empty($map_product_related_product_id)) {
			$where = array(
				'product_id' => $product_id
			);

			$this->db->delete('ci_map_product_related', $where);

			foreach($map_product_related_product_id as $map_product_related) {
				$data = array(
					'product_id' => $product_id,
					'map_product_related_product_id' => $map_product_related,
					'map_product_related_datetime_update' => date('Y-m-d H:i:s')
				);

				$this->db->insert('ci_map_product_related', $data);
			}
		}

		// photo
		if(!empty($_FILES['product_photo_image'])) {
			$i = 0;
			foreach($_FILES['product_photo_image']['tmp_name'] as $tmp_name) {
				$file_md5 = md5(rand()).'.png';
				if(move_uploaded_file($tmp_name, FCPATH.'uploads/product_photo/'.$file_md5) == true) {
					$data = array(
						'product_id' => $product_id,
						'product_photo_image' => $file_md5,
						'product_photo_datetime_create' => date('Y-m-d H:i:s'),
						'product_photo_ip_create' => $_SERVER['REMOTE_ADDR']
					);

					$this->db->insert('ci_product_photo', $data);
				}

				$i++;
			}
		}

		//pre($_FILES);

		redirect('product/backend/product', 'location');
	}
	
	public function product_delete($id){
		$this->model_product->delete_product($id);

		redirect('product/backend/product','location');
	} 

	public function delete_product_photo($product_id, $product_photo_id) {
		$where = array(
			'product_photo_id' => $product_photo_id
		);

		$this->db->delete('ci_product_photo', $where);

		redirect('product/backend/product_form/'.$product_id);
	}

	public function ajaxUpdateStock() {
		$data = array(
			'product_stock' => $this->input->post('product_stock'),
			'product_datetime_update' => date('Y-m-d H:i:s')
		);
		
		$where = array(
			'product_id' => $this->input->post('product_id')
		);

		$this->db->update('ci_product', $data, $where);
	}
	// end product

	// ajax
	public function ajaxChangeCategory1() {
		$this->db->where('category1_id', $this->input->post('category1_id'));
		$query = $this->db->get('ci_category2');

		$rows = $query->result();
?>
		<option value="">Please Select</option>
<?php
		if(!empty($rows)) {
			foreach($rows as $r) {
?>
				<option value="<?php echo $r->category2_id;?>"><?php echo $r->category2_name_th.' / '.$r->category2_name_en;?></option>
<?php
			}
		}
	}
	// end ajax
}
?>