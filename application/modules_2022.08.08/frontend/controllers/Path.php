<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Path extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		if($this->session->userdata('lang') == '') {
			$sess_lang = array(
				'lang' => 'th'
			);
			
			$this->session->set_userdata($sess_lang);
		} else {
			if($this->input->get('lang') == 'th') {
				$sess_lang = array(
					'lang' => 'th'
				);
				
				$this->session->set_userdata($sess_lang);
			} elseif($this->input->get('lang') == 'en') {
				$sess_lang = array(
					'lang' => 'en'
				);
				
				$this->session->set_userdata($sess_lang);
			}
		}
		
		$this->load->library('cart');
		
		$this->load->model('frontend/model_frontend');

		//pre($this->session->all_userdata());

		//pre($_POST);

		//$this->cart->destroy();

		//$this->session->sess_destroy();
	}
	
	public function fake() {
		echo '<img src="'.base_url('asset/fake.jpg').'">';
	}

	public function index() {
		//pre($this->cart->contents());

		$data['article'] = $this->model_frontend->get_article_home();

		$data['promotion'] = $this->model_frontend->get_product_promotion();

		$data['recommened'] = $this->model_frontend->get_product_recommened();

		$data['new_arrivals'] = $this->model_frontend->get_product_new_arrivals();

		$data['category1'] = $this->model_frontend->get_category_result();

		$data['product_all'] = $this->model_frontend->getProductAll();

		$data['banner'] = $this->model_frontend->getBannerResult();

		$data['home'] = $this->model_frontend->getHome();

		$data['customer_group'] = $this->model_frontend->getCustomerGroup();

		$data['get_set'] = $this->model_frontend->getGetSet();

		$data['special_rule'] = $this->model_frontend->getPromotionSpecialRule();

		$this->load->view('frontend/frontend/index', $data);
	}	

	public function article_detail($article_id) {
		$data['row'] = $this->model_frontend->get_article_record($article_id);

		$this->load->view('frontend/frontend/article-detail', $data);
	}	

	public function article() {
		// paginator
		$per_page = 6;
		$offset = 1;
		if(!empty($_GET['page'])) {
			$offset = ($_GET['page'] * $per_page) - 5;
		}

		$all = count($this->model_frontend->get_article_all());

		$data['all_page'] = ceil($all / $per_page);
		// end paginator 

		$data['row'] = $this->model_frontend->get_article_lasted();

		$data['article6'] = $this->model_frontend->get_article6($per_page, $offset);

		$this->load->view('frontend/frontend/article', $data);
	}	

	public function cart() {
		//pre($this->cart->contents());
		$data['recommended'] = $this->model_frontend->get_product_recommened();

		$data['product_all'] = $this->model_frontend->getProductAll();

		$data['category_product_first'] = $this->model_frontend->get_product_category_first();

		if($this->session->userdata('member_id') != '') {
			$vip = $this->model_frontend->getCheckVIP();
			
			if(!empty($vip)) {
				$data_sess = array(
					'vip_discount' => $vip->vip_discount
				);

				$this->session->set_userdata($data_sess);
			}
		}

		$sub_total = 0;
		//pre($this->cart->contents());
		foreach($this->cart->contents() as $items) {
			$price = $items['qty'] * $items['price'];

			$sub_total += $price;
		}

		$vip_discount = $sub_total * $this->session->userdata('vip_discount') / 100;

		if(!empty($vip_discount) and $vip_discount > 0) {
			$data_sess = array(
				'vip_discount_price' => $vip_discount
			);

			$this->session->set_userdata($data_sess);
		}

		$this->load->view('frontend/frontend/cart', $data);
	}	

	public function confirm_payment($order_id = '') {
		$data['order_id'] = $order_id;

		$data['row'] = $this->model_frontend->get_payment_result($order_id);

		if($this->input->post('submit') != '') {
			
			$data = array(
				'order_no' => $this->input->post('order_no'),
				'payment_account' => $this->input->post('payment_account'),
				'payment_amount' => $this->input->post('payment_amount'),
				'payment_date' => $this->input->post('payment_date'),
				'payment_time' => $this->input->post('payment_time'),
				'payment_datetime_create' => date('Y-m-d H:i:s')
			);

			$md5_file = md5(rand()).'.png';
			if(move_uploaded_file($_FILES['payment_slip']['tmp_name'], FCPATH.'uploads/payment/'.$md5_file)) {
				$data['payment_slip'] = $md5_file;
			}

			$this->db->insert('ci_payment', $data);

			echo '<script>alert("Send Data Success");window.location.href = "'.site_url('index').'";</script>';
		}

		$this->load->view('frontend/frontend/confirm-payment', $data);
	}	

	public function contact() {
		if($this->input->post('contact_us_form_name') != '') {
			$data = array(
				'contact_us_form_name' => $this->input->post('contact_us_form_name'),
				'contact_us_form_tel' => $this->input->post('contact_us_form_tel'),
				'contact_us_form_email' => $this->input->post('contact_us_form_email'),
				'contact_us_form_subject' => $this->input->post('contact_us_form_subject'),
				'contact_us_form_message' => $this->input->post('contact_us_form_message'),
				'contact_us_form_datetime_create' => date('Y-m-d H:i:s'),
				'contact_us_form_ip_create' => $_SERVER['REMOTE_ADDR']
			);

			$this->db->insert('ci_contact_us_form', $data);

			$this->load->helper('phpmailer');

			$email = $this->model_frontend->getContactUsConfig();

			if(!empty($email)) {
				$email_exp = explode(',', $email->contact_us_send_mail_email);

				if(!empty($email_exp)) {
					foreach($email_exp as $ee) {
						$sender[] = $ee;
					}
				}

				$subject = $this->input->post('contact_us_form_subject');

				$message = '
					<table width="300">
						<tr>
							<th align="left" width="100">Name</th>
							<td>'.$this->input->post('contact_us_form_name').'</td>
						</tr>
						<tr>
							<th align="left">Telephone</th>
							<td>'.$this->input->post('contact_us_form_tel').'</td>
						</tr>
						<tr>
							<th align="left">Email</th>
							<td>'.$this->input->post('contact_us_form_email').'</td>
						</tr>
						<tr>
							<th align="left">Subject</th>
							<td>'.$this->input->post('contact_us_form_subject').'</td>
						</tr>
						<tr>
							<th align="left">Message</th>
							<td>'.$this->input->post('contact_us_form_message').'</td>
						</tr>
						<tr>
							<th align="left">Datetime Create</th>
							<td>'.date('Y-m-d H:i:s').'</td>
						</tr>
						<tr>
							<th align="left">IP Create</th>
							<td>'.$_SERVER['REMOTE_ADDR'].'</td>
						</tr>
					</table>
				';

				$from_email = 'noreply.srithai@gmail.com';

				$from_name = 'Contact Us Srithai';

				send_email($sender, $subject, $message, $from_email, $from_name);
			}

			echo '<script>alert("ส่งข้อมูลเรียบร้อยแล้ว");</script>';
		}

		$data['row'] = $this->model_frontend->get_contact_us();

		$this->load->view('frontend/frontend/contact', $data);
	}	

	public function customer_group($customer_group_id) {
		$data['product'] = $this->model_frontend->customer_group_result($customer_group_id);

		$this->load->view('frontend/frontend/customer_group', $data);
	}

	public function get_set_detail($get_set_id) {
		$data['get_set_id'] = $get_set_id;
		$data['row'] = $this->model_frontend->getGetSetRecord($get_set_id);

		$this->load->view('frontend/frontend/get_set_detail', $data);
	}

	public function login() {
		if($this->session->userdata('member_id') != '') {
			redirect(site_url('member_profile'));
		}

		$data['test'] = 'Test';

		$this->load->view('frontend/frontend/login', $data);
	}	

	public function member_address() {
		$data['province'] = $this->model_frontend->get_province_result();

		$data['rows'] = $this->model_frontend->get_member_shipping_address();

		$data['row'] = $this->model_frontend->get_member_profile_record();

		$this->load->view('frontend/frontend/member-address', $data);
	}	

	public function member_order_detail($order_id) {
		$data['row_'] = $this->model_frontend->getOrderRecord($order_id);

		$data['row'] = $this->model_frontend->get_member_profile_record();

		if(!empty($data['row_'])) {
			$datetime_exp = explode(' ', $data['row_']->order_datetime_create);
			$time_exp = explode(':', $datetime_exp[1]);
			$date_exp = explode('-', $datetime_exp[0]);

			$data['date'] = $date_exp[2].'/'.$date_exp[1].'/'.$date_exp[0];
			$data['time'] = $time_exp[0].':'.$time_exp[1];

			$data['order_detail'] = $this->model_frontend->getOrderDetailResult($data['row_']->order_id);
		}

		$this->load->view('frontend/frontend/member-order-detail', $data);
	}	

	public function member_order() {
		$data['order'] = $this->model_frontend->getOrderResult();

		$data['row'] = $this->model_frontend->get_member_profile_record();

		$this->load->view('frontend/frontend/member-order', $data);
	}	

	public function member_payment() {
		$data['test'] = 'Test';

		$this->load->view('frontend/frontend/member-payment', $data);
	}
	
	public function member_point() {
		$data['point_all'] = $this->model_frontend->getCalculatePoint();

		$data['order_desc'] = $this->model_frontend->getOrderResult_();

		$data['row'] = $this->model_frontend->get_member_profile_record();

		$this->load->view('frontend/frontend/member-point', $data);
	}

	public function member_profile() {
		$data['row'] = $this->model_frontend->get_member_profile_record();

		$this->load->view('frontend/frontend/member-profile', $data);
	}	

	public function order_status() {
		$data['test'] = 'Test';

		//echo $this->input->post('ems');

		$this->load->view('frontend/frontend/order_status', $data);
	}

	public function order_summary($order_id) {
		$data['order_id'] = $order_id;

		$data['row'] = $this->model_frontend->get_order_record($order_id);
		$data['rows'] = $this->model_frontend->get_order_detail_result($order_id);

		$data['banks'] = $this->model_frontend->get_bank_result();

		$this->load->view('frontend/frontend/order-summary', $data);
	}	

	public function product_category($category1_id, $category2_id = '', $product_id = '') {
		//pre($this->cart->contents());
		$data['banner'] = $this->model_frontend->getBannerProductResult($category1_id);

		$data['category1_id'] = $category1_id;
		$data['category2_id'] = $category2_id;

		$data['category1'] = $this->model_frontend->get_category1_record($category1_id);
		$data['category2'] = $this->model_frontend->get_category2_result($category1_id);

		$data['product_id'] = @$product_id;

		//pre($data['category2']);

		$per_page = 12;
		$offset = 0;

		if(!empty($_GET['page'])) {
			$offset = ($_GET['page'] * $per_page) - $per_page;
		}

		$data['product_all'] = $this->model_frontend->get_product_category_all($category1_id, $category2_id, $product_id);

		$data['all_page'] = ceil(count($data['product_all']) / $per_page);

		$data['product'] = $this->model_frontend->get_product_category($category1_id, $category2_id, $per_page, $offset, $product_id);

		$this->load->view('frontend/frontend/product-category', $data);
	}	

	public function product_detail($product_id) {
		//pre($this->cart->contents());
		$data['product_id'] = $product_id;

		$data['row'] = $this->model_frontend->get_product_record($product_id);

		$data['photo'] = $this->model_frontend->get_product_photo($product_id);

		$data['color'] = $this->model_frontend->get_product_color($product_id);

		$data['product_all'] = $this->model_frontend->getProductAll();

		if(!empty($data['row'])) {
			$data['similar'] = $this->model_frontend->getProductRelated($product_id);
		}

		$this->load->view('frontend/frontend/product-detail', $data);
	}
	
	public function search() {
		$data['product'] = $this->model_frontend->getSearchProduct();

		$this->load->view('frontend/frontend/search', $data);
	}

	public function shipping_payment_method() {
		$data['row'] = $this->model_frontend->get_contact_us();

		$this->load->view('frontend/frontend/shipping-payment-method', $data);
	}	

	public function shipping_payment() {
		if($this->session->userdata('member_id') == '') {
			redirect('cart');
		} elseif($this->session->userdata('member_id') != '') {
			$vip = $this->model_frontend->getCheckVIP();
			
			if(!empty($vip)) {
				$data_sess = array(
					'vip_discount' => $vip->vip_discount
				);

				$this->session->set_userdata($data_sess);
			}
		}

		$sub_total = 0;
		foreach($this->cart->contents() as $items) {
			$price = $items['qty'] * $items['price'];

			$sub_total += $price;
		}

		$vip_discount = $sub_total * $this->session->userdata('vip_discount') / 100;

		if(!empty($vip_discount) and $vip_discount > 0) {
			$data_sess = array(
				'vip_discount_price' => $vip_discount
			);

			$this->session->set_userdata($data_sess);
		}

		$data['shipping_address'] = $this->model_frontend->get_shipping_address_status_main();

		$data['category_product_first'] = $this->model_frontend->get_product_category_first();

		$data['province'] = $this->model_frontend->get_province_result();

		$data['bank'] = $this->model_frontend->get_bank_result();

		$data['point'] = $this->model_frontend->getCalculatePoint();

		$data['discount_point'] = $this->model_frontend->getDiscountPoint();

		$data['shipping_payment_not_default'] = $this->model_frontend->getMemberShippingNotDefaultResult();

		$this->load->view('frontend/frontend/shipping-payment', $data);
	}

	public function logout() {
		$data_unset = array(
			'member_id'
		);

		$this->session->unset_userdata($data_unset);

		redirect('index');
	}

	public function success($order_no) {
		//pre($this->session->all_userdata());

		// ตัด คูปอง
		$this->model_frontend->setCouponStock($this->session->userdata('coupon_id'));

		$sub_total = 0;
		foreach($this->cart->contents() as $items) {
			$price = $items['price'] * $items['qty'];

			$sub_total += $price;
		}

		$shipping = $this->session->userdata('order_shipping');

		if($this->session->userdata('coupon_price') != '') {
			$discount = $this->session->userdata('coupon_price') + $this->session->userdata('multiple_price_level_discount') + $this->session->userdata('special_promotion_rule_discount') + $this->session->userdata('discount_category_discount') + $this->session->userdata('data_point_discount') + $this->session->userdata('vip_discount_price');
		} else {
			$discount = 0 + $this->session->userdata('multiple_price_level_discount') + $this->session->userdata('special_promotion_rule_discount') + $this->session->userdata('discount_category_discount') + $this->session->userdata('data_point_discount') + $this->session->userdata('vip_discount_price');
		}

		$total = $sub_total + $shipping - $discount;

		// หา Point Per Baht
		$point_per_baht = $this->model_frontend->getPointPerBaht();
		
		// หา Point
		if(!empty($point_per_baht) and $point_per_baht->point_per_baht_amount != 0) {
			$order_point = $sub_total / $point_per_baht->point_per_baht_amount;
		} else {
			$order_point = $sub_total / 1;
		}

		$order_no = $this->genOrderNo();

		if($this->session->userdata('data_point') != '') {
			$order_use_point = $this->session->userdata('data_point');
		} else {
			$order_use_point = 0;
		}

		// Change ViP And สะสมยอดการสั่งซื้อ
		// $member = $this->model_frontend->get_member_profile_record_();
		// if(!empty($member)) {
		// 	$member_order_amount = $member->member_order_amount + $total;

		// 	$member_vip = $this->model_frontend->getVip($member_order_amount);

		// 	$data_member = array(
		// 		'vip_id' => $member_vip->vip_id,
		// 		'member_order_amount' => $member_order_amount
		// 	);

		// 	$where_member = array(
		// 		'member_id' => $this->session->userdata('member_id')
		// 	);

		// 	$this->db->update('ci_member', $data_member, $where_member);
		// }

		if($this->session->userdata('coupon_id') != '') {
			$coupon_id = $this->session->userdata('coupon_id');
		} else {
			$coupon_id = 0;
		}

		if($this->session->userdata('shipping_type') == 'default') {

			$row = $this->model_frontend->get_shipping_address_status_main();

			$data = array(
				'member_id' => $this->session->userdata('member_id'),
				'coupon_id' => $coupon_id,
				'order_no' => $order_no,
				'order_point' => $order_point,
				'order_use_point' => $order_use_point,
				'order_sub_total' => $sub_total,
				'order_shipping' => $shipping,
				'order_discount' => $discount,
				'order_total' => $total,
				'order_name' => $row->member_shipping_name,
				'order_surname' => $row->member_shipping_surname,
				'order_tel' => $row->member_shipping_tel,
				'order_email' => $row->member_shipping_email,
				'order_address' => $row->member_shipping_address,
				'order_province' => $row->member_shipping_province,
				'order_amphur' => $row->member_shipping_amphur,
				'order_tumbol' => $row->member_shipping_tumbol,
				'order_postcode' => $row->member_shipping_postcode,
				'order_note' => $this->session->userdata('order_note'),
				'order_shipping_method' => $this->session->userdata('order_shipping_method'),
				'order_payment_method' => $this->session->userdata('order_payment_method'),
				'order_status' => 'Ordering',
				'order_datetime_create' => date('Y-m-d H:i:s'),
				'order_datetime_update' => date('Y-m-d H:i:s'),
			);

			if($this->session->userdata('switch') == 'Yes') {
				$data['order_billing_name'] = $this->session->userdata('order_billing_name');
				$data['order_billing_surname'] = $this->session->userdata('order_billing_surname');
				$data['order_billing_card_id'] = $this->session->userdata('order_billing_card_id');
				$data['order_billing_tel'] = $this->session->userdata('order_billing_tel');
				$data['order_billing_email'] = $this->session->userdata('order_billing_email');
				$data['order_billing_address'] = $this->session->userdata('order_billing_address');
				$data['order_billing_province'] = $this->session->userdata('order_billing_province');
				$data['order_billing_amphur'] = $this->session->userdata('order_billing_amphur');
				$data['order_billing_tumbol'] = $this->session->userdata('order_billing_tumbol');
				$data['order_billing_postcode'] = $this->session->userdata('order_billing_postcode');
				$data['order_note'] = $this->session->userdata('order_note');
				$data['switch'] = $this->session->userdata('switch');
			} else {
				$data['order_billing_name'] = $row->member_shipping_name;
				$data['order_billing_surname'] = $row->member_shipping_surname;
				$data['order_billing_tel'] = $row->member_shipping_tel;
				$data['order_billing_email'] = $row->member_shipping_email;
				$data['order_billing_address'] = $row->member_shipping_address;
				$data['order_billing_province'] = $row->member_shipping_province;
				$data['order_billing_amphur'] = $row->member_shipping_amphur;
				$data['order_billing_tumbol'] = $row->member_shipping_tumbol;
				$data['order_billing_postcode'] = $row->member_shipping_postcode;
				$data['order_note'] = $this->session->userdata('order_note');
				$data['switch'] = 'No';

				$data_unset = array(
					'switch'
				);

				$this->session->unset_userdata($data_unset);
			}

			$this->session->set_userdata($data);

			$order_email = $row->member_shipping_email;
		} elseif($this->session->userdata('shipping_type') == 'new') {
			$data = array(
				'member_id' => $this->session->userdata('member_id'),
				'coupon_id' => $coupon_id,
				'order_no' => $order_no,
				'order_point' => $order_point,
				'order_use_point' => $order_use_point,
				'order_sub_total' => $sub_total,
				'order_shipping' => $shipping,
				'order_discount' => $discount,
				'order_total' => $total,
				'order_name' => $this->session->userdata('order_name'),
				'order_surname' => $this->session->userdata('order_surname'),
				'order_tel' => $this->session->userdata('order_tel'),
				'order_email' => $this->session->userdata('order_email'),
				'order_address' => $this->session->userdata('order_address'),
				'order_province' => $this->session->userdata('order_province'),
				'order_amphur' => $this->session->userdata('order_amphur'),
				'order_tumbol' => $this->session->userdata('order_tumbol'),
				'order_postcode' => $this->session->userdata('order_postcode'),
				'order_shipping_method' => $this->session->userdata('order_shipping_method'),
				'order_payment_method' => $this->session->userdata('order_payment_method'),
				'order_status' => 'Ordering',
				'order_datetime_create' => date('Y-m-d H:i:s'),
				'order_datetime_update' => date('Y-m-d H:i:s')
			);

			if($this->input->post('switch') == 'Yes') {
				$data['order_billing_name'] = $this->session->userdata('order_billing_name');
				$data['order_billing_surname'] = $this->session->userdata('order_billing_surname');
				$data['order_billing_card_id'] = $this->session->userdata('order_billing_card_id');
				$data['order_billing_tel'] = $this->session->userdata('order_billing_tel');
				$data['order_billing_email'] = $this->session->userdata('order_billing_email');
				$data['order_billing_address'] = $this->session->userdata('order_billing_address');
				$data['order_billing_province'] = $this->session->userdata('order_billing_province');
				$data['order_billing_amphur'] = $this->session->userdata('order_billing_amphur');
				$data['order_billing_tumbol'] = $this->session->userdata('order_billing_tumbol');
				$data['order_billing_postcode'] = $this->session->userdata('order_billing_postcode');
				$data['order_note'] = $this->session->userdata('order_note');
				$data['switch'] = $this->session->userdata('switch');
			} else {
				$data['order_billing_name'] = $this->session->userdata('order_name');
				$data['order_billing_surname'] = $this->session->userdata('order_surname');
				$data['order_billing_tel'] = $this->session->userdata('order_tel');
				$data['order_billing_email'] = $this->session->userdata('order_email');
				$data['order_billing_address'] = $this->session->userdata('order_address');
				$data['order_billing_province'] = $this->session->userdata('order_province');
				$data['order_billing_amphur'] = $this->session->userdata('order_amphur');
				$data['order_billing_tumbol'] = $this->session->userdata('order_tumbol');
				$data['order_billing_postcode'] = $this->session->userdata('order_postcode');
				$data['order_note'] = $this->session->userdata('order_note');
				$data['switch'] = 'No';

				$data_unset = array(
					'switch'
				);

				$this->session->unset_userdata($data_unset);
			}

			$this->session->set_userdata($data);

			$order_email = $this->session->userdata('order_email');
		}

		$this->db->insert('ci_order', $data);

		$this->db->order_by('order_id', 'desc');
		$query = $this->db->get('ci_order');
		$row = $query->row();

		if(!empty($row)) {

			$order_id = $row->order_id;
			
			foreach($this->cart->contents() as $items) {
				$data_detail = array(
					'order_id' => $row->order_id,
					'product_id' => $items['id'],
					'order_detail_qty' => $items['qty'],
					'order_detail_price' => $items['price'],
					'order_detail_name' => $items['name'],
					'order_detail_image' => $items['options']['image'],
					'order_detail_price_before_discount' => $items['options']['price_before_discount'],
					'order_detail_color' => $items['options']['color'],
					'order_detail_size' => $items['options']['size'],
					'order_detail_code' => $items['options']['code'],
					'promotion_buy_and_giveaway' => $items['options']['promotion_buy_and_giveaway'],
					'promotion_get_set' => $items['options']['promotion_get_set'],
					'promotion_point' => $items['options']['promotion_point'],
					'promotion_auto_add_gift' => $items['options']['promotion_auto_add_gift'],
					'promotion_special_rule' => $items['options']['promotion_special_rule'],
					'promotion_category_reduction' => $items['options']['promotion_category_reduction'],
					'promotion_multiple_price_levels' => $items['options']['promotion_multiple_price_levels'],
					'weight' => $items['options']['weight'],
					'order_detail_datetime_create' => date('Y-m-d H:i:s'),
					'order_detail_datetime_update' => date('Y-m-d H:i:s')
				);

				$this->db->insert('ci_order_detail', $data_detail);
			}

			// ส่งอีเมล์แจ้งเตือน
			$row = $this->model_frontend->getOrderLastId();

			if(!empty($row)) {
				$order_detail = $this->model_frontend->getOrderDetailResult($row->order_id);

				if($this->session->userdata('lang') == 'th') {
					$address = $row->order_address.' '.$this->model_frontend->get_tumbol_record($row->order_tumbol)->name_in_thai.' '.$this->model_frontend->get_amphur_record($row->order_amphur)->name_in_thai.' '.$this->model_frontend->get_province_record($row->order_province)->name_in_thai.' '.$row->order_postcode;
				} else {
					$address = $row->order_address.' '.$this->model_frontend->get_tumbol_record($row->order_tumbol)->name_in_english.' '.$this->model_frontend->get_amphur_record($row->order_amphur)->name_in_english.' '.$this->model_frontend->get_province_record($row->order_province)->name_in_english.' '.$row->order_postcode;
				}

				$this->load->helper('phpmailer');

				$sender = array($order_email);
				//$sender[] = 'sitiporn@orange-thailand.com';

				$subject = 'Srithai: Order No '.$order_no;

				$message = '
					<div align="center"><img src="'.base_url('asset/frontend/images/logo_email.png').'" width="150"></div>
					<p>เรียน คุณ '.$row->order_name.' '.$row->order_surname.'</p>

					<p>คำสั่งซื้อหมายเลข #'.$row->order_no.' ของคุณได้รับการยืนยันการชำระเงินเรียบรอยแล้ว เราจะทำการจัดส่งสินค้าให้คุณ</p>

					<p>
						<b>รายละเอียดคำสั่งซื้อ</b>
						<table width="100%">
							<tr>
								<td width="60%">หมายเลขคำสั่งซื้อ:</td><td>#'.$row->order_no.'</td>
							</tr>
							<tr>
								<td>วันที่สั่งซื้อ:</td><td>'.$row->order_datetime_create.'</td>
							</tr>
						</table>
					</p>
					<p>
						<table width="100%">';
				if(!empty($order_detail)) {
					foreach($order_detail as $r) {
						$message .= '
							<tr>
								<td width="200"><img src="'.base_url('uploads/product/'.$r->order_detail_image).'" width="150"></td>
								<td>
									'.$r->order_detail_name.'<br>
									THB '.number_format($r->order_detail_price, 0, '.', ',').'<br>
									จำนวน: '.$r->order_detail_qty.'
								</td>
							</tr>
						';
					}
				}

				$message .= '
						</table>
					</p>
					<p>
						<table width="100%">
							<tr>
								<td width="60%">ยอดรวม:</td><td>THB '.$row->order_sub_total.'</td>
							</tr>
							<tr>
								<td>คูปองส่วนลด:</td><td>THB '.$row->order_discount.'</td>
							</tr>
							<tr>
								<td">ค่าธรรมเนียมจัดส่ง:</td><td>THB '.$row->order_shipping.'</td>
							</tr>
							<tr>
								<td>ยอดรวมทั้งหมด(รวม VAT):</td><td>THB '.$row->order_total.'</td>
							</tr>
						</table>
					</p>

					<p>
						<b>รายละเอียดการส่งสินค้า</b><br>
						ชื่อผู้รับ: '.$row->order_name.' '.$row->order_surname.'<br>
						หมายเลขโทรศัพท์: '.$row->order_tel.'<br>
						ที่อยู่ในการจัดส่งสินค้า: '.$address.'<br>
					</p>

					<p>
						<b>CONTACT INFORMATION</b><br>
						15 ถนนสุขสวัสดิ์ ซอย 36 แขวงบางปะกอก เขตราษฏร์บูรณะ กรุงเทพฯ 10400<br>
						+66(0) 2427 0088 #6584 (จันทร์ - ศุกร์ เวลา 09.00 - 17.00 น.)<br>
						<a href="mailto:E-com@srithaisuperware.com">E-com@srithaisuperware.com</a>
					</p>
				';

				$from_email = 'noreply.srithai@gmail.com';
				$from_name = 'Srithai Superware';

				send_email($sender, $subject, $message, $from_email, $from_name);
			}
		}

		$data_unset = array(
			'coupon_id',
			'coupon_code',
			'coupon_price',
			'multiple_price_level_discount',
			'special_promotion_rule_discount',
			'discount_category_discount',
			'point_id',
			'data_point_discount',
			'data_point',
			'vip_discount',
			'vip_discount_price',
		);

		$this->session->unset_userdata($data_unset);

		$this->cart->destroy();

		// Update ถ้าตัดบัตรเครดิตเสร็จ
		$data = array(
			'order_status' => 'Processing',
			'order_datetime_update' => date('Y-m-d H:i:s')
		);

		$where = array(
			'order_id' => $order_id
		);

		$this->db->update('ci_order', $data, $where);

		$this->db->where('order_id', $order_id);
		$query = $this->db->get('ci_order_detail');

		$rows = $query->result();

		if(!empty($rows)) {
			foreach($rows as $r) {
				if($r->product_id < 0) {
					$get_set_id = $r->product_id * -1;

					$this->db->where('ci_map_get_set.get_set_id', $get_set_id);
					$this->db->join('ci_product', 'ci_map_get_set.product_id = ci_product.product_id', 'inner');
					$query_set = $this->db->get('ci_map_get_set');

					$rows_set = $query_set->result();
					
					if(!empty($rows_set)) {
						foreach($rows_set as $set) {
							$data = array(
								'product_stock' => $set->product_stock - $r->order_detail_qty,
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
					$product = $this->model_frontend->getProductRecord($r->product_id);

					if(!empty($product)) {
						$data = array(
							'product_stock' => $product->product_stock - $r->order_detail_qty,
							'product_datetime_update' => date('Y-m-d H:i:s'),
							'product_ip_update' => $_SERVER['REMOTE_ADDR']
						);

						$where = array(
							'product_id' => $r->product_id
						);

						$this->db->update('ci_product', $data, $where);
					}
				}
			}
		}

		redirect('order_summary/'.$order_id);
	}

	public function fail($order_id) {
		$data['status'] = 'Fail';
		$data['order_id'] = $order_id;

		$data['row'] = $this->model_frontend->get_order_record($order_id);

		$data_unset = array(
			'coupon_id',
			'coupon_code',
			'coupon_price',
			'multiple_price_level_discount',
			'special_promotion_rule_discount',
			'discount_category_discount',
			'point_id',
			'data_point_discount',
			'data_point',
			'vip_discount',
			'vip_discount_price',
		);

		$this->session->unset_userdata($data_unset);

		$this->cart->destroy();

		$this->load->view('frontend/frontend/cancel_fail', $data);
	}

	public function cancel($order_id) {
		$data['status'] = 'Cancel';
		$data['order_id'] = $order_id;

		$data['row'] = $this->model_frontend->get_order_record($order_id);

		$data_unset = array(
			'coupon_id',
			'coupon_code',
			'coupon_price',
			'multiple_price_level_discount',
			'special_promotion_rule_discount',
			'discount_category_discount',
			'point_id',
			'data_point_discount',
			'data_point',
			'vip_discount',
			'vip_discount_price',
		);

		$this->session->unset_userdata($data_unset);

		$this->cart->destroy();

		$this->load->view('frontend/frontend/cancel_fail', $data);
	}
	
	// ajax
	public function ajaxInsertNewsletter() {
		$this->db->where('newsletter_email', $this->input->post('newsletter_email'));
		$query = $this->db->get('ci_newsletter');

		$row = $query->row();

		if(empty($row)) {
			$data = array(
				'newsletter_email' => $this->input->post('newsletter_email'),
				'newsletter_datetime_create' => date('Y-m-d H:i:s')
			);

			$this->db->insert('ci_newsletter', $data);
		}
	}

	public function ajaxClickColor() {
		$this->db->where('ci_map_product.product_id', $this->input->post('product_id'));
		$this->db->where('ci_map_product.color_id', $this->input->post('color_id'));
		$this->db->join('ci_size', 'ci_map_product.size_id = ci_size.size_id', 'inner');
		$this->db->group_by('ci_map_product.size_id');
		$query = $this->db->get('ci_map_product');

		$rows = $query->result();

		if(!empty($rows)) {
			foreach($rows as $r) {
?>
				<div class="option-list">
					<div class="optionBox-name">
						<input type="radio" id="size_<?php echo $r->size_id;?>" name="product-color">
						<label for="size_<?php echo $r->size_id;?>"><?php echo get2Lang($this->session->userdata('lang'), $r->size_name_th, $r->size_name_en);?></label>
					</div>
				</div>
<?php
			}
		}
	}

	public function ajaxCheckEmail() {
		$this->db->where('member_email', $this->input->post('member_email'));
		$this->db->where('member_email !=', '');
		$query = $this->db->get('ci_member');

		$row = $query->row();

		if(!empty($row)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	public function ajaxRegister() {
		$data = array(
			'vip_id' => 1,
			'member_name' => $this->input->post('member_name'),
			'member_surname' => $this->input->post('member_surname'),
			'member_tel' => $this->input->post('member_tel'),
			'member_email' => $this->input->post('member_email'),
			'member_username' => $this->input->post('member_email'),
			'member_password' => $this->input->post('member_password'),
			'member_datetime_create' => date('Y-m-d H:i:s'),
			'member_datetime_update' => date('Y-m-d H:i:s')
		);

		$this->db->insert('ci_member', $data);
	}

	public function ajaxLogin() {
		$this->db->where('member_username', $this->input->post('member_username'));
		$this->db->where('member_password', $this->input->post('member_password'));
		$query = $this->db->get('ci_member');

		$row = $query->row();

		if(!empty($row) and !empty($this->cart->contents())) {
			$data = array(
				'member_id' => $row->member_id
			);

			$this->session->set_userdata($data);

			echo 'cart';
		} elseif(!empty($row)) {
			$data = array(
				'member_id' => $row->member_id
			);

			$this->session->set_userdata($data);
		} else {
			$data = array(
				'member_id'
			);

			$this->session->unset_userdata($data);

			echo 'incorrect';
		}
	}

	public function ajaxCheckUserProfile() {
		$this->db->where('member_username', $this->input->post('member_username'));
		$this->db->where('member_username !=', '');
		$this->db->where('member_id !=', $this->session->userdata('member_id'));
		$query = $this->db->get('ci_member');

		$row = $query->row();

		if(!empty($row)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	public function ajaxSaveProfile() {
		$data = array(
			'member_name' => $this->input->post('member_name'),
			'member_surname' => $this->input->post('member_surname'),
			'member_tel' => $this->input->post('member_tel'),
			'member_email' => $this->input->post('member_email'),
			'member_datetime_update' => date('Y-m-d H:i:s')
		);

		if(!empty($_FILES['member_image'])) {
			$config['upload_path']          = FCPATH.'uploads/member/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 20480;
			$config['max_width']            = 20480;
			$config['max_height']           = 20480;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);

			if($this->upload->do_upload('member_image')) {
				$data_image = $this->upload->data();
				
				$config_resize['image_library'] = 'gd2';
				$config_resize['source_image'] = FCPATH.'uploads/member/'.$data_image['file_name'];
				$config_resize['new_image'] = FCPATH.'uploads/member/'.$data_image['file_name'];
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['width'] = 36;
				$config_resize['height'] = 36;

				$this->load->library('image_lib', $config_resize);
				$this->image_lib->initialize($config_resize);
				$this->image_lib->resize();
				
				$data['member_image'] = $data_image['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				//pre($error);
			}
		}

		$where = array(
			'member_id' => $this->session->userdata('member_id')
		);

		$this->db->update('ci_member', $data, $where);

		redirect('member_profile');
	}

	public function ajaxSaveUser() {
		$data = array(
			'member_username' => $this->input->post('member_username'),
			'member_password' => $this->input->post('member_password'),
			'member_datetime_update' => date('Y-m-d H:i:s')
		);

		$where = array(
			'member_id' => $this->session->userdata('member_id')
		);

		$this->db->update('ci_member', $data, $where);
	}

	public function ajaxChangeProvince() {
		if($this->session->userdata('lang') == 'th') {
			$this->db->order_by('name_in_thai', 'asc');
		} elseif($this->session->userdata('lang') == 'en') {
			$this->db->order_by('name_in_english', 'asc');
		} 

		$this->db->where('province_id', $this->input->post('province_id'));
		$query = $this->db->get('districts');

		$rows = $query->result();
?>
				<option value="">Please Select</option>
<?php
		if(!empty($rows)) {
			foreach($rows as $r) {
?>
				<option value="<?php echo $r->id;?>"><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
			}
		}
	}

	public function ajaxChangeAmphur() {
		if($this->session->userdata('lang') == 'th') {
			$this->db->order_by('name_in_thai', 'asc');
		} elseif($this->session->userdata('lang') == 'en') {
			$this->db->order_by('name_in_english', 'asc');
		} 

		$this->db->where('district_id', $this->input->post('amphur_id'));
		$query = $this->db->get('subdistricts');

		$rows = $query->result();
?>
				<option value="">Please Select</option>
<?php
		if(!empty($rows)) {
			foreach($rows as $r) {
?>
				<option value="<?php echo $r->id;?>"><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
			}
		}

		echo '!@#$%^&*()';

		$this->db->where('district_id', $this->input->post('amphur_id'));
		$this->db->order_by('id', 'asc');
		$this->db->group_by('zip_code');
		$query = $this->db->get('subdistricts');

		$rows = $query->result();
?>
				<option value="">Please Select</option>
<?php
		if(!empty($rows)) {
			foreach($rows as $r) {
?>
				<option value="<?php echo $r->zip_code;?>"><?php echo get2Lang($this->session->userdata('lang'), $r->zip_code, $r->zip_code);?></option>
<?php
			}
		}
	}

	public function ajaxChangeProvinceId() {
		if($this->session->userdata('lang') == 'th') {
			$this->db->order_by('name_in_thai', 'asc');
		} elseif($this->session->userdata('lang') == 'en') {
			$this->db->order_by('name_in_english', 'asc');
		} 

		$this->db->where('province_id', $this->input->post('province_id'));
		$query = $this->db->get('districts');

		$rows = $query->result();
?>
				<option value="">Please Select</option>
<?php
		if(!empty($rows)) {
			foreach($rows as $r) {
?>
				<option value="<?php echo $r->id;?>"><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
			}
		}
	}

	public function ajaxChangeAmphurId() {
		if($this->session->userdata('lang') == 'th') {
			$this->db->order_by('name_in_thai', 'asc');
		} elseif($this->session->userdata('lang') == 'en') {
			$this->db->order_by('name_in_english', 'asc');
		} 

		$this->db->where('district_id', $this->input->post('amphur_id'));
		$query = $this->db->get('subdistricts');

		$rows = $query->result();
?>
				<option value="">Please Select</option>
<?php
		if(!empty($rows)) {
			foreach($rows as $r) {
?>
				<option value="<?php echo $r->id;?>"><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
			}
		}

		echo '!@#$%^&*()';

		$this->db->where('district_id', $this->input->post('amphur_id'));
		$this->db->order_by('id', 'asc');
		$this->db->group_by('zip_code');
		$query = $this->db->get('subdistricts');

		$rows = $query->result();
?>
				<option value="">Please Select</option>
<?php
		if(!empty($rows)) {
			foreach($rows as $r) {
?>
				<option value="<?php echo $r->zip_code;?>"><?php echo get2Lang($this->session->userdata('lang'), $r->zip_code, $r->zip_code);?></option>
<?php
			}
		}
	}

	public function ajaxSaveMemberShipping() {
		$data = array(
			'member_id' => $this->session->userdata('member_id'),
			'member_shipping_status' => 'ตั้งเป็นที่อยู่หลัก',
			'member_shipping_name' => $this->input->post('member_shipping_name'),
			'member_shipping_surname' => $this->input->post('member_shipping_surname'),
			'member_shipping_tel' => $this->input->post('member_shipping_tel'),
			'member_shipping_email' => $this->input->post('member_shipping_email'),
			'member_shipping_address' => $this->input->post('member_shipping_address'),
			'member_shipping_province' => $this->input->post('member_shipping_province'),
			'member_shipping_amphur' => $this->input->post('member_shipping_amphur'),
			'member_shipping_tumbol' => $this->input->post('member_shipping_tumbol'),
			'member_shipping_postcode' => $this->input->post('member_shipping_postcode'),
			'member_shipping_datetime_update' => date('Y-m-d H:i:s')
		);

		$this->db->insert('ci_member_shipping', $data);

		$this->db->where('member_id', $this->session->userdata('member_id'));
		$query = $this->db->get('ci_member_shipping');

		$rows = $query->result();

		$count = count($rows);

		if($count == 1) {
			$data = array(
				'member_shipping_status' => 'ที่อยู่หลัก',
				'member_shipping_datetime_update' => date('Y-m-d H:i:s')
			);

			$where = array(
				'member_id' => $this->session->userdata('member_id')
			);

			$this->db->update('ci_member_shipping', $data, $where);
		}
	}

	public function ajaxChangeStatus() {
		$this->db->where('member_id', $this->session->userdata('member_id'));
		$this->db->order_by('order_id', 'desc');
		$this->db->where('order_status', $this->input->post('order_status'));
		$query = $this->db->get('ci_order');

		$order = $query->result();

		if(!empty($order)) {
			foreach($order as $r) {
				$datetime_exp = explode(' ', $r->order_datetime_create);
				$time_exp = explode(':', $datetime_exp[1]);
				$date_exp = explode('-', $datetime_exp[0]);
?>
										<div class="bodyTB-sub">
											<div class="row">
												<div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
												<div class="col-lg-2 col-md-2 col-6">
													<div class="content-middle">
														<p><?php echo $r->order_no;?></p>
													</div>
												</div>
												<div class="col-6 d-block d-sm-none">วันที่สั่งซื้อ</div>
												<div class="col-lg-2 col-md-2 col-6">
													<div class="content-middle">
														<ul>
															<li><?php echo $date_exp[2].'/'.$date_exp[1].'/'.$date_exp[0];?></li>
															<li><?php echo $time_exp[0].':'.$time_exp[1];?></li>
														</ul>
													</div>
												</div>
												<div class="col-6 d-block d-sm-none">จำนวน</div>
												<div class="col-lg-2 col-md-2 col-6">
													<div class="content-middle">
														<p>2</p>
													</div>
												</div>
												<div class="col-6 d-block d-sm-none">ยอดรวม</div>
												<div class="col-lg-2 col-md-2 col-6">
													<div class="content-middle">
														<p>฿ <?php echo number_format($r->order_total, 0, '.', ',');?></p>
													</div>
												</div>
												<div class="col-6 d-block d-sm-none">สถานะ</div>
												<div class="col-lg-3 col-md-3 col-6">
													<div class="content-middle">
<?php 
				if($r->order_status == 'Ordering') {
?>
														<p>รอชำระเงิน</p>
<?php
				} elseif($r->order_status == 'Processing') {
?>
														<p>ชำระเงินแล้ว</p>
<?php
				} elseif($r->order_status == 'Delivery') {
?>
														<p>กำลังเตรียมจัดส่ง</p>
<?php
				} elseif($r->order_status == 'Shipped') {
?>
														<p>ขนส่งแล้ว</p>
<?php
				} elseif($r->order_status == 'Complete') {
?>
														<p>เสร็จสมบูรณ์</p>
<?php
				} elseif($r->order_status == 'Cancel') {
?>
														<p>ยกเลิก</p>
<?php
				}
?>
													</div>
												</div>
												<div class="col-lg-1 col-md-1 col-12">
													<div class="content-middle">
														<a class="button-view" href="<?php echo site_url('member_order_detail/'.$r->order_id);?>"></a>
													</div>
												</div>
											</div>
										</div>
<?php
			}
		}
	}

	public function ajaxSaveMemberShippingId() {
		$data = array(
			'member_id' => $this->session->userdata('member_id'),
			'member_shipping_status' => 'ตั้งเป็นที่อยู่หลัก',
			'member_shipping_name' => $this->input->post('member_shipping_name'),
			'member_shipping_surname' => $this->input->post('member_shipping_surname'),
			'member_shipping_tel' => $this->input->post('member_shipping_tel'),
			'member_shipping_email' => $this->input->post('member_shipping_email'),
			'member_shipping_address' => $this->input->post('member_shipping_address'),
			'member_shipping_province' => $this->input->post('member_shipping_province'),
			'member_shipping_amphur' => $this->input->post('member_shipping_amphur'),
			'member_shipping_tumbol' => $this->input->post('member_shipping_tumbol'),
			'member_shipping_postcode' => $this->input->post('member_shipping_postcode'),
			'member_shipping_datetime_update' => date('Y-m-d H:i:s')
		);

		$where = array(
			'member_shipping_id' => $this->input->post('member_shipping_id')
		);

		$this->db->update('ci_member_shipping', $data, $where);
	}

	public function delete_member_shipping($member_shipping_id) {
		$where = array(
			'member_shipping_id' => $member_shipping_id
		);

		$this->db->delete('ci_member_shipping', $where);

		$this->db->where('member_id', $this->session->userdata('member_id'));
		$query = $this->db->get('ci_member_shipping');

		$rows = $query->result();

		$count = count($rows);

		if($count == 1) {
			$data = array(
				'member_shipping_status' => 'ที่อยู่หลัก',
				'member_shipping_datetime_update' => date('Y-m-d H:i:s')
			);

			$where = array(
				'member_id' => $this->session->userdata('member_id')
			);

			$this->db->update('ci_member_shipping', $data, $where);
		}

		redirect('member_address');
	}

	public function changeStatusShipping($member_shipping_id) {
		$data = array(
			'member_shipping_status' => 'ตั้งเป็นที่อยู่หลัก'
		);
		
		$where = array(
			'member_id' => $this->session->userdata('member_id')
		);

		$this->db->update('ci_member_shipping', $data, $where);

		$data = array(
			'member_shipping_status' => 'ที่อยู่หลัก'
		);

		$where = array(
			'member_shipping_id' => $member_shipping_id
		);

		$this->db->update('ci_member_shipping', $data, $where);

		redirect('member_address');
	}

	public function ajaxSize() {
		$this->db->order_by('ci_map_product.map_product_id', 'asc');
		$this->db->where('ci_map_product.color_id', $this->input->post('color_id'));
		$this->db->group_by('ci_map_product.size_id');
		$this->db->join('ci_size', 'ci_map_product.size_id = ci_size.size_id', 'inner');
		$query = $this->db->get('ci_map_product');

		$rows = $query->result();

		if(!empty($rows)) {
			foreach($rows as $r) {
?>
				<div class="option-list">
					<div class="optionBox-name">
						<input type="radio" id="size_<?php echo $r->size_id;?>" name="product-size" value="<?php echo $r->size_id;?>" onclick="clickSize(this.value);">
						<label for="size_<?php echo $r->size_id;?>"><?php echo get2Lang($this->session->userdata('lang'), $r->size_name_th, $r->size_name_en);?></label>
					</div>
				</div>
<?php
			}
		}
	}

	public function ajaxForgetPassword() {
		$this->db->where('member_email', $this->input->post('member_email'));
		$query = $this->db->get('ci_member');

		$row = $query->row();

		if(!empty($row)) {
			$this->load->helper('phpmailer');

			$sender[] = $this->input->post('member_email');

			$subject = 'Srithai : Forget Password';

			$new_password = substr(md5(rand()), 0, 5);
			$message = 'New Password : '.$new_password;

			$from_email = 'noreply.srithai@gmail.com';

			$from_name = 'Contact Srithai';

			send_email($sender, $subject, $message, $from_email, $from_name);

			$data_pass = array(
				'member_password' => $new_password
			);

			$where_pass = array(
				'member_email' => $this->input->post('member_email')
			);

			$this->db->update('ci_member', $data_pass, $where_pass);

			echo 'true';
		} else {
			echo 'Not Email is System';
		}
	}

	public function genOrderNo() {
		$year = date('Y');

		$year_ = $year[2].$year[3];
		$month_ = date('m');
		
		$this->db->order_by('order_id', 'desc');
		$this->db->like('order_no', $year_.$month_, 'after');
		$query = $this->db->get('ci_order');

		$row = $query->row();

		if(!empty($row)) {
			if($row->order_no[4] == '0' and $row->order_no[5] == '0' and $row->order_no[6] == '0') {
				$order_no = intval($row->order_no[7]) + 1;
			} elseif($row->order_no[4] == '0' and $row->order_no[5] == '0') {
				$order_no = intval($row->order_no[6].$row->order_no[7]) + 1;
			} elseif($row->order_no[4] == '0') {
				$order_no = intval($row->order_no[5].$row->order_no[6].$row->order_no[7]) + 1;
			}

			if(strlen($order_no) == 4) {
				$order_no_ = $order_no;
			} elseif(strlen($order_no) == 3) {
				$order_no_ = '0'.$order_no;
			} elseif(strlen($order_no) == 2) {
				$order_no_ = '00'.$order_no;
			} elseif(strlen($order_no) == 1) {
				$order_no_ = '000'.$order_no;
			}
		} else {
			$order_no_ = '0001';
		}

		$order_no__ = $year_.$month_.$order_no_;

		return $order_no__;
	}

	public function privacy() {
		echo 'Privacy';
	}

	public function service() {
		echo 'Service';
	}

	public function delete() {
		echo 'Delete';
	}

	public function ajaxFacebook() {
		$this->db->where('member_facebook_id', $this->input->post('id'));
		$query = $this->db->get('ci_member');

		$row = $query->row();

		if(!empty($row)) {
			$name_exp = explode(' ', $this->input->post('member_name'));
			$data_post = array(
				'member_name' => $name_exp[0],
				'member_surname' => @$name_exp[1],
				'member_datetime_update' => date('Y-m-d H:i:s')
			);

			$where_post = array(
				'member_facebook_id' => $this->input->post('id')
			);

			$this->db->update('ci_member', $data_post, $where_post);

			$data_sess = array(
				'member_id' => $row->member_id
			);

			$this->session->set_userdata($data_sess);
		} else {
			$name_exp = explode(' ', $this->input->post('member_name'));
			$data_post = array(
				'member_facebook_id' => $this->input->post('id'),
				'member_name' => $name_exp[0],
				'member_surname' => @$name_exp[1],
				'member_datetime_create' => date('Y-m-d H:i:s'),
				'member_datetime_update' => date('Y-m-d H:i:s')
			);

			$this->db->insert('ci_member', $data_post);

			$this->db->order_by('member_id', 'desc');
			$query = $this->db->get('ci_member');

			$row = $query->row();

			if(!empty($row)) {
				$data_sess = array(
					'member_id' => $row->member_id
				);

				$this->session->set_userdata($data_sess);
			}
		}
	}

	public function ajaxGoogle() {
		//Include Google Client Library for PHP autoload file
		require_once FCPATH.'vendor/autoload.php';

		// Google Project API Credentials
		$clientId = '322558949464-o9h2qi31ko4unvavi7qf9t7fb4t9021b.apps.googleusercontent.com';
		$clientSecret = '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';
		$redirectUrl = site_url('frontend/path/ajaxGoogle');

		//Make object of Google API Client for call Google API
		$google_client = new Google_Client();

		//Set the OAuth 2.0 Client ID
		$google_client->setClientId($clientId);

		//Set the OAuth 2.0 Client Secret key
		$google_client->setClientSecret($clientSecret);

		//Set the OAuth 2.0 Redirect URI
		$google_client->setRedirectUri($redirectUrl);

		//
		$google_client->addScope('email');
		$google_client->addScope('profile');
		
		if(isset($_GET["code"]))
		{

			//It will Attempt to exchange a code for an valid authentication token.
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

			//pre($token);

			//This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
			if(!isset($token['error']))
			{
				//Set the access token used for requests
				$google_client->setAccessToken($token['access_token']);

				//Store "access_token" value in $_SESSION variable for future use.
				$_SESSION['access_token'] = $token['access_token'];

				//Create Object of Google Service OAuth 2 class
				$google_service = new Google_Service_Oauth2($google_client);

				//Get user profile data from google
				$data = $google_service->userinfo->get();

				//Below you can find Get profile data and store into $_SESSION variable
			 
				// Start
				$this->db->where('member_email', $data['email']);
				$query = $this->db->get('ci_member');

				$row = $query->row();

				if(!empty($row)) {
					// update
					$where = array(
						'member_email' => $data['email']
					);

					$data = array(
						'member_name' => $data['given_name'],
						'member_surname' => $data['family_name'],
						'member_datetime_update'=> date('Y-m-d H:i:s')
					);

					$this->db->update('ci_member', $data, $where);

					$data_sess = array(
						'member_id' => $row->member_id
					);

					$this->session->set_userdata($data_sess);
				} else {
					// insert
					$data = array(
						'member_email' => $data['email'],
						'member_name' => $data['given_name'],
						'member_surname' => $data['family_name'],
						'member_datetime_create'=> date('Y-m-d H:i:s'),
						'member_datetime_update'=> date('Y-m-d H:i:s')
					);

					$this->db->insert('ci_member', $data);

					$this->db->order_by('member_id', 'desc');
					$this->db->limit(1);
					$query = $this->db->get('ci_member');

					$row = $query->row();

					if(!empty($row)) {
						$data_sess = array(
							'member_id' => $row->member_id
						);

						$this->session->set_userdata($data_sess);
					}
				}

				redirect(site_url('member_profile'));
			}
		}
	}

	public function ajaxCheckout() {
		$data_sess = array(
			'order_note' => $this->input->post('order_note'),
			'order_shipping_method' => $this->input->post('shipping_method'),
			'order_payment_method' => $this->input->post('payment_method')
		);

		$this->session->set_userdata($data_sess);

		$member_shipping_id = $this->input->post('member_shipping_id');
		
		//pre($member_shipping_id);
		//pre($_POST);

		/*if($this->input->post('member_shipping_id') != '') {
			$member_shipping_id = $this->input->post('member_shipping_id');

			$order_name = 'order_name_'.$member_shipping_id;
			$order_surname = 'order_surname_'.$member_shipping_id;
			$order_tel = 'order_tel_'.$member_shipping_id;
			$order_email = 'order_email_'.$member_shipping_id;
			$order_address = 'order_address_'.$member_shipping_id;
			$order_province = 'order_province_'.$member_shipping_id;
			$order_amphur = 'order_amphur_'.$member_shipping_id;
			$order_tumbol = 'order_tumbol_'.$member_shipping_id;
			$order_postcode = 'order_postcode_'.$member_shipping_id;

			$data_post = array(
				'member_shipping_name' => $this->input->post($order_name),
				'member_shipping_surname' => $this->input->post($order_surname),
				'member_shipping_tel' => $this->input->post($order_tel),
				'member_shipping_email' => $this->input->post($order_email),
				'member_shipping_address' => $this->input->post($order_address),
				'member_shipping_province' => $this->input->post($order_province),
				'member_shipping_amphur' => $this->input->post($order_amphur),
				'member_shipping_tumbol' => $this->input->post($order_tumbol),
				'member_shipping_postcode' => $this->input->post($order_postcode)
			);

				$where_post = array(
					'member_shipping_id' => $this->input->post('member_shipping_id')
				);

				$this->db->update('ci_member_shipping', $data_post, $where_post);
			}
		}*/

		if($this->input->post('payment_method') == 'Bank Transfer') {
			// ตัด คูปอง
			$this->model_frontend->setCouponStock($this->session->userdata('coupon_id'));

			$sub_total = 0;
			foreach($this->cart->contents() as $items) {
				$price = $items['price'] * $items['qty'];

				$sub_total += $price;
			}

			$shipping = $this->session->userdata('order_shipping');

			if($this->session->userdata('coupon_price') != '') {
				$discount = $this->session->userdata('coupon_price') + $this->session->userdata('multiple_price_level_discount') + $this->session->userdata('special_promotion_rule_discount') + $this->session->userdata('discount_category_discount') + $this->session->userdata('data_point_discount') + $this->session->userdata('vip_discount_price');
			} else {
				$discount = 0 + $this->session->userdata('multiple_price_level_discount') + $this->session->userdata('special_promotion_rule_discount') + $this->session->userdata('discount_category_discount') + $this->session->userdata('data_point_discount') + $this->session->userdata('vip_discount_price');
			}

			$total = $sub_total + $shipping - $discount;

			// หา Point Per Baht
			$point_per_baht = $this->model_frontend->getPointPerBaht();
			
			// หา Point
			if(!empty($point_per_baht) and $point_per_baht->point_per_baht_amount != 0) {
				$order_point = $sub_total / $point_per_baht->point_per_baht_amount;
			} else {
				$order_point = $sub_total / 1;
			}

			$order_no = $this->genOrderNo();

			if($this->session->userdata('data_point') != '') {
				$order_use_point = $this->session->userdata('data_point');
			} else {
				$order_use_point = 0;
			}

			// Change ViP And สะสมยอดการสั่งซื้อ
			// $member = $this->model_frontend->get_member_profile_record_();
			// if(!empty($member)) {
			// 	//$member_order_amount = $member->member_order_amount + $total;
			// 	$member_order_amount = $member->member_order_amount + $order_point;

			// 	$member_vip = $this->model_frontend->getVip($member_order_amount);

			// 	$data_member = array(
			// 		'vip_id' => $member_vip->vip_id,
			// 		'member_order_amount' => $member_order_amount
			// 	);

			// 	$where_member = array(
			// 		'member_id' => $this->session->userdata('member_id')
			// 	);

			// 	$this->db->update('ci_member', $data_member, $where_member);
			// }

			if($this->session->userdata('coupon_id') != '') {
				$coupon_id = $this->session->userdata('coupon_id');
			} else {
				$coupon_id = 0;
			}

			if($this->input->post('shipping') == 'default') {
				$data_type = array('shipping_type');
				$this->session->unset_userdata($data_type);

				$data_type = array('shipping_type' => 'default');
				$this->session->set_userdata($data_type);

				$row = $this->model_frontend->get_shipping_address_status_main();

				$data = array(
					'member_id' => $this->session->userdata('member_id'),
					'coupon_id' => $coupon_id,
					'order_no' => $order_no,
					'order_point' => $order_point,
					'order_use_point' => $order_use_point,
					'order_sub_total' => $sub_total,
					'order_shipping' => $shipping,
					'order_discount' => $discount,
					'order_total' => $total,
					'order_name' => $row->member_shipping_name,
					'order_surname' => $row->member_shipping_surname,
					'order_tel' => $row->member_shipping_tel,
					'order_email' => $row->member_shipping_email,
					'order_address' => $row->member_shipping_address,
					'order_province' => $row->member_shipping_province,
					'order_amphur' => $row->member_shipping_amphur,
					'order_tumbol' => $row->member_shipping_tumbol,
					'order_postcode' => $row->member_shipping_postcode,
					'order_note' => $this->input->post('order_note'),
					'order_shipping_method' => $this->input->post('shipping_method'),
					'order_payment_method' => $this->input->post('payment_method'),
					'order_status' => 'Ordering',
					'order_datetime_create' => date('Y-m-d H:i:s'),
					'order_datetime_update' => date('Y-m-d H:i:s'),
				);

				if($this->input->post('switch') == 'Yes') {
					$data['order_billing_name'] = $this->input->post('order_billing_name');
					$data['order_billing_surname'] = $this->input->post('order_billing_surname');
					$data['order_billing_card_id'] = $this->input->post('order_billing_card_id');
					$data['order_billing_tel'] = $this->input->post('order_billing_tel');
					$data['order_billing_email'] = $this->input->post('order_billing_email');
					$data['order_billing_address'] = $this->input->post('order_billing_address');
					$data['order_billing_province'] = $this->input->post('order_billing_province');
					$data['order_billing_amphur'] = $this->input->post('order_billing_amphur');
					$data['order_billing_tumbol'] = $this->input->post('order_billing_tumbol');
					$data['order_billing_postcode'] = $this->input->post('order_billing_postcode');
					$data['order_note'] = $this->input->post('order_note');
					$data['switch'] = $this->input->post('switch');
				} else {
					$data['order_billing_name'] = $row->member_shipping_name;
					$data['order_billing_surname'] = $row->member_shipping_surname;
					$data['order_billing_tel'] = $row->member_shipping_tel;
					$data['order_billing_email'] = $row->member_shipping_email;
					$data['order_billing_address'] = $row->member_shipping_address;
					$data['order_billing_province'] = $row->member_shipping_province;
					$data['order_billing_amphur'] = $row->member_shipping_amphur;
					$data['order_billing_tumbol'] = $row->member_shipping_tumbol;
					$data['order_billing_postcode'] = $row->member_shipping_postcode;
					$data['order_note'] = $this->input->post('order_note');
					$data['switch'] = 'No';
				}

				$this->session->set_userdata($data);

				$order_email = $row->member_shipping_email;

				$this->db->insert('ci_order', $data);

				$this->db->order_by('order_id', 'desc');
				$query = $this->db->get('ci_order');
				$row = $query->row();

				if(!empty($row)) {
					foreach($this->cart->contents() as $items) {
						$data_detail = array(
							'order_id' => $row->order_id,
							'product_id' => $items['id'],
							'order_detail_qty' => $items['qty'],
							'order_detail_price' => $items['price'],
							'order_detail_name' => $items['name'],
							'order_detail_image' => $items['options']['image'],
							'order_detail_price_before_discount' => $items['options']['price_before_discount'],
							'order_detail_color' => $items['options']['color'],
							'order_detail_size' => $items['options']['size'],
							'order_detail_code' => $items['options']['code'],
							'promotion_buy_and_giveaway' => $items['options']['promotion_buy_and_giveaway'],
							'promotion_get_set' => $items['options']['promotion_get_set'],
							'promotion_point' => $items['options']['promotion_point'],
							'promotion_auto_add_gift' => $items['options']['promotion_auto_add_gift'],
							'promotion_special_rule' => $items['options']['promotion_special_rule'],
							'promotion_category_reduction' => $items['options']['promotion_category_reduction'],
							'promotion_multiple_price_levels' => $items['options']['promotion_multiple_price_levels'],
							'weight' => $items['options']['weight'],
							'order_detail_datetime_create' => date('Y-m-d H:i:s'),
							'order_detail_datetime_update' => date('Y-m-d H:i:s')
						);

						$this->db->insert('ci_order_detail', $data_detail);
					}

					// ส่งอีเมล์แจ้งเตือน
					$row = $this->model_frontend->getOrderLastId();

					if(!empty($row)) {
						$order_detail = $this->model_frontend->getOrderDetailResult($row->order_id);

						if($this->session->userdata('lang') == 'th') {
							$address = $row->order_address.' '.$this->model_frontend->get_tumbol_record($row->order_tumbol)->name_in_thai.' '.$this->model_frontend->get_amphur_record($row->order_amphur)->name_in_thai.' '.$this->model_frontend->get_province_record($row->order_province)->name_in_thai.' '.$row->order_postcode;
						} else {
							$address = $row->order_address.' '.$this->model_frontend->get_tumbol_record($row->order_tumbol)->name_in_english.' '.$this->model_frontend->get_amphur_record($row->order_amphur)->name_in_english.' '.$this->model_frontend->get_province_record($row->order_province)->name_in_english.' '.$row->order_postcode;
						}

						$this->load->helper('phpmailer');

						$sender = array($order_email);
						//$sender[] = 'sitiporn@orange-thailand.com';

						$subject = 'Srithai: Order No '.$order_no;

						$message = '
							<div align="center"><img src="'.base_url('asset/frontend/images/logo_email.png').'" width="150"></div>
							<p>เรียน คุณ '.$row->order_name.' '.$row->order_surname.'</p>

							<p>คำสั่งซื้อหมายเลข #'.$row->order_no.' ของคุณได้รับการยืนยันการชำระเงินเรียบรอยแล้ว เราจะทำการจัดส่งสินค้าให้คุณ</p>

							<p>
								<b>รายละเอียดคำสั่งซื้อ</b>
								<table width="100%">
									<tr>
										<td width="60%">หมายเลขคำสั่งซื้อ:</td><td>#'.$row->order_no.'</td>
									</tr>
									<tr>
										<td>วันที่สั่งซื้อ:</td><td>'.$row->order_datetime_create.'</td>
									</tr>
								</table>
							</p>
							<p>
								<table width="100%">';
						if(!empty($order_detail)) {
							foreach($order_detail as $r) {
								$message .= '
									<tr>
										<td width="200"><img src="'.base_url('uploads/product/'.$r->order_detail_image).'" width="150"></td>
										<td>
											'.$r->order_detail_name.'<br>
											THB '.number_format($r->order_detail_price, 0, '.', ',').'<br>
											จำนวน: '.$r->order_detail_qty.'
										</td>
									</tr>
								';
							}
						}

						$message .= '
								</table>
							</p>
							<p>
								<table width="100%">
									<tr>
										<td width="60%">ยอดรวม:</td><td>THB '.$row->order_sub_total.'</td>
									</tr>
									<tr>
										<td>คูปองส่วนลด:</td><td>THB '.$row->order_discount.'</td>
									</tr>
									<tr>
										<td">ค่าธรรมเนียมจัดส่ง:</td><td>THB '.$row->order_shipping.'</td>
									</tr>
									<tr>
										<td>ยอดรวมทั้งหมด(รวม VAT):</td><td>THB '.$row->order_total.'</td>
									</tr>
								</table>
							</p>

							<p>
								<b>รายละเอียดการส่งสินค้า</b><br>
								ชื่อผู้รับ: '.$row->order_name.' '.$row->order_surname.'<br>
								หมายเลขโทรศัพท์: '.$row->order_tel.'<br>
								ที่อยู่ในการจัดส่งสินค้า: '.$address.'<br>
							</p>

							<p>
								<b>CONTACT INFORMATION</b><br>
								15 ถนนสุขสวัสดิ์ ซอย 36 แขวงบางปะกอก เขตราษฏร์บูรณะ กรุงเทพฯ 10400<br>
								+66(0) 2427 0088 #6584 (จันทร์ - ศุกร์ เวลา 09.00 - 17.00 น.)<br>
								<a href="mailto:E-com@srithaisuperware.com">E-com@srithaisuperware.com</a>
							</p>
						';

						$from_email = 'noreply.srithai@gmail.com';
						$from_name = 'Srithai Superware';

						if($_SERVER['SERVER_NAME'] != 'localhost' and $_SERVER['SERVER_NAME'] != 'ford.orangeworkshop.info') {
							send_email($sender, $subject, $message, $from_email, $from_name);
						}
					}
				}

				$data_unset = array(
					'coupon_id',
					'coupon_code',
					'coupon_price',
					'multiple_price_level_discount',
					'special_promotion_rule_discount',
					'discount_category_discount',
					'point_id',
					'data_point_discount',
					'data_point',
					'vip_discount',
					'vip_discount_price',
				);

				$this->session->unset_userdata($data_unset);

				$this->cart->destroy();
			} elseif($this->input->post('shipping') == 'new') {
				$data_type = array('shipping_type');
				$this->session->unset_userdata($data_type);

				$data_type = array('shipping_type' => 'new');
				$this->session->set_userdata($data_type);

				// begin choose Address
				$this->db->where('member_shipping_id', $member_shipping_id);
				$query = $this->db->get('ci_member_shipping');

				$row = $query->row();

				if(!empty($row)) {
					$data = array(
						'member_id' => $this->session->userdata('member_id'),
						'coupon_id' => $coupon_id,
						'order_no' => $order_no,
						'order_point' => $order_point,
						'order_use_point' => $order_use_point,
						'order_sub_total' => $sub_total,
						'order_shipping' => $shipping,
						'order_discount' => $discount,
						'order_total' => $total,
						'order_name' => $row->member_shipping_name,
						'order_surname' => $row->member_shipping_surname,
						'order_tel' => $row->member_shipping_tel,
						'order_email' => $row->member_shipping_email,
						'order_address' => $row->member_shipping_address,
						'order_province' => $row->member_shipping_province,
						'order_amphur' => $row->member_shipping_amphur,
						'order_tumbol' => $row->member_shipping_tumbol,
						'order_postcode' => $row->member_shipping_postcode,
						'order_shipping_method' => $this->input->post('shipping_method'),
						'order_payment_method' => $this->input->post('payment_method'),
						'order_status' => 'Ordering',
						'order_datetime_create' => date('Y-m-d H:i:s'),
						'order_datetime_update' => date('Y-m-d H:i:s')
					);
	
					if($this->input->post('switch') == 'Yes') {
						$data['order_billing_name'] = $this->input->post('order_billing_name');
						$data['order_billing_surname'] = $this->input->post('order_billing_surname');
						$data['order_billing_card_id'] = $this->input->post('order_billing_card_id');
						$data['order_billing_tel'] = $this->input->post('order_billing_tel');
						$data['order_billing_email'] = $this->input->post('order_billing_email');
						$data['order_billing_address'] = $this->input->post('order_billing_address');
						$data['order_billing_province'] = $this->input->post('order_billing_province');
						$data['order_billing_amphur'] = $this->input->post('order_billing_amphur');
						$data['order_billing_tumbol'] = $this->input->post('order_billing_tumbol');
						$data['order_billing_postcode'] = $this->input->post('order_billing_postcode');
						$data['order_note'] = $this->input->post('order_note');
						$data['switch'] = $this->input->post('switch');
					} else {
						$data['order_billing_name'] = $row->member_shipping_name;
						$data['order_billing_surname'] = $row->member_shipping_surname;
						$data['order_billing_tel'] = $row->member_shipping_tel;
						$data['order_billing_email'] = $row->member_shipping_email;
						$data['order_billing_address'] = $row->member_shipping_address;
						$data['order_billing_province'] = $row->member_shipping_province;
						$data['order_billing_amphur'] = $row->member_shipping_amphur;
						$data['order_billing_tumbol'] = $row->member_shipping_tumbol;
						$data['order_billing_postcode'] = $row->member_shipping_postcode;
						$data['order_note'] = $this->input->post('order_note');
						$data['switch'] = 'No';
					}
				}

				// end choose Address

				$this->session->set_userdata($data);

				$order_email = $this->input->post('order_email');

				$this->db->insert('ci_order', $data);

				$this->db->order_by('order_id', 'desc');
				$query = $this->db->get('ci_order');
				$row = $query->row();

				if(!empty($row)) {
					foreach($this->cart->contents() as $items) {
						$data_detail = array(
							'order_id' => $row->order_id,
							'product_id' => $items['id'],
							'order_detail_qty' => $items['qty'],
							'order_detail_price' => $items['price'],
							'order_detail_name' => $items['name'],
							'order_detail_image' => $items['options']['image'],
							'order_detail_price_before_discount' => $items['options']['price_before_discount'],
							'order_detail_color' => $items['options']['color'],
							'order_detail_size' => $items['options']['size'],
							'order_detail_code' => $items['options']['code'],
							'promotion_buy_and_giveaway' => $items['options']['promotion_buy_and_giveaway'],
							'promotion_get_set' => $items['options']['promotion_get_set'],
							'promotion_point' => $items['options']['promotion_point'],
							'promotion_auto_add_gift' => $items['options']['promotion_auto_add_gift'],
							'promotion_special_rule' => $items['options']['promotion_special_rule'],
							'promotion_category_reduction' => $items['options']['promotion_category_reduction'],
							'promotion_multiple_price_levels' => $items['options']['promotion_multiple_price_levels'],
							'weight' => $items['options']['weight'],
							'order_detail_datetime_create' => date('Y-m-d H:i:s'),
							'order_detail_datetime_update' => date('Y-m-d H:i:s')
						);

						$this->db->insert('ci_order_detail', $data_detail);
					}

					// ส่งอีเมล์แจ้งเตือน
					$row = $this->model_frontend->getOrderLastId();

					if(!empty($row)) {
						$order_detail = $this->model_frontend->getOrderDetailResult($row->order_id);

						if($this->session->userdata('lang') == 'th') {
							$address = $row->order_address.' '.$this->model_frontend->get_tumbol_record($row->order_tumbol)->name_in_thai.' '.$this->model_frontend->get_amphur_record($row->order_amphur)->name_in_thai.' '.$this->model_frontend->get_province_record($row->order_province)->name_in_thai.' '.$row->order_postcode;
						} else {
							$address = $row->order_address.' '.$this->model_frontend->get_tumbol_record($row->order_tumbol)->name_in_english.' '.$this->model_frontend->get_amphur_record($row->order_amphur)->name_in_english.' '.$this->model_frontend->get_province_record($row->order_province)->name_in_english.' '.$row->order_postcode;
						}

						$this->load->helper('phpmailer');

						$sender = array($order_email);
						//$sender[] = 'sitiporn@orange-thailand.com';

						$subject = 'Srithai: Order No '.$order_no;

						$message = '
							<div align="center"><img src="'.base_url('asset/frontend/images/logo_email.png').'" width="150"></div>
							<p>เรียน คุณ '.$row->order_name.' '.$row->order_surname.'</p>

							<p>คำสั่งซื้อหมายเลข #'.$row->order_no.' ของคุณได้รับการยืนยันการชำระเงินเรียบรอยแล้ว เราจะทำการจัดส่งสินค้าให้คุณ</p>

							<p>
								<b>รายละเอียดคำสั่งซื้อ</b>
								<table width="100%">
									<tr>
										<td width="60%">หมายเลขคำสั่งซื้อ:</td><td>#'.$row->order_no.'</td>
									</tr>
									<tr>
										<td>วันที่สั่งซื้อ:</td><td>'.$row->order_datetime_create.'</td>
									</tr>
								</table>
							</p>
							<p>
								<table width="100%">';
						if(!empty($order_detail)) {
							foreach($order_detail as $r) {
								$message .= '
									<tr>
										<td width="200"><img src="'.base_url('uploads/product/'.$r->order_detail_image).'" width="150"></td>
										<td>
											'.$r->order_detail_name.'<br>
											THB '.number_format($r->order_detail_price, 0, '.', ',').'<br>
											จำนวน: '.$r->order_detail_qty.'
										</td>
									</tr>
								';
							}
						}

						$message .= '
								</table>
							</p>
							<p>
								<table width="100%">
									<tr>
										<td width="60%">ยอดรวม:</td><td>THB '.$row->order_sub_total.'</td>
									</tr>
									<tr>
										<td>คูปองส่วนลด:</td><td>THB '.$row->order_discount.'</td>
									</tr>
									<tr>
										<td">ค่าธรรมเนียมจัดส่ง:</td><td>THB '.$row->order_shipping.'</td>
									</tr>
									<tr>
										<td>ยอดรวมทั้งหมด(รวม VAT):</td><td>THB '.$row->order_total.'</td>
									</tr>
								</table>
							</p>

							<p>
								<b>รายละเอียดการส่งสินค้า</b><br>
								ชื่อผู้รับ: '.$row->order_name.' '.$row->order_surname.'<br>
								หมายเลขโทรศัพท์: '.$row->order_tel.'<br>
								ที่อยู่ในการจัดส่งสินค้า: '.$address.'<br>
							</p>

							<p>
								<b>CONTACT INFORMATION</b><br>
								15 ถนนสุขสวัสดิ์ ซอย 36 แขวงบางปะกอก เขตราษฏร์บูรณะ กรุงเทพฯ 10400<br>
								+66(0) 2427 0088 #6584 (จันทร์ - ศุกร์ เวลา 09.00 - 17.00 น.)<br>
								<a href="mailto:E-com@srithaisuperware.com">E-com@srithaisuperware.com</a>
							</p>
						';

						$from_email = 'noreply.srithai@gmail.com';
						$from_name = 'Srithai Superware';

						if($_SERVER['SERVER_NAME'] != 'localhost' and $_SERVER['SERVER_NAME'] != 'ford.orangeworkshop.info') {
							send_email($sender, $subject, $message, $from_email, $from_name);
						}
					}
				}

				$data_unset = array(
					'coupon_id',
					'coupon_code',
					'coupon_price',
					'multiple_price_level_discount',
					'special_promotion_rule_discount',
					'discount_category_discount',
					'point_id',
					'data_point_discount',
					'data_point',
					'vip_discount',
					'vip_discount_price',
				);

				$this->session->unset_userdata($data_unset);

				$this->cart->destroy();
			}

			echo $row->order_id;
		} else {
			// ตัด คูปอง

			$sub_total = 0;
			foreach($this->cart->contents() as $items) {
				$price = $items['price'] * $items['qty'];

				$sub_total += $price;
			}

			$shipping = $this->session->userdata('order_shipping');

			if($this->session->userdata('coupon_price') != '') {
				$discount = $this->session->userdata('coupon_price') + $this->session->userdata('multiple_price_level_discount') + $this->session->userdata('special_promotion_rule_discount') + $this->session->userdata('discount_category_discount') + $this->session->userdata('data_point_discount') + $this->session->userdata('vip_discount_price');
			} else {
				$discount = 0 + $this->session->userdata('multiple_price_level_discount') + $this->session->userdata('special_promotion_rule_discount') + $this->session->userdata('discount_category_discount') + $this->session->userdata('data_point_discount') + $this->session->userdata('vip_discount_price');
			}

			$total = $sub_total + $shipping - $discount;

			// หา Point Per Baht
			$point_per_baht = $this->model_frontend->getPointPerBaht();
			
			// หา Point
			if(!empty($point_per_baht) and $point_per_baht->point_per_baht_amount != 0) {
				$order_point = $sub_total / $point_per_baht->point_per_baht_amount;
			} else {
				$order_point = $sub_total / 1;
			}

			$order_no = $this->genOrderNo();

			if($this->session->userdata('data_point') != '') {
				$order_use_point = $this->session->userdata('data_point');
			} else {
				$order_use_point = 0;
			}

			// Change ViP And สะสมยอดการสั่งซื้อ
			// $member = $this->model_frontend->get_member_profile_record();
			// if(!empty($member)) {
			// 	//$member_order_amount = $member->member_order_amount + $total;
			// 	$member_order_amount = $member->member_order_amount + $order_point;

			// 	$member_vip = $this->model_frontend->getVip($member_order_amount);

			// 	$data_member = array(
			// 		'vip_id' => $member_vip->vip_id,
			// 		'member_order_amount' => $member_order_amount
			// 	);

			// 	$where_member = array(
			// 		'member_id' => $this->session->userdata('member_id')
			// 	);

			// 	$this->db->update('ci_member', $data_member, $where_member);
			// }

			if($this->session->userdata('coupon_id') != '') {
				$coupon_id = $this->session->userdata('coupon_id');
			} else {
				$coupon_id = 0;
			}

			if($this->input->post('shipping') == 'default') {
				$data_type = array('shipping_type');
				$this->session->unset_userdata($data_type);

				$data_type = array('shipping_type' => 'default');
				$this->session->set_userdata($data_type);

				$row = $this->model_frontend->get_shipping_address_status_main();

				$data = array(
					'member_id' => $this->session->userdata('member_id'),
					'coupon_id' => $coupon_id,
					'order_no' => $order_no,
					'order_point' => $order_point,
					'order_use_point' => $order_use_point,
					'order_sub_total' => $sub_total,
					'order_shipping' => $shipping,
					'order_discount' => $discount,
					'order_total' => $total,
					'order_name' => $row->member_shipping_name,
					'order_surname' => $row->member_shipping_surname,
					'order_tel' => $row->member_shipping_tel,
					'order_email' => $row->member_shipping_email,
					'order_address' => $row->member_shipping_address,
					'order_province' => $row->member_shipping_province,
					'order_amphur' => $row->member_shipping_amphur,
					'order_tumbol' => $row->member_shipping_tumbol,
					'order_postcode' => $row->member_shipping_postcode,
					'order_note' => $this->input->post('order_note'),
					'order_shipping_method' => $this->input->post('shipping_method'),
					'order_payment_method' => $this->input->post('payment_method'),
					'order_status' => 'Ordering',
					'order_datetime_create' => date('Y-m-d H:i:s'),
					'order_datetime_update' => date('Y-m-d H:i:s'),
				);

				if($this->input->post('switch') == 'Yes') {
					$data['order_billing_name'] = $this->input->post('order_billing_name');
					$data['order_billing_surname'] = $this->input->post('order_billing_surname');
					$data['order_billing_card_id'] = $this->input->post('order_billing_card_id');
					$data['order_billing_tel'] = $this->input->post('order_billing_tel');
					$data['order_billing_email'] = $this->input->post('order_billing_email');
					$data['order_billing_address'] = $this->input->post('order_billing_address');
					$data['order_billing_province'] = $this->input->post('order_billing_province');
					$data['order_billing_amphur'] = $this->input->post('order_billing_amphur');
					$data['order_billing_tumbol'] = $this->input->post('order_billing_tumbol');
					$data['order_billing_postcode'] = $this->input->post('order_billing_postcode');
					$data['order_note'] = $this->input->post('order_note');
					$data['switch'] = $this->input->post('switch');
				} else {
					$data['order_billing_name'] = $row->member_shipping_name;
					$data['order_billing_surname'] = $row->member_shipping_surname;
					$data['order_billing_tel'] = $row->member_shipping_tel;
					$data['order_billing_email'] = $row->member_shipping_email;
					$data['order_billing_address'] = $row->member_shipping_address;
					$data['order_billing_province'] = $row->member_shipping_province;
					$data['order_billing_amphur'] = $row->member_shipping_amphur;
					$data['order_billing_tumbol'] = $row->member_shipping_tumbol;
					$data['order_billing_postcode'] = $row->member_shipping_postcode;
					$data['order_note'] = $this->input->post('order_note');
					$data['switch'] = 'No';
				}

				$this->session->set_userdata($data);

				$order_email = $row->member_shipping_email;
			} elseif($this->input->post('shipping') == 'new') {
				$data_type = array('shipping_type');
				$this->session->unset_userdata($data_type);

				$data_type = array('shipping_type' => 'new');
				$this->session->set_userdata($data_type);

				// begin choose Address
				$this->db->where('member_shipping_id', $member_shipping_id);
				$query = $this->db->get('ci_member_shipping');

				$row = $query->row();

				if(!empty($row)) {
					$data = array(
						'member_id' => $this->session->userdata('member_id'),
						'coupon_id' => $coupon_id,
						'order_no' => $order_no,
						'order_point' => $order_point,
						'order_use_point' => $order_use_point,
						'order_sub_total' => $sub_total,
						'order_shipping' => $shipping,
						'order_discount' => $discount,
						'order_total' => $total,
						'order_name' => $row->member_shipping_name,
						'order_surname' => $row->member_shipping_surname,
						'order_tel' => $row->member_shipping_tel,
						'order_email' => $row->member_shipping_email,
						'order_address' => $row->member_shipping_address,
						'order_province' => $row->member_shipping_province,
						'order_amphur' => $row->member_shipping_amphur,
						'order_tumbol' => $row->member_shipping_tumbol,
						'order_postcode' => $row->member_shipping_postcode,
						'order_shipping_method' => $this->input->post('shipping_method'),
						'order_payment_method' => $this->input->post('payment_method'),
						'order_status' => 'Ordering',
						'order_datetime_create' => date('Y-m-d H:i:s'),
						'order_datetime_update' => date('Y-m-d H:i:s')
					);
	
					if($this->input->post('switch') == 'Yes') {
						$data['order_billing_name'] = $this->input->post('order_billing_name');
						$data['order_billing_surname'] = $this->input->post('order_billing_surname');
						$data['order_billing_card_id'] = $this->input->post('order_billing_card_id');
						$data['order_billing_tel'] = $this->input->post('order_billing_tel');
						$data['order_billing_email'] = $this->input->post('order_billing_email');
						$data['order_billing_address'] = $this->input->post('order_billing_address');
						$data['order_billing_province'] = $this->input->post('order_billing_province');
						$data['order_billing_amphur'] = $this->input->post('order_billing_amphur');
						$data['order_billing_tumbol'] = $this->input->post('order_billing_tumbol');
						$data['order_billing_postcode'] = $this->input->post('order_billing_postcode');
						$data['order_note'] = $this->input->post('order_note');
						$data['switch'] = $this->input->post('switch');
					} else {
						$data['order_billing_name'] = $row->member_shipping_name;
						$data['order_billing_surname'] = $row->member_shipping_surname;
						$data['order_billing_tel'] = $row->member_shipping_tel;
						$data['order_billing_email'] = $row->member_shipping_email;
						$data['order_billing_address'] = $row->member_shipping_address;
						$data['order_billing_province'] = $row->member_shipping_province;
						$data['order_billing_amphur'] = $row->member_shipping_amphur;
						$data['order_billing_tumbol'] = $row->member_shipping_tumbol;
						$data['order_billing_postcode'] = $row->member_shipping_postcode;
						$data['order_note'] = $this->input->post('order_note');
						$data['switch'] = 'No';
					}
				}

				// end choose Address

				$this->session->set_userdata($data);

				$order_email = $this->input->post('order_email');

				//$this->db->insert('ci_order', $data);
			}

			/*$row = $this->model_frontend->getOrderLastId();

			if(!empty($row)) {
				$order_id = $row->order_id + 1;

				echo $order_id;
			}*/

			$order_no = $this->genOrderNo();

			echo $order_no;
		}
	}

	public function ajaxCheckMemberId() {
		if($this->session->userdata('member_id') != '') {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	public function ajaxCoupon() {
		$this->db->where('coupon_code', $this->input->post('coupon_code'));
		$this->db->where('coupon_begin_date <=', date('Y-m-d H:i:s'));
		$this->db->where('coupon_end_date >=', date('Y-m-d H:i:s'));
		$this->db->where('coupon_limit >', 0);
		$query = $this->db->get('ci_coupon');

		$row = $query->row();

		if(!empty($row)) {
			$sub_total = 0;
			foreach($this->cart->contents() as $items) {
				$price = $items['qty'] * $items['price'];

				$sub_total += $price;
			}

			if($row->coupon_type == '%') {
				$coupon_price = $row->coupon_discount * $sub_total / 100;
			} else {
				$coupon_price = $row->coupon_discount;
			}
			
			$data = array(
				'coupon_id' => $row->coupon_id,
				'coupon_code' => $row->coupon_code,
				'coupon_price' => $coupon_price
			);

			$this->session->set_userdata($data);
		} else {
			$data = array(
				'coupon_id',
				'coupon_code',
				'coupon_price'
			);

			$this->session->unset_userdata($data);
		}

		$this->ajaxCart();
	}

	public function ajaxSearchProduct() {
		$data = array(
			'search_inc' => $this->input->post('search_inc')
		);

		$this->session->set_userdata($data);

		//echo $this->session->userdata('search_inc');
	}

	public function ajaxInsertCartSet() {
		$this->db->where('get_set_id', $this->input->post('get_set_id'));
		$query = $this->db->get('ci_get_set');

		$row = $query->row();

		if(!empty($row)) {

			$data = array(
				'id'      => $this->input->post('get_set_id') * -1,
				'qty'     => $this->input->post('qty'),
				'price'   => $row->get_set_price,
				'name'    => get2Lang($this->session->userdata('lang'), $row->get_set_name_th, $row->get_set_name_en),
				'options' => array(
					'image' => $row->get_set_image, 
					'price_before_discount' => $row->get_set_before_discount_price,
					'color' => '-',
					'size' => '-',
					'code' => '-',
					'promotion_buy_and_giveaway' => false,
					'promotion_get_set' => true,
					'promotion_point' => false,
					'promotion_auto_add_gift' => false,
					'promotion_special_rule' => false,
					'promotion_category_reduction' => false,
					'promotion_multiple_price_levels' => false,
					'weight' => 0
				)
			);

			$this->cart->insert($data); 
		}

		$this->model_frontend->getInsertBuyAndGiveAway();

		$this->model_frontend->getAutoAddGift();

		$this->model_frontend->getMultiplePriceLevel();

		$this->model_frontend->getSpecialPromotionRule();

		$this->model_frontend->getDiscountCategory();

		$this->ajaxCart();
	}

	public function ajaxPoint() {
		$this->db->where('point_id', $this->input->post('point_id'));
		$query = $this->db->get('ci_point');

		$row = $query->row();

		if(!empty($row)) {
			$data_sess_point = array(
				'point_id' => $row->point_id,
				'data_point' => $row->point_use_point,
				'data_point_discount' => $row->point_discount
			);

			$this->session->set_userdata($data_sess_point);
		}
	
		$this->ajaxCart();
	}

	// cart
	public function ajaxInsertCart() {
		$this->db->where('product_id', $this->input->post('product_id'));
		$query = $this->db->get('ci_product');

		$row = $query->row();

		if(!empty($row)) {
			if($this->input->post('color_id') != '' and $this->input->post('size_id') != '') {
				$this->db->where('color_id', $this->input->post('color_id'));
				$query = $this->db->get('ci_color');

				$c = $query->row();

				if(!empty($c)) {
					$color = get2Lang($this->session->userdata('lang'), $c->color_name_th, $c->color_name_en);
				}

				$this->db->where('size_id', $this->input->post('size_id'));
				$query = $this->db->get('ci_size');

				$s = $query->row();

				if(!empty($s)) {
					$size = get2Lang($this->session->userdata('lang'), $s->size_name_th, $s->size_name_en);
				}

				$data = array(
					'id'      => $this->input->post('product_id'),
					'qty'     => $this->input->post('qty'),
					'price'   => $row->product_price,
					'name'    => get2Lang($this->session->userdata('lang'), $row->product_name_th, $row->product_name_en),
					'options' => array(
						'image' => $row->product_image, 
						'price_before_discount' => $row->product_price_before_discount,
						'color' => $color,
						'size' => $size,
						'code' => $row->product_code,
						'promotion_buy_and_giveaway' => false,
						'promotion_get_set' => false,
						'promotion_point' => false,
						'promotion_auto_add_gift' => false,
						'promotion_special_rule' => false,
						'promotion_category_reduction' => false,
						'promotion_multiple_price_levels' => false,
						'weight' => $row->product_weight
					)
				);
			} else {
				$data = array(
					'id'      => $this->input->post('product_id'),
					'qty'     => $this->input->post('qty'),
					'price'   => $row->product_price,
					'name'    => get2Lang($this->session->userdata('lang'), $row->product_name_th, $row->product_name_en),
					'options' => array(
						'image' => $row->product_image, 
						'price_before_discount' => $row->product_price_before_discount,
						'color' => '-',
						'size' => '-',
						'code' => $row->product_code,
						'promotion_buy_and_giveaway' => false,
						'promotion_get_set' => false,
						'promotion_point' => false,
						'promotion_auto_add_gift' => false,
						'promotion_special_rule' => false,
						'promotion_category_reduction' => false,
						'promotion_multiple_price_levels' => false,
						'weight' => $row->product_weight
					)
				);
			}
			
			$this->cart->insert($data); 
		}

		$this->model_frontend->getInsertBuyAndGiveAway();

		$this->model_frontend->getAutoAddGift();

		$this->model_frontend->getMultiplePriceLevel();

		$this->model_frontend->getSpecialPromotionRule();

		$this->model_frontend->getDiscountCategory();

		$this->ajaxCart();
	}

	public function ajaxUpdateCart() {
		$data = array(
			'rowid' => $this->input->post('rowid'),
			'qty' => $this->input->post('qty')
		);
		
		$this->cart->update($data);

		$this->model_frontend->getAutoAddGift();

		$this->model_frontend->getMultiplePriceLevel();

		$this->model_frontend->getSpecialPromotionRule();

		$this->model_frontend->getDiscountCategory();

		$this->ajaxCart();
	}

	public function ajaxRemoveCart() {
		$data = array(
			'rowid' => $this->input->post('rowid'),
			'qty' => 0
		);
		
		$this->cart->update($data);

		$this->model_frontend->getRemoveBuyAndGiveAway();

		$this->model_frontend->getAutoAddGift();

		$this->model_frontend->getMultiplePriceLevel();

		$this->model_frontend->getSpecialPromotionRule();

		$this->model_frontend->getDiscountCategory();

		$this->ajaxCart();
	}

	public function ajaxCart() {
		// [0] qty basket, class="inc_qty_basket"
		$qty = 0;
		$sub_total = 0;
		$weight = 0;
		foreach($this->cart->contents() as $items) {
			$qty += $items['qty'];

			$price = $items['qty'] * $items['price'];

			$sub_total += $price;

			$weight_ = $items['qty'] * $items['options']['weight'];

			$weight += $weight_;
		}

		echo number_format($qty, 0, '.', ',');

		echo '!@#$%^&*()';
		// [1] Sub Total, class="sub_total_price"
		echo number_format($sub_total, 2, '.', ',');

		echo '!@#$%^&*()';
		// [2] Shipping, class="shipping_price"
		$shipping_price = $this->model_frontend->getShippingPrice($weight);

		$data_sess = array(
			'order_shipping' => $shipping_price
		);

		$this->session->set_userdata($data_sess);

		$shipping = $this->session->userdata('order_shipping');
		echo number_format($shipping, 2, '.', ',');

		echo '!@#$%^&*()';
		// [3] Discount, class="discount_price"
		$vip_discount = $sub_total * $this->session->userdata('vip_discount') / 100;

		if(!empty($vip_discount) and $vip_discount > 0) {
			$data_sess = array(
				'vip_discount_price' => $vip_discount
			);

			$this->session->set_userdata($data_sess);
		}

		$discount = $this->session->userdata('coupon_price') + $this->session->userdata('multiple_price_level_discount') + $this->session->userdata('special_promotion_rule_discount') + $this->session->userdata('discount_category_discount') + $this->session->userdata('data_point_discount') + $this->session->userdata('vip_discount_price');
		echo number_format($discount, 2, '.', ',');

		echo '!@#$%^&*()';
		// [4] Total, class="total_price"
		$total = $sub_total + $shipping - $discount;
		echo number_format($total, 2, '.', ',');

		echo '!@#$%^&*()';
		// [5] cart, class="cart_basket"
		foreach($this->cart->contents() as $items) {
			if($items['options']['promotion_get_set'] == true) {
				$path = 'get_set';
			} else {
				$path = 'product';
			}
?>
									<div class="product-cart">
										<div class="row">
											<div class="col-lg-2 col-md-3 col-4">
												<div class="img-width"><img src="<?php echo base_url('uploads/'.$path.'/'.$items['options']['image']);?>"></div>
											</div>
											<div class="col-lg-4 col-md-9 col-8">
												<div class="row">
													<div class="col">
														<ul class="cart-product-info">
															<li><?php echo $items['name'];?></li>
															<li><?php echo $items['options']['color'];?></li>
															<li><?php echo $items['options']['size'];?></li>
														</ul>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<button class="button-remove" onclick="removeCart('<?php echo $items['rowid'];?>');">
															<span>REMOVE</span>
														</button>
													</div>
												</div>
												
												<div class="d-md-block d-lg-none">
													<div class="row">
														<div class="col">
<?php
			if($items['price'] == $items['options']['price_before_discount']) {
?>
															<div class="price sale">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
<?php
			} else {
?>
															<div class="price sale">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
															<div class="full-price">฿ <?php echo number_format($items['options']['price_before_discount'], 0, '.', ',');?></div>
<?php
			}
?>
														</div>
													</div>
													<div class="row">
														<div class="col">
															<div class="content-center">
																<div class="sp-quantity">
<?php 
			$rowid = $items['rowid'];

			if($items['options']['promotion_buy_and_giveaway'] != true and $items['options']['promotion_auto_add_gift'] != true) {
?>
																	<div class="sp-minus btnquantity" onclick="decreaseCart('<?php echo $rowid;?>');"><i class="fas fa-minus"></i></div>
<?php
			}
?>
																	<div class="sp-input">
																		<input type="text" class="quntity-input qty-<?php echo $items['rowid'];?>" value="<?php echo $items['qty'];?>" <?php if($items['options']['promotion_buy_and_giveaway'] == true or $items['options']['promotion_auto_add_gift'] != true) { echo 'readonly'; } ?> onblur="changeQty('<?php echo $rowid;?>', this.value);" />
																	</div>
<?php
			if($items['options']['promotion_buy_and_giveaway'] != true and $items['options']['promotion_auto_add_gift'] != true) {
?>
																	<div class="sp-plus btnquantity" onclick="increaseCart('<?php echo $rowid;?>');"><i class="fas fa-plus"></i></div>
<?php
			}
?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-2 d-none d-md-none d-lg-block">
												<div class="middle-center">
<?php
			if($items['price'] == $items['options']['price_before_discount']) {
?>
													<div class="price sale">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
<?php
			} else {
?>
													<div class="price sale">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
															<div class="full-price">฿ <?php echo number_format($items['options']['price_before_discount'], 0, '.', ',');?></div>
<?php
			}
?>
												</div>
											</div>
											<div class="col-lg-2 d-none d-md-none d-lg-block qty">
												<div class="middle-center">
													<div class="sp-quantity">
<?php		
			if($items['options']['promotion_buy_and_giveaway'] != true and $items['options']['promotion_auto_add_gift'] != true) {
?>		
														<div class="sp-minus btnquantity" onclick="decreaseCart('<?php echo $rowid;?>');"><i class="fas fa-minus"></i></div>
<?php
			}
?>
														<div class="sp-input">
															<input type="text" class="quntity-input qty-<?php echo $items['rowid'];?>" value="<?php echo $items['qty'];?>" <?php if($items['options']['promotion_buy_and_giveaway'] == true or $items['options']['promotion_auto_add_gift'] != true) { echo 'readonly'; } ?> onblur="changeQty('<?php echo $rowid;?>', this.value);" />
														</div>
<?php
			if($items['options']['promotion_buy_and_giveaway'] != true and $items['options']['promotion_auto_add_gift'] != true) {
?>
														<div class="sp-plus btnquantity" onclick="increaseCart('<?php echo $rowid;?>');"><i class="fas fa-plus"></i></div>
<?php
			}
?>
													</div>
												</div>
											</div>
											<div class="col-lg-2 d-none d-md-none d-lg-block">
												<div class="middle-center">
													<div class="price">฿ <?php echo number_format($items['price'] * $items['qty'], 0, '.', ',');?></div>
												</div>
											</div>
										</div>
									</div>
<?php
		}
?>
									<div class="coupon-section cart-page">
										<div class="row">
											<div class="col-xl-8 col-lg-8 col-md-7 col-12">
												<p><?php echo get2Lang($this->session->userdata('lang'), 'คูปอง', 'Coupon');?></p>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-5 col-12">
												<div class="input-group">
													<input type="text" id="coupon_code" class="form-control" placeholder="กรอกรหัสคูปอง" aria-describedby="coupon-code" value="<?php echo $this->session->userdata('coupon_code');?>">
													<button class="buttonBK" type="button" id="coupon-code" onclick="checkCoupon();"><?php echo get2Lang($this->session->userdata('lang'), 'ยืนยัน', 'Confirm');?></button>
												</div>
											</div>
										</div>
									</div>
<?php

		echo '!@#$%^&*()';
		// [6] coupon มีหรือไม่

		echo $this->session->userdata('coupon_id');

		echo '!@#$%^&*()';
		// [7] เช็คโปรโมชันทั้งหมด

		echo '!@#$%^&*()';
		// [8] Coupon

		if($this->session->userdata('coupon_price') != '') {
?>
										<br>(Coupon: <?php echo number_format($this->session->userdata('coupon_price'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>)
<?php
}

		echo '!@#$%^&*()';
		// [9] Multiple Price Level

		if($this->session->userdata('multiple_price_level_discount') != '') {
?>
										<br>(Multiple Price Level: <?php echo number_format($this->session->userdata('multiple_price_level_discount'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>)
<?php
}

		echo '!@#$%^&*()';
		// [10] Promotion Special Rule

		if($this->session->userdata('special_promotion_rule_discount') != '') {
?>
										<br>(Promotion Special Rule: <?php echo number_format($this->session->userdata('special_promotion_rule_discount'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>)
<?php
		}
		echo '!@#$%^&*()';
		// [11] Discount Category Rule

		if($this->session->userdata('discount_category_discount') != '') {
?>
										<br>(Discount Category Rule: <?php echo number_format($this->session->userdata('discount_category_discount'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>)
<?php
		}

		echo '!@#$%^&*()';
		// [12] Data Point

		if($this->session->userdata('data_point_discount') != '') {
?>
										<br>(Data Point : <?php echo number_format($this->session->userdata('data_point_discount'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>)
<?php
		}
		echo '!@#$%^&*()';
		// [13] VIP

		if($this->session->userdata('vip_discount_price') != '') {
?>
										<br>(VIP: <?php echo number_format($this->session->userdata('vip_discount_price'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>)
<?php
		}
		echo '!@#$%^&*()';
	}
	// end cart
	// end ajax

	public function promotion() {
		$data['product'] = $this->model_frontend->get_product_promotion();

		$data['banner'] = $this->model_frontend->getBannerResult();

		$this->load->view('frontend/frontend/promotion', $data);
	}

	public function bundles() {
		$data['product'] = $this->model_frontend->getGetSet();

		$data['banner'] = $this->model_frontend->getBannerResult();

		$this->load->view('frontend/frontend/bundles', $data);
	}

	public function flexi_combo() {
		$data['product'] = $this->model_frontend->getPromotionSpecialRule();

		$data['banner'] = $this->model_frontend->getBannerResult();

		$this->load->view('frontend/frontend/flexi_combo', $data);
	}

	public function recommended() {
		$data['product'] = $this->model_frontend->get_product_recommened();

		$data['banner'] = $this->model_frontend->getBannerResult();

		$this->load->view('frontend/frontend/recommended', $data);
	}

	public function new_arrivals() {
		$data['product'] = $this->model_frontend->get_product_new_arrivals();

		$data['banner'] = $this->model_frontend->getBannerResult();

		$this->load->view('frontend/frontend/new_arrivals', $data);
	}
}