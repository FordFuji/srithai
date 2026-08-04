<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('report/model_report');
		//$this->load->model('report/model_report_sale_online_datatable');
		$this->load->model('template_main/model_template_main');
		//$this->load->library('datatables');
		$this->load->library('table');
		$this->load->helper('form');
		$this->path_upload = FCPATH.'uploads/report_sale_online/';
		
		if($this->session->userdata('session_login') != true) {
			redirect(site_url());
		}
	}
	
	public function report_sale_online() {
		if($this->input->post('begin_date') != '' and $this->input->post('end_date') != '') {
			$data['rows'] = $this->model_report->get_report_sale_online_list($this->input->post('begin_date'), $this->input->post('end_date'), $this->input->post('order_status'));
		} else {
			$data['rows'] = $this->model_report->get_report_sale_online_list();
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
		
		/* start body */
		$this->load->view('report/report_sale_online/list', $data);
		/* end body */
	}
	
	/*public function report_sale_online_server_processing() {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
 
        $results = $this->model_report_sale_online_datatable->report_sale_online_datatable($param);
 
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
 
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function report_sale_online_form($id = ''){	
		$data['id'] = $id;
		$data['row'] = $this->model_report->get_report_sale_online_single($id);
		
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
		
		/*$this->load->view('report/report_sale_online/form', $data);
	}
	
	public function report_sale_online_save_update($id = ''){	
		$data = array(
			'report_sale_online_name' => $this->input->post('report_sale_online_name'),
			'report_sale_online_select' =>  $this->input->post('report_sale_online_select'),
			'report_sale_online_ckeditor' =>  $this->input->post('report_sale_online_ckeditor'),
			'report_sale_online_username_update' => $this->session->userdata('session_username'),
			'report_sale_online_datetime_update' => date('Y-m-d H:i:s'),
			'report_sale_online_ip_update' => $_SERVER['REMOTE_ADDR']
		);
		
		if(!empty($_FILES['report_sale_online_image'])) {
			$config['upload_path']          = FCPATH.'uploads/report_sale_online/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('report_sale_online_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/report_sale_online/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/report_sale_online/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 1920;
				$config_resize['height'] = 520;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['report_sale_online_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}
		
		// update 
		if($id != '') {	
			$this->model_report->update_report_sale_online($data, $id);
			
			redirect('report/backend/report_sale_online', 'location');
			
		// insert
		} else {	
			$data['report_sale_online_username_create'] = $this->session->userdata('session_username');
			$data['report_sale_online_datetime_create'] = date('Y-m-d H:i:s');
			$data['report_sale_online_ip_create'] = $_SERVER['REMOTE_ADDR'];
				
			$this->model_report->insert_report_sale_online($data);
			
			redirect('report/backend/report_sale_online', 'location');
		}
	}
	
	public function report_sale_online_delete($id){
		$this->model_report->delete_report_sale_online($id);

		redirect('report/backend/report_sale_online','location');
	}*/

	public function export_excel_report_sale_online_form($date_begin = '', $date_end = '', $order_status = '') {
		header('Content-Type: text/html; charset=utf-8');
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=report_sale_online_".date('YmdHis').".xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$rows = $this->model_report->get_report_sale_online_list($date_begin, $date_end, $order_status);
?>
		<html>
		<head>
		<meta charset="utf-8">
		</head>

		<body>
			<table>
				<tr>
					<th class="select-filter">Order No</th>
					<th>Member Name</th>
					<th>Customer No</th>
					<th>Customer Name</th>
					<th>Customer Card No</th>
					<th>Address</th>
					<th>Item Code</th>
					<th>BarCode</th>
					<th>Item Des</th>
					<th>Pro Price</th>
					<th>Price</th>
					<th>Qty</th>
					<th>UOM</th>
					<th>VAT</th>
					<th>Discount</th>
					<th>Total</th>
					<th>Pro_Code</th>
					<th>Remark</th>
				</tr>
<?php
		if(!empty($rows)) {
			foreach($rows as $r) {
				$coupon = $this->model_report->getCouponRecord($r->coupon_id);
?>
				<tr>
					<td class="select-filter"><?php echo $r->order_no;?></td>
					<td>Srithai E-Commerce</td>
					<td><?php echo $r->member_id;?></td>
					<td><?php echo $r->order_name.' '.$r->order_surname;?></td>
					<td><?php echo $r->order_billing_card_id;?></td>
					<td><?php echo $r->order_address.' '.$this->model_report->get_tumbol_record($r->order_tumbol)->name_in_thai.' '.$this->model_report->get_amphur_record($r->order_amphur)->name_in_thai.' '.$this->model_report->get_province_record($r->order_province)->name_in_thai.' '.$r->order_postcode;?></td>
					<td><?php echo $r->order_detail_code;?></td>
					<td><?php echo $r->order_detail_code;?></td>
					<td><?php echo $r->order_detail_name;?></td>
					<td><?php echo $r->order_detail_price_before_discount;?></td>
					<td><?php echo $r->order_detail_price;?></td>
					<td><?php echo $r->order_detail_qty;?></td>
					<td>PCS</td>
					<td><?php echo $r->order_detail_price * $r->order_detail_qty * 7 / 100;?></td>
					<td><?php echo $r->order_discount;?></td>
					<td><?php echo $r->order_detail_price * $r->order_detail_qty;?></td>
					<td><?php if(!empty($coupon)) echo $coupon->coupon_code;?></td>
					<td><?php echo $r->order_note;?></td>
				</tr>
<?php
			}
		}
?>
			</table>
		</body>
		</html>
<?php
	}
	
	public function report_shipment() {
		if($this->input->post('begin_date') != '' and $this->input->post('end_date') != '') {
			$data['rows'] = $this->model_report->get_report_shipment_list($this->input->post('begin_date'), $this->input->post('end_date'));
		} else {
			$data['rows'] = $this->model_report->get_report_shipment_list();
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
		
		/* start body */
		$this->load->view('report/report_shipment/list', $data);
		/* end body */
	}

	public function export_excel_report_shipment_form($date_begin = '', $date_end = '') {
		header('Content-Type: text/html; charset=utf-8');
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=report_shipment_".date('YmdHis').".xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$rows = $this->model_report->get_report_shipment_list($date_begin, $date_end);
?>
		<html>
		<head>
		<meta charset="utf-8">
		</head>

		<body>
			<table>
			<tr>
				<th class="select-filter">No</th>
				<th>รหัสพัสดุจากทางบริษํทที่ฝากส่ง</th>
				<th>Invoice No</th>
				<th>Barcode No</th>
				<th>Product In Box</th>
				<th>Receiver</th>
				<th>Receiver Address</th>
				<th>Receiver Tumbol</th>
				<th>Receiver Amphur</th>
				<th>Receiver Province</th>
				<th>Receiver ZipCode</th>
				<th>Receiver Tel</th>
				<th>Weight</th>
				<th>Price (ราคาสินค้าที่ผู้รับต้องจ่ายให้ พนง. ปณ.)</th>
			</tr>
<?php
		$i = 1;
		if(!empty($rows)) {
			foreach($rows as $r) {
				$detail = $this->model_report->get_report_order_detail($r->order_id);
				if(!empty($detail)) {
					$code = '';
					$weight = 0;
		
					foreach($detail as $d) {
						if($d->order_detail_code != '') {
							$code .= $d->order_detail_code.', ';
						}
						
						$weight += $d->weight;
					}
		
					if($code != '') {
						$code = substr($code, 0, -2);
					}
				}
?>
				<tr>
					<td class="select-filter"><?php echo $i;?></td>
					<td><?php echo $r->order_tracking_no;?></td>
					<td><?php echo $r->order_no;?></td>
					<td>&nbsp;</td>
					<td><?php echo $code;?></td>
					<td><?php echo $r->order_name.' '.$r->order_surname;?></td>
					<td><?php echo $r->order_address;?></td>
					<td><?php echo $this->model_report->get_tumbol_record($r->order_tumbol)->name_in_thai;?></td>
					<td><?php echo $this->model_report->get_amphur_record($r->order_amphur)->name_in_thai;?></td>
					<td><?php echo $this->model_report->get_province_record($r->order_province)->name_in_thai;?></td>
					<td><?php echo $r->order_postcode;?></td>
					<td><?php echo $r->order_tel;?></td>
					<td><?php echo $weight;?></td>
					<td>&nbsp;</td>											
				</tr>
<?php
				$i++;
			}
		}
?>
			</table>
		</body>
		</html>
<?php
	}

	public function report_type_payment() {
		if($this->input->post('begin_date') != '' and $this->input->post('end_date') != '') {
			$data['rows'] = $this->model_report->get_report_type_payment_list($this->input->post('begin_date'), $this->input->post('end_date'), $this->input->post('order_status'));
		} else {
			$data['rows'] = $this->model_report->get_report_type_payment_list();
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
		
		/* start body */
		$this->load->view('report/report_type_payment/list', $data);
		/* end body */
	}

	public function export_excel_report_type_payment_form($date_begin = '', $date_end = '', $order_status = '') {
		header('Content-Type: text/html; charset=utf-8');
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=report_type_payment_".date('YmdHis').".xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$rows = $this->model_report->get_report_type_payment_list($date_begin, $date_end, $order_status);
?>
		<html>
		<head>
		<meta charset="utf-8">
		</head>

		<body>
			<table>
			<tr>
				<th class="select-filter">Order No</th>
				<th>Order Date</th>
				<th>Order Status</th>
				<th>Payment Type</th>
				<th>Net Amount</th>
				<th>Refernce Number</th>
				<th>Line Number</th>
				<th>Payment Sub Type</th>
				<th>Amount</th>
			</tr>
<?php
		if(!empty($rows)) {
			foreach($rows as $r) {
				if($r->order_status == 'Ordering') {
					$order_status = 'รอชำระเงิน';
				} elseif($r->order_status == 'Processing') {
					$order_status = 'ชำระเงินแล้ว';
				} elseif($r->order_status == 'Delivery') {
					$order_status = 'กำลังเตรียมจัดส่ง';
				} elseif($r->order_status == 'Shipped') {
					$order_status = 'ขนส่งแล้ว';
				} elseif($r->order_status == 'Complete') {
					$order_status = 'เสร็จสมบูรณ์';
				} elseif($r->order_status == 'Cancel') {
					$order_status = 'ยกเลิก';
				}
?>
												<tr>
													<td class="select-filter"><?php echo $r->order_no;?></td>
													<td><?php echo date2dateNormal($r->order_datetime_create);?></td>
													<td><?php echo $order_status;?></td>
													<td><?php echo $r->order_payment_method;?></td>
													<td><?php echo number_format($r->order_total, 2, '.', ',');?></td>
													<td></td>
													<td>1</td>
													<td>ยอดรวม</td>
													<td><?php echo number_format($r->order_sub_total, 2, '.', ',');?></td>
												</tr>
												<tr>
													<td class="select-filter"><?php echo $r->order_no;?></td>
													<td><?php echo date2dateNormal($r->order_datetime_create);?></td>
													<td><?php echo $order_status;?></td>
													<td><?php echo $r->order_payment_method;?></td>
													<td><?php echo number_format($r->order_total, 2, '.', ',');?></td>
													<td></td>
													<td>2</td>
													<td>ส่วนลด</td>
													<td><?php echo number_format($r->order_discount, 2, '.', ',');?></td>
												</tr>
												<tr>
													<td class="select-filter"><?php echo $r->order_no;?></td>
													<td><?php echo date2dateNormal($r->order_datetime_create);?></td>
													<td><?php echo $order_status;?></td>
													<td><?php echo $r->order_payment_method;?></td>
													<td><?php echo number_format($r->order_total, 2, '.', ',');?></td>
													<td></td>
													<td>3</td>
													<td>ค่าขนส่ง</td>
													<td><?php echo number_format($r->order_shipping, 2, '.', ',');?></td>
												</tr>
												<tr>
													<td class="select-filter"><?php echo $r->order_no;?></td>
													<td><?php echo date2dateNormal($r->order_datetime_create);?></td>
													<td><?php echo $order_status;?></td>
													<td><?php echo $r->order_payment_method;?></td>
													<td><?php echo number_format($r->order_total, 2, '.', ',');?></td>
													<td></td>
													<td>4</td>
													<td>ราคาสุทธิ</td>
													<td><?php echo number_format($r->order_total, 2, '.', ',');?></td>
												</tr>
<?php
			}
		}
?>
			</table>
		</body>
		</html>
<?php
	}
}
?>