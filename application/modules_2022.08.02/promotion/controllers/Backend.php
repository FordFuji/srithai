<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('promotion/model_promotion');
		$this->load->model('promotion/model_buy_and_giveaway_datatable');
		$this->load->model('promotion/model_point_datatable');
		$this->load->model('promotion/model_vip_datatable');
		$this->load->model('promotion/model_get_set_datatable');
		$this->load->model('promotion/model_discount_category_datatable');
		$this->load->model('promotion/model_auto_add_gift_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		$this->path_upload = FCPATH.'uploads/buy_and_giveaway/';
		
		if($this->session->userdata('session_login') != true) {
			redirect(site_url());
		}
	}
	
	// Buy and giveaway
	public function buy_and_giveaway() {
		
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
		$this->load->view('promotion/buy_and_giveaway/list', $data);
		/* end body */
	}
	
	public function buy_and_giveaway_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_buy_and_giveaway_datatable->buy_and_giveaway_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function buy_and_giveaway_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_promotion->get_buy_and_giveaway_single($id);

		$data['buy'] = $this->model_promotion->getMapBuy($id);
		$data['giveaway'] = $this->model_promotion->getMapGiveaway($id);
		
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
		
		$this->load->view('promotion/buy_and_giveaway/form', $data);
	}
	
	public function buy_and_giveaway_save_update($id = ''){	
		$data = array(
			'buy_and_giveaway_name_th' => $this->input->post('buy_and_giveaway_name_th'),
			'buy_and_giveaway_name_en' => $this->input->post('buy_and_giveaway_name_en'),
			'buy_no' => $this->input->post('buy_no'),
			'giveaway_no' => $this->input->post('giveaway_no'),
			'buy_and_giveaway_datetime_update' => date('Y-m-d H:i:s')
		);
		
		/*if(!empty($_FILES['buy_and_giveaway_image'])) {
			$config['upload_path']          = FCPATH.'uploads/buy_and_giveaway/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('buy_and_giveaway_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/buy_and_giveaway/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/buy_and_giveaway/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 520;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['buy_and_giveaway_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}*/
		
		// update 
		if($id != '') {	
			$this->model_promotion->update_buy_and_giveaway($data, $id);

			$buy_and_giveaway_id = $id;
		// insert
		} else {	
			$data['buy_and_giveaway_datetime_create'] = date('Y-m-d H:i:s');
				
			$this->model_promotion->insert_buy_and_giveaway($data);
			
			$buy_and_giveaway = $this->model_promotion->getBuyAndGiveawayLastedId();

			if(!empty($buy_and_giveaway)) {
				$buy_and_giveaway_id = $buy_and_giveaway->buy_and_giveaway_id;
			}
		}

		$buy_product_id = $this->input->post('buy_product_id');
		$giveaway_product_id = $this->input->post('giveaway_product_id');

		if(!empty($buy_product_id)) {
			$where = array(
				'buy_and_giveaway_id' => $buy_and_giveaway_id
			);

			$this->db->delete('ci_map_buy', $where);

			foreach($buy_product_id as $product_id) {
				$data = array(
					'buy_and_giveaway_id' => $buy_and_giveaway_id,
					'product_id' => $product_id,
					'map_buy_datetime_create' => date('Y-m-d H:i:s')
				);

				$this->db->insert('ci_map_buy', $data);
			}
		}

		if(!empty($giveaway_product_id)) {
			$where = array(
				'buy_and_giveaway_id' => $buy_and_giveaway_id
			);

			$this->db->delete('ci_map_giveaway', $where);

			foreach($giveaway_product_id as $product_id) {
				$data = array(
					'buy_and_giveaway_id' => $buy_and_giveaway_id,
					'product_id' => $product_id,
					'map_giveaway_datetime_create' => date('Y-m-d H:i:s')
				);

				$this->db->insert('ci_map_giveaway', $data);
			}
		}

		redirect('promotion/backend/buy_and_giveaway', 'location');
	}
	
	public function buy_and_giveaway_delete($id){
		$this->model_promotion->delete_buy_and_giveaway($id);

		redirect('promotion/backend/buy_and_giveaway','location');
	} 

	public function ajaxBuy() {
		for($i = 1; $i <= $this->input->post('no'); $i++) {
?>
			<select name="buy_product_id[]" class="form-control select2" required>
				<option value="">Please Select</option>
<?php
			$product = $this->model_promotion->getProductResult();
			if(!empty($product)) {
				foreach($product as $r) {
?>
				<option value="<?php echo $r->product_id;?>"><?php echo $r->product_name_th.' / '.$r->product_name_en;?></option>
<?php
				}
			}
?>
			</select><br><br>
<?php
		}
	}

	public function ajaxGiveAway() {
		for($i = 1; $i <= $this->input->post('no'); $i++) {
?>
			<select name="giveaway_product_id[]" class="form-control select2" required>
				<option value="">Please Select</option>
<?php
			$product = $this->model_promotion->getProductResult();
			if(!empty($product)) {
				foreach($product as $r) {
?>
				<option value="<?php echo $r->product_id;?>"><?php echo $r->product_name_th.' / '.$r->product_name_en;?></option>
<?php
				}
			}
?>
			</select><br><br>
<?php
		}
	}

	// End Buy and giveaway

	// Get set
	public function get_set() {
		
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
		$this->load->view('promotion/get_set/list', $data);
		/* end body */
	}
	
	public function get_set_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_get_set_datatable->get_set_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function get_set_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_promotion->get_set_single($id);

		$data['get_set'] = $this->model_promotion->getMapGetSet($id);
		
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
		
		$this->load->view('promotion/get_set/form', $data);
	}
	
	public function get_set_save_update($id = ''){	
		$data = array(
			'get_set_name_th' => $this->input->post('get_set_name_th'),
			'get_set_name_en' => $this->input->post('get_set_name_en'),
			'get_set_no' => $this->input->post('get_set_no'),
			'get_set_detail_th' => $this->input->post('get_set_detail_th'),
			'get_set_detail_en' => $this->input->post('get_set_detail_en'),
			'get_set_price' => $this->input->post('get_set_price'),
			'get_set_before_discount_price' => $this->input->post('get_set_before_discount_price'),
			'get_set_datetime_update' => date('Y-m-d H:i:s')
		);
		
		if(!empty($_FILES['get_set_image'])) {
			$config['upload_path']          = FCPATH.'uploads/get_set/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('get_set_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/get_set/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/get_set/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 800;
				$config_resize['height'] = 800;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['get_set_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		if($id != '') {	
			$this->model_promotion->update_get_set($data, $id);

			$get_set_id = $id;
		// insert
		} else {	
			$data['get_set_datetime_create'] = date('Y-m-d H:i:s');
				
			$this->model_promotion->insert_get_set($data);
			
			$get_set = $this->model_promotion->getGetSetLastedId();

			if(!empty($get_set)) {
				$get_set_id = $get_set->get_set_id;
			}
		}

		//echo $get_set_id;

		if(!empty($get_set_id)) {
			$where = array(
				'get_set_id' => $get_set_id
			);

			$this->db->delete('ci_map_get_set', $where);

			$product_id = $this->input->post('product_id');
			
			//pre($product_id);

			if(!empty($product_id)) {
				foreach($product_id as $product) {
					$data = array(
						'get_set_id' => $get_set_id,
						'product_id' => $product,
						'map_get_set_datetime_create' => date('Y-m-d H:i:s')
					);

					$this->db->insert('ci_map_get_set', $data);
				}
			}
		}

		redirect('promotion/backend/get_set', 'location');
	}
	
	public function get_set_delete($id){
		$this->model_promotion->delete_get_set($id);

		redirect('promotion/backend/get_set','location');
	}

	public function ajaxGetSet() {
		for($i = 1; $i <= $this->input->post('no'); $i++) {
?>
						<select name="product_id[]" class="form-control select2" required>
							<option value="">Please Select</option>
<?php
						$product = $this->model_promotion->getProductResult();
						if(!empty($product)) {
							foreach($product as $r) {
?>
							<option value="<?php echo $r->product_id;?>"><?php echo $r->product_name_th.' / '.$r->product_name_en;?></option>
<?php
							}
						}
?>
						</select><br><br>
<?php
					}
	}
	// End Set

	// Point
	public function point() {
		
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
		$this->load->view('promotion/point/list', $data);
		/* end body */
	}
	
	public function point_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_point_datatable->point_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function point_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_promotion->get_point_single($id);
		
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
		
		$this->load->view('promotion/point/form', $data);
	}
	
	public function point_save_update($id = ''){	
		$data = array(
			'point_discount' => $this->input->post('point_discount'),
			'point_name_th' => $this->input->post('point_name_th'),
			'point_name_en' => $this->input->post('point_name_en'),
			'point_use_point' => $this->input->post('point_use_point'),
			'point_datetime_update' => date('Y-m-d H:i:s')
		);
		
		/*if(!empty($_FILES['point_image'])) {
			$config['upload_path']          = FCPATH.'uploads/point/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('point_image')) {
				$data_image = $this->upload->data();
				
				/*$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/point/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/point/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 780;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();*/
				
				/*$data['point_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}*/
		
		// update 
		if($id != '') {	
			$this->model_promotion->update_point($data, $id);

		// insert
		} else {	
			$data['point_datetime_create'] = date('Y-m-d H:i:s');
				
			$this->model_promotion->insert_point($data);
	
		}

		redirect('promotion/backend/point', 'location');
	}
	
	public function point_delete($id){
		$this->model_promotion->delete_point($id);

		redirect('promotion/backend/point','location');
	} 
	// End Point

	// auto_add_gift
	public function auto_add_gift() {

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
		$this->load->view('promotion/auto_add_gift/list', $data);
		/* end body */
	}
	
	public function auto_add_gift_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_auto_add_gift_datatable->auto_add_gift_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function auto_add_gift_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_promotion->get_auto_add_gift_single($id);

		$data['product'] = $this->model_promotion->getProductResult();
		
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
		
		$this->load->view('promotion/auto_add_gift/form', $data);
	}
	
	public function auto_add_gift_save_update($id = ''){	
		$data = array(
			'auto_add_gift_price_limit' => $this->input->post('auto_add_gift_price_limit'),
			'product_id' => $this->input->post('product_id'),
			'auto_add_gift_datetime_create' => date('Y-m-d H:i:s'),
			'auto_add_gift_datetime_update' => date('Y-m-d H:i:s')
		);
		
		/*if(!empty($_FILES['auto_add_gift_image'])) {
			$config['upload_path']          = FCPATH.'uploads/auto_add_gift/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('auto_add_gift_image')) {
				$data_image = $this->upload->data();
				
				/*$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/auto_add_gift/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/auto_add_gift/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 780;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();*/
				
				/*$data['auto_add_gift_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}*/
		
		// update 
		if($id != '') {	
			$this->model_promotion->update_auto_add_gift($data, $id);

		// insert
		} else {	
			$data['auto_add_gift_datetime_create'] = date('Y-m-d H:i:s');
				
			$this->model_promotion->insert_auto_add_gift($data);
	
		}

		redirect('promotion/backend/auto_add_gift', 'location');
	}
	
	public function auto_add_gift_delete($id){
		$this->model_promotion->delete_auto_add_gift($id);

		redirect('promotion/backend/auto_add_gift','location');
	}
	// End auto_add_gift

	// special_promotion_rule
	public function special_promotion_rule() {
		$data['row'] = $this->model_promotion->get_special_promotion_rule_single();

		$data['product'] = $this->model_promotion->getProductResult();

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
		$this->load->view('promotion/special_promotion_rule/form', $data);
		/* end body */
	}
	
	/*public function special_promotion_rule_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_special_promotion_rule_datatable->special_promotion_rule_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function special_promotion_rule_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_promotion->get_special_promotion_rule_single($id);

		$data['buy'] = $this->model_promotion->getMapBuy($id);
		$data['giveaway'] = $this->model_promotion->getMapGiveaway($id);
		
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
		
		/*$this->load->view('promotion/special_promotion_rule/form', $data);
	}*/
	
	public function special_promotion_rule_save_update($id = ''){	
		$data = array(
			'special_promotion_rule_no' => $this->input->post('special_promotion_rule_no'),
			'product_price_low_percent' => $this->input->post('product_price_low_percent'),
			'special_promotion_rule_datetime_create' => date('Y-m-d H:i:s'),
			'special_promotion_rule_datetime_update' => date('Y-m-d H:i:s')
		);
		
		$product_id = $this->input->post('product_id');

		pre($product_id);

		if(!empty($product_id)) {
			$this->db->truncate('ci_map_special_promotion_rule');

			foreach($product_id as $p) {
				$data_product = array(
					'map_special_promotion_rule_id' => $this->input->post('map_special_promotion_rule_id'),
					'product_id' => $p,
					'map_special_promotion_rule_datetime_update' => date('Y-m-d H:i:s')
				);

				$this->db->insert('ci_map_special_promotion_rule', $data_product);
			}
		}
		
		/*if(!empty($_FILES['special_promotion_rule_image'])) {
			$config['upload_path']          = FCPATH.'uploads/special_promotion_rule/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('special_promotion_rule_image')) {
				$data_image = $this->upload->data();
				
				/*$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/special_promotion_rule/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/special_promotion_rule/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 780;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();*/
				
				/*$data['special_promotion_rule_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}*/
		
		// update 
		//if($id != '') {	
			$this->model_promotion->update_special_promotion_rule($data, 1);

		// insert
		/*} else {	
			$data['special_promotion_rule_datetime_create'] = date('Y-m-d H:i:s');
				
			$this->model_promotion->insert_special_promotion_rule($data);
	
		}*/

		redirect('promotion/backend/special_promotion_rule', 'location');
	}
	
	/*public function special_promotion_rule_delete($id){
		$this->model_promotion->delete_special_promotion_rule($id);

		redirect('promotion/backend/special_promotion_rule','location');
	}*/
	// End special_promotion_rule

	// multiple_price_level
	public function multiple_price_level() {
		$data['rows'] = $this->model_promotion->get_multiple_price_level_list();

		$data['product'] = $this->model_promotion->getProductResult();

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
		$this->load->view('promotion/multiple_price_level/form', $data);
		/* end body */
	}
	
	/*public function multiple_price_level_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_multiple_price_level_datatable->multiple_price_level_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function multiple_price_level_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_promotion->get_multiple_price_level_single($id);

		$data['buy'] = $this->model_promotion->getMapBuy($id);
		$data['giveaway'] = $this->model_promotion->getMapGiveaway($id);
		
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
		
		/*$this->load->view('promotion/multiple_price_level/form', $data);
	}*/
	
	public function multiple_price_level_save_update($id = ''){	
		$multiple_price_level_buy = $this->input->post('multiple_price_level_buy');
		$multiple_price_level_discount = $this->input->post('multiple_price_level_discount');
		$multiple_price_level_type = $this->input->post('multiple_price_level_type');
		
		if(!empty($multiple_price_level_type)) {
			$this->db->truncate('ci_multiple_price_level');

			$i = 0;
			foreach($multiple_price_level_type as $type) {
				$data = array(
					'multiple_price_level_buy' => $multiple_price_level_buy[$i],
					'multiple_price_level_discount' => $multiple_price_level_discount[$i],
					'multiple_price_level_type' => $type,
					'multiple_price_level_datetime_create' => date('Y-m-d H:i:s')
				);

				$this->db->insert('ci_multiple_price_level', $data);

				$i++;
			}
		}
		
		
		/*if(!empty($_FILES['multiple_price_level_image'])) {
			$config['upload_path']          = FCPATH.'uploads/multiple_price_level/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('multiple_price_level_image')) {
				$data_image = $this->upload->data();
				
				/*$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/multiple_price_level/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/multiple_price_level/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 780;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();*/
				
				/*$data['multiple_price_level_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}*/
		
		// update 
		//if($id != '') {	
			//$this->model_promotion->update_multiple_price_level($data, 1);

		// insert
		/*} else {	
			$data['multiple_price_level_datetime_create'] = date('Y-m-d H:i:s');
				
			$this->model_promotion->insert_multiple_price_level($data);
	
		}*/

		redirect('promotion/backend/multiple_price_level', 'location');
	}
	
	/*public function multiple_price_level_delete($id){
		$this->model_promotion->delete_multiple_price_level($id);

		redirect('promotion/backend/multiple_price_level','location');
	}*/
	// End multiple_price_level

	// discount_category
	public function discount_category() {
		
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
		$this->load->view('promotion/discount_category/list', $data);
		/* end body */
	}
	
	public function discount_category_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_discount_category_datatable->discount_category_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function discount_category_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_promotion->discount_category_single($id);

		$data['category1'] = $this->model_promotion->getCategory1Result();

		if(!empty($data['row'])) {
			$data['category2'] = $this->model_promotion->getCategory2Result($data['row']->category1_id);
		} 

		$data['discount_category'] = $this->model_promotion->getMapGetSet($id);
		
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
		
		$this->load->view('promotion/discount_category/form', $data);
	}
	
	public function discount_category_save_update($id = ''){	
		$data = array(
			'category1_id' => $this->input->post('category1_id'),
			'category2_id' => $this->input->post('category2_id'),
			'discount_category_discount' => $this->input->post('discount_category_discount'),
			'discount_category_datetime_update' => date('Y-m-d H:i:s')
		);
		
		/*if(!empty($_FILES['discount_category_image'])) {
			$config['upload_path']          = FCPATH.'uploads/discount_category/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('discount_category_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/discount_category/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/discount_category/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 520;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['discount_category_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}*/
		
		// update 
		if($id != '') {	
			$this->model_promotion->update_discount_category($data, $id);

		// insert
		} else {	
			$data['discount_category_datetime_create'] = date('Y-m-d H:i:s');
				
			$this->model_promotion->insert_discount_category($data);
		}

		redirect('promotion/backend/discount_category', 'location');
	}
	
	public function discount_category_delete($id){
		$this->model_promotion->delete_discount_category($id);

		redirect('promotion/backend/discount_category','location');
	}

	public function ajaxChangeCategory1() {
		$this->db->where('category1_id', $this->input->post('category1_id'));
		$this->db->order_by('category2_id', 'asc');
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
	// End Set

	// vip
	public function vip() {
		
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
		$this->load->view('promotion/vip/list', $data);
		/* end body */
	}
	
	public function vip_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_vip_datatable->vip_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function vip_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_promotion->get_vip_single($id);
		
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
		
		$this->load->view('promotion/vip/form', $data);
	}
	
	public function vip_save_update($id = ''){	
		$data = array(
			'vip_name_th' => $this->input->post('vip_name_th'),
			'vip_name_en' => $this->input->post('vip_name_en'),
			'vip_order_amount' => $this->input->post('vip_order_amount'),
			'vip_discount' => $this->input->post('vip_discount'),
			'vip_begin_date' => $this->input->post('vip_begin_date'),
			'vip_end_date' => $this->input->post('vip_end_date'),
			'vip_datetime_update' => date('Y-m-d H:i:s')
		);
		
		/*if(!empty($_FILES['vip_image'])) {
			$config['upload_path']          = FCPATH.'uploads/vip/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('vip_image')) {
				$data_image = $this->upload->data();
				
				/*$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/vip/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/vip/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 780;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();*/
				
				/*$data['vip_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}*/
		
		// update 
		if($id != '') {	
			$this->model_promotion->update_vip($data, $id);

		// insert
		} else {	
			$data['vip_datetime_create'] = date('Y-m-d H:i:s');
				
			$this->model_promotion->insert_vip($data);
	
		}

		redirect('promotion/backend/vip', 'location');
	}
	
	public function vip_delete($id){
		$this->model_promotion->delete_vip($id);

		redirect('promotion/backend/vip','location');
	} 
	// End vip
}
?>