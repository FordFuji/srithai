<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('order/model_order');
		$this->load->model('order/model_order_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		$this->path_upload = FCPATH.'uploads/order/';
		
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
		$this->load->view('order/order/list', $data);
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
 
        $results = $this->model_order_datatable->order_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_order->get_data_single($id);

		if(!empty($data['row'])) {
			$data['order_detail'] = $this->model_order->get_order_detail_result($data['row']->order_id);
		}
		
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
		
		$this->load->view('order/order/form', $data);
	}
	
	public function save_update($id = '') {	
		// Cut Stock
		$this->db->where('ci_order.order_id', $id);
		$query = $this->db->get('ci_order');

		$order = $query->row();

		//pre($order);
		//pre($this->input->post('order_status'));
		$member = $this->model_order->getOrderRecord($id);

		// + Point
		if(!empty($order) and ($order->order_status != 'Complete') and ($this->input->post('order_status') == 'Complete')) {
			//echo '123';
			if(!empty($member)) {
				$member_order_amount = $member->member_order_amount + $member->order_point - $member->order_use_point;

				$vip = $this->model_order->getVipResult();
				if(!empty($vip)) {
					foreach($vip as $v) {
						if($v->vip_order_amount <= $member_order_amount) {
							$vip_id = $v->vip_id;
						}
					}
				}

				if(empty($vip_id)) {
					$vip_id = 1;
				}

				$data = array(
					'vip_id' => $vip_id,
					'member_order_amount' => $member_order_amount,
					'member_datetime_update' => date('Y-m-d H:i:s')
				);

				$where = array(
					'member_id' => $member->member_id
				);

				$this->db->update('ci_member', $data, $where);
			}
		// - Point
		} elseif(!empty($order) and ($order->order_status == 'Complete') and ($this->input->post('order_status') != 'Complete')) {
			//echo '456';
			if(!empty($member)) {
				$member_order_amount = $member->member_order_amount - $member->order_point + $member->order_use_point;
				
				 $vip = $this->model_order->getVipResult();
				if(!empty($vip)) {
					foreach($vip as $v) {
						if($v->vip_order_amount <= $member_order_amount) {
							$vip_id = $v->vip_id;
						}
					}
				}

				if(empty($vip_id)) {
					$vip_id = 1;
				}

				$data = array(
					'vip_id' => $vip_id,
					'member_order_amount' => $member_order_amount,
					'member_datetime_update' => date('Y-m-d H:i:s')
				);

				$where = array(
					'member_id' => $member->member_id
				);

				$this->db->update('ci_member', $data, $where);
			}
		}

		if(!empty($order) and ($order->order_status == 'Ordering' or $order->order_status == 'Cancel') and ($this->input->post('order_status') != 'Ordering' and $this->input->post('order_status') != 'Cancel')) {
			$this->db->where('ci_order_detail.order_id', $id);
			$query = $this->db->get('ci_order_detail');

			$order_detail = $query->result();

			if(!empty($order_detail)) {
				foreach($order_detail as $o) {
					if($o->product_id < 0) {
						
						$get_set_id = $o->product_id * -1;
		
						$this->db->where('ci_map_get_set.get_set_id', $get_set_id);
						$this->db->join('ci_product', 'ci_map_get_set.product_id = ci_product.product_id', 'inner');
						$query_set = $this->db->get('ci_map_get_set');
		
						$rows_set = $query_set->result();
						
						if(!empty($rows_set)) {
							
							foreach($rows_set as $set) {
								$data = array(
									'product_stock' => $set->product_stock - $o->order_detail_qty,
									'product_datetime_update' => date('Y-m-d H:i:s'),
									'product_ip_update' => $_SERVER['REMOTE_ADDR']
								);
		
								$where = array(
									'product_id' => $set->product_id
								);
		
								$this->db->update('ci_product', $data, $where);
							}
						}
					} else {
						// แก้ Bug
						$this->db->where('product_id', $o->product_id);
						$query_stock = $this->db->get('ci_product');

						$row_stock = $query_stock->row();

						$data_stock = array(
							'product_stock' => $row_stock->product_stock - $o->order_detail_qty,
							'product_datetime_update' => date('Y-m-d H:i:s'),
							'product_ip_update' => $_SERVER['REMOTE_ADDR']
						);

						$where_stock = array(
							'product_id' => $o->product_id
						);

						$this->db->update('ci_product', $data_stock, $where_stock);
						// End แก้ Bug
					}
				}
			} else {
				if(!empty($order_detail)) {
					foreach($order_detail as $r) {
						$product = $this->model_order->getProductRecord($r->product_id);

						if(!empty($product)) {
							$data = array(
								'product_stock' => $product->product_stock - $r->order_detail_qty,
								'product_datetime_update' => date('Y-m-d H:i:s'),
								'product_ip_update' => $_SERVER['REMOTE_ADDR']
							);

							$where = array(
								'product_id' => $product->product_id
							);

							$this->db->update('ci_product', $data, $where);
						}
					}
				}
			}
		} elseif(!empty($order) and ($order->order_status != 'Ordering' and $order->order_status != 'Cancel') and ($this->input->post('order_status') == 'Ordering' or $this->input->post('order_status') == 'Cancel')) {
			//echo '456';

			$this->db->where('ci_order_detail.order_id', $id);
			$query = $this->db->get('ci_order_detail');

			$order_detail = $query->result();

			if(!empty($order_detail)) {
				foreach($order_detail as $o) {
					if($o->product_id < 0) {
						$get_set_id = $o->product_id * -1;
		
						$this->db->where('ci_map_get_set.get_set_id', $get_set_id);
						$this->db->join('ci_product', 'ci_map_get_set.product_id = ci_product.product_id', 'inner');
						$query_set = $this->db->get('ci_map_get_set');
		
						$rows_set = $query_set->result();
						
						//pre($rows_set);

						if(!empty($rows_set)) {
							foreach($rows_set as $set) {
								$data = array(
									'product_stock' => $set->product_stock + $o->order_detail_qty,
									'product_datetime_update' => date('Y-m-d H:i:s'),
									'product_ip_update' => $_SERVER['REMOTE_ADDR']
								);
		
								$where = array(
									'product_id' => $set->product_id
								);
		
								$this->db->update('ci_product', $data, $where);
							}
						}
					} else {
						// แก้ Bug
						$this->db->where('product_id', $o->product_id);
						$query_stock = $this->db->get('ci_product');

						$row_stock = $query_stock->row();

						$data_stock = array(
							'product_stock' => $row_stock->product_stock + $o->order_detail_qty,
							'product_datetime_update' => date('Y-m-d H:i:s'),
							'product_ip_update' => $_SERVER['REMOTE_ADDR']
						);

						$where_stock = array(
							'product_id' => $o->product_id
						);

						$this->db->update('ci_product', $data_stock, $where_stock);
						// End แก้ Bug
					}
				}
			} elseif(!empty($order_detail)) {
				foreach($order_detail as $r) {
					$product = $this->model_order->getProductRecord($r->product_id);

					if(!empty($product)) {
						$data = array(
							'product_stock' => $product->product_stock + $r->order_detail_qty,
							'product_datetime_update' => date('Y-m-d H:i:s'),
							'product_ip_update' => $_SERVER['REMOTE_ADDR']
						);

						$where = array(
							'product_id' => $product->product_id
						);

						$this->db->update('ci_product', $data, $where);
					}
				}
			}
		}

		$data = array(
			'order_status' => $this->input->post('order_status'),
			'order_tracking_no' => $this->input->post('order_tracking_no'),
			'order_datetime_update' => date('Y-m-d H:i:s')
		);
		
		// update 
		if($id != '') {	
			$this->model_order->update_data($data, $id);
		}

		redirect('order/backend/index', 'location');
	}
	
	public function delete($id){
		$this->model_order->delete_data($id);

		redirect('order/backend/index','location');
	} 
}
?>