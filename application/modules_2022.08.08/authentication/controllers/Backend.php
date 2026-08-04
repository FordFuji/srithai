<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('authentication/model_authentication');
		$this->load->model('authentication/model_department_datatable');
		$this->load->model('authentication/model_user_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		
		if($this->session->userdata('session_login') != true) {
			redirect(site_url());
		}
	}
	
	// department
	public function department() {
		
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
		$this->load->view('authentication/department/list', $data);
		/* end body */
	}

	public function department_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_department_datatable->department_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function department_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_authentication->get_department_single($id);
		
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
		
		$this->load->view('authentication/department/form', $data);
	}
	
	public function department_save_update($id = ''){	
		
		$this->form_validation->set_rules('department_name', 'Name', "trim|required");
		
		if($this->form_validation->run($this) == TRUE) {
			$data = array(
				'department_name' => $this->input->post('department_name')
			);
			
			$this->path_upload = FCPATH.'uploads/department/';
			
			$config['upload_path'] = $this->path_upload;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10240;
            $config['max_width'] = 10240;
            $config['max_height'] = 10240;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('department_image')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data_upload = array('upload_data' => $this->upload->data());
				$data['department_image'] = $data_upload['upload_data']['file_name'];
            }
			
			// update 
			if($id != '') {	
				$this->model_authentication->update_department($data, $id);
				
				redirect('authentication/backend/department', 'location');
				
			// insert
			} else {	
					
				$this->model_authentication->insert_department($data);
				
				redirect('authentication/backend/department', 'location');
			}
		} else {
			$this->department_form($id);
		}
	}
	
	public function department_delete($id){
		$this->model_authentication->delete_department($id);

		redirect('authentication/backend/department','location');
	} 
	// End department
	
	// permission
	public function permission() {
		$data['rows'] = $this->model_authentication->get_permission_list();
		$data['rows_menu'] = $this->model_authentication->get_menu_list();
		$data['rows_sub_menu_authen'] = $this->model_authentication->getMenuAndSubMenuList();
		
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
		$this->load->view('authentication/permission/list', $data);
		/* end body */
	}
	
	public function permission_form($id) {
		$data['id'] = $id;	
		$data['row'] = $this->model_authentication->get_permission_single($id);
		$data['rows_sub_menu_authen'] = $this->model_authentication->getMenuAndSubMenuList($id);
		
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
		
		$this->load->view('authentication/permission/form', $data);
	}
	
	public function permission_save_update($id){	
		// Menu
		$menu = $this->input->post('department_menu');
		
		$department_menu = '';
		if(!empty($menu)) {
			foreach($menu as $r) {
					$department_menu .= $r.', ';
			}
		}
		
		$department_menu = substr($department_menu, 0, -2);
		
		$data = array(
			'department_menu' => $department_menu
		);

		// update 
		/*if($id != '') {
			$this->model_permission->update_data($data, $id);
			
			$this->session->set_flashdata('success','Update permission complete.');
			redirect('permission/backend/index','location');

		}*/
		
		// Sub Menu
		$sub_menu = $this->input->post('department_sub_menu');
		
		$department_sub_menu = '';
		if(!empty($sub_menu)) {
			foreach($sub_menu as $r) {
					$department_sub_menu .= $r.', ';
			}
		}
		
		$department_sub_menu = substr($department_sub_menu, 0, -2);
		
		$data['department_sub_menu'] = $department_sub_menu;

		// update 
		if($id != '') {
			$this->model_authentication->update_permission($data, $id);
			
			$this->session->set_flashdata('success','Update permission complete.');
			redirect('authentication/backend/permission','location');

		}
	}
	// End permission
	
	// user
	public function user() {
		
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
		$this->load->view('authentication/user/list', $data);
		/* end body */
	}
	
	public function user_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_user_datatable->user_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function user_form($msg = NULL){	
		$data['messages'] = $msg;
		$data['id'] = $msg;
		$data['row'] = $this->model_authentication->get_user_single($msg);
		$data['rows_department'] = $this->model_authentication->get_department_list();
		
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
		
		$this->load->view('authentication/user/form', $data);
	}
	
	public function user_save_update($id = ''){	
		$data = array(
			'user_username' => $this->input->post('user_username'),
			'user_email' => $this->input->post('user_email'),
			'user_password' =>  $this->input->post('user_password'),
			'user_name' =>  $this->input->post('user_name'),
			'department_id' =>  $this->input->post('department_id'),
			'user_activated' =>  $this->input->post('user_activated')
		);
		
		$user_brand = $this->input->post('user_brand');
		
		$txt_brand = '';
		if(!empty($user_brand)) {
			foreach($user_brand as $brand) {
				$txt_brand .= $brand.', ';
			}
		}
		
		if($txt_brand != '') {
			$data['user_brand'] = substr($txt_brand, 0, -2);
		}
		
		// update 
		if($id != '') {
			$data['user_username_update'] = $this->session->userdata('session_username');
			$data['user_datetime_update'] = date('Y-m-d H:i:s');
			$data['user_ip_update'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_authentication->update_user($data, $id);
			
			$this->session->set_flashdata('success','Update user complete.');
			redirect('authentication/backend/user','location');
			
		// insert
		} else {	
			$data['user_username_create'] = $this->session->userdata('session_username');
			$data['user_datetime_create'] = date('Y-m-d H:i:s');
			$data['user_ip_create'] = $_SERVER['REMOTE_ADDR'];
			$data['user_username_update'] = $this->session->userdata('session_username');
			$data['user_datetime_update'] = date('Y-m-d H:i:s');
			$data['user_ip_update'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_authentication->insert_user($data);
			
			$this->session->set_flashdata('success','Insert user complete.');
			redirect('authentication/backend/user','location');
			
		}
	}
	
	public function user_delete($id){
		$this->model_authentication->delete_user($id);

		redirect('authentication/backend/user','location');
	}
	
	public function ajaxCheckUsername() {
		$this->db->where('user_username', $this->input->post('user_username'));
		if($this->input->post('user_id') != '') {
			$this->db->where('user_id !=', $this->input->post('user_id'));	
		}
		$query = $this->db->get('user');
		
		$row = $query->row();
		
		if(!empty($row)) {
			echo true;
		}
	}
	
	public function ajaxBrand() {
		$rows = $this->model_authentication->getBrandList();
?>
								<div class="form-group">
                                    <label class="col-md-3 control-label">Brand</label>
                                    <div class="col-md-9">
<?php
		if(!empty($rows)) {
			foreach($rows as $r) {
?>
										<input type="checkbox" name="user_brand[]" id="user_brand" value="<?php echo $r->brand_id;?>" /> <?php echo $r->brand_name_th.' / '.$r->brand_name_en;?><br>
<?php
			}
		}
?>
                                    </div>
                                </div>
<?php
	}
	// End user
}
?>