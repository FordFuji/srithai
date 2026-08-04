<?php
class Model_frontend extends CI_Model {
	
	public function __construct() {
		parent::__construct();
        
        $this->load->database();	
	}

	public function getHome() {
		$this->db->where('home_id', 1);
		$query = $this->db->get('ci_home');

		return $query->row();
	}
	
	public function get_category1_result() {
		$this->db->order_by('category1_id', 'asc');
		$query = $this->db->get('ci_category1');

		return $query->result();
	}

	public function get_contact_us() {
		$this->db->where('contact_us_id', 1);
		$query = $this->db->get('ci_contact_us');

		return $query->row();
	}

	public function get_article_home() {
		$this->db->order_by('article_id', 'desc');
		$this->db->limit(3);
		$query = $this->db->get('ci_article');

		return $query->result();
	}

	public function get_article_record($article_id) {
		$this->db->where('article_id', $article_id);
		$query = $this->db->get('ci_article');

		return $query->row();
	}

	public function get_article_lasted() {
		$this->db->order_by('article_id', 'desc');
		$query = $this->db->get('ci_article');

		return $query->row();
	}

	public function get_article6($per_page, $offset) {
		$this->db->order_by('article_id', 'desc');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('ci_article');

		return $query->result();
	}

	public function get_article_all() {
		$this->db->order_by('article_id', 'desc');
		$query = $this->db->get('ci_article');

		return $query->result();
	}

	public function get_category2_result($category1_id) {
		$this->db->order_by('category2_id', 'asc');
		$this->db->where('category1_id', $category1_id);
		$query = $this->db->get('ci_category2');

		return $query->result();
	}

	public function get_category2_result_($category1_id) {
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->where('ci_category2.category1_id', $category1_id);
		$this->db->join('ci_product', 'ci_category2.category2_id = ci_product.category2_id', 'inner');
		$query = $this->db->get('ci_category2');

		return $query->result();
	}

	public function get_product_category($category1_id, $category2_id = '', $per_page, $offset, $product_id = '') {
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$this->db->where('ci_category1.category1_id', $category1_id);
		
		if(!empty($category2_id)) {
			$this->db->where('ci_category2.category2_id', $category2_id);
		}

		if(!empty($product_id)) {
			$this->db->where('ci_product.product_id', $product_id);
		}
		
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->limit($per_page, $offset);

		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function get_product_category_all($category1_id, $category2_id = '', $product_id) {
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$this->db->where('ci_category1.category1_id', $category1_id);
		
		if(!empty($category2_id)) {
			$this->db->where('ci_category2.category2_id', $category2_id);
		}

		if(!empty($product_id)) {
			$this->db->where('ci_product.product_id', $product_id);
		}

		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function get_category1_record($category1_id) {
		$this->db->where('category1_id', $category1_id);
		$query = $this->db->get('ci_category1');

		return $query->row();
	}

	public function get_product_record($product_id) {
		$this->db->where('ci_product.product_id', $product_id);
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->row();
	}

	public function get_product_photo($product_id) {
		$this->db->where('product_id', $product_id);
		$this->db->order_by('product_photo_id', 'asc');
		$query = $this->db->get('ci_product_photo');

		return $query->result();
	}

	public function get_product_color($product_id) {
		$this->db->where('ci_map_product.product_id', $product_id);
		$this->db->join('ci_color', 'ci_map_product.color_id = ci_color.color_id', 'inner');
		$this->db->group_by('ci_map_product.color_id');
		$query = $this->db->get('ci_map_product');

		return $query->result();
	}
	
	public function get_product_similar($category2_id, $product_id) {
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category1.category1_id = ci_category1.category1_id', 'inner');
		$this->db->where('ci_product.category2_id', $category2_id);
		$this->db->where('ci_product.product_id !=', $product_id);
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->group_by('ci_product.product_id');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function get_product_promotion() {
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->where('ci_product.product_promotion', 'Yes');
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function get_product_recommened() {
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->where('ci_product.product_recommened', 'Yes');
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function get_product_new_arrivals() {
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->where('ci_product.product_new_arrivals', 'Yes');
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function get_category_result() {
		$this->db->order_by('ci_category1.category1_id', 'asc');
		$query = $this->db->get('ci_category1');

		return $query->result();
	}

	public function get_product_by_category1_result($category1_id) {
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->where('ci_category1.category1_id', $category1_id);
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function get_member_profile_record_() {
		$this->db->where('ci_member.member_id', $this->session->userdata('member_id'));
		$query = $this->db->get('ci_member');

		return $query->row();
	}

	public function get_member_profile_record() {
		$this->db->where('ci_member.member_id', $this->session->userdata('member_id'));
		$query = $this->db->get('ci_member');

		return $query->row();
	}

	public function get_province_result() {
		if($this->session->userdata('lang') == 'th') {
			$this->db->order_by('name_in_thai', 'asc');
		} elseif($this->session->userdata('lang') == 'en') {
			$this->db->order_by('name_in_english', 'asc');
		} 
		
		$query = $this->db->get('provinces');

		return $query->result();
	}

	public function get_amphur_result($province_id) {
		if($this->session->userdata('lang') == 'th') {
			$this->db->order_by('name_in_thai', 'asc');
		} elseif($this->session->userdata('lang') == 'en') {
			$this->db->order_by('name_in_english', 'asc');
		} 

		$this->db->where('province_id', $province_id);
		$query = $this->db->get('districts');

		return $query->result();
	}

	public function get_tumbol_result($amphur_id) {
		if($this->session->userdata('lang') == 'th') {
			$this->db->order_by('name_in_thai', 'asc');
		} elseif($this->session->userdata('lang') == 'en') {
			$this->db->order_by('name_in_english', 'asc');
		} 

		$this->db->where('district_id', $amphur_id);
		$query = $this->db->get('subdistricts');

		return $query->result();
	}

	public function get_postcode_result($amphur_id) {
		$this->db->order_by('id', 'asc');
		$this->db->where('district_id', $amphur_id);
		$this->db->group_by('zip_code');
		$query = $this->db->get('subdistricts');

		return $query->result();
	}

	public function get_member_shipping_address() {
		$this->db->order_by('member_shipping_id', 'asc');
		$this->db->where('member_id', $this->session->userdata('member_id'));
		$query = $this->db->get('ci_member_shipping');

		return $query->result();
	}

	public function get_tumbol_record($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('subdistricts');

		return $query->row();
	}

	public function getContactUsConfig() {
		$this->db->where('contact_us_send_mail_id', 1);
		$query = $this->db->get('ci_contact_us_send_mail');

		return $query->row();
	}

	public function get_amphur_record($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('districts');

		return $query->row();
	}

	public function get_province_record($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('provinces');

		return $query->row();
	}

	public function get_product_map_product($product_id) {
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('ci_map_product');

		$row = $query->row();

		if(!empty($row)) {
			return true;
		} else {
			return false;
		}
	}

	public function getBannerProductResult($category1_id) {
		$this->db->where('category1_id', $category1_id);
		$this->db->order_by('map_category1_id', 'asc');
		$query = $this->db->get('ci_map_category1');

		return $query->result();
	}

	public function getProductAll() {
		$this->db->order_by('ci_product.product_id', 'asc');
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function getColorModal($product_id) {
		$this->db->where('ci_map_product.product_id', $product_id);
		$this->db->order_by('ci_map_product.map_product_id', 'asc');
		$this->db->group_by('ci_map_product.color_id');
		$this->db->join('ci_color', 'ci_map_product.color_id = ci_color.color_id', 'inner');
		$query = $this->db->get('ci_map_product');

		return $query->result();
	}

	public function get_product_category_first() {
		$this->db->order_by('category1_id', 'asc');
		$query = $this->db->get('ci_category1');

		return $query->row();
	}

	public function get_shipping_address_status_main() {
		$this->db->where('member_id', $this->session->userdata('member_id'));
		$this->db->where('member_shipping_status', 'ที่อยู่หลัก');
		$query = $this->db->get('ci_member_shipping');

		return $query->row();
	}

	public function getBannerResult() {
		$this->db->order_by('banner_id', 'asc');
		$query = $this->db->get('ci_banner');

		return $query->result();
	}

	public function get_order_record($order_id) {
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('ci_order');

		return $query->row();
	}

	public function get_order_detail_result($order_id) {
		$this->db->where('order_id', $order_id);
		$this->db->order_by('order_detail_id', 'asc');
		$query = $this->db->get('ci_order_detail');

		return $query->result();
	}

	public function getCustomerGroup() {
		$this->db->order_by('customer_group_id', 'asc');
		$query = $this->db->get('ci_customer_group');

		return $query->result();
	}

	public function get_payment_result($order_id) {
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('ci_order');

		return $query->row();
	}

	public function get_member_order_result() {
		$this->db->order_by('order_id', 'desc');
		$this->db->where('member_id', $this->session->userdata('member_id'));
		$query = $this->db->get('ci_order');

		return $query->result();
	}

	public function get_bank_result() {
		$this->db->order_by('bank_id', 'asc');
		$query = $this->db->get('ci_bank');

		return $query->result();
	}

	public function customer_group_result($customer_group_id) {
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->where('ci_map_customer_group.customer_group_id', $customer_group_id);
		$this->db->join('ci_map_customer_group', 'ci_product.product_id = ci_map_customer_group.product_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function getProductRecord($product_id) {
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('ci_product');

		return $query->row();
	}

	public function setCouponStock($coupon_id) {
		$this->db->where('coupon_id', $coupon_id);
		$query = $this->db->get('ci_coupon');

		$row = $query->row();
		
		if(!empty($row)) {
			$coupon_limit = $row->coupon_limit - 1;
			$data = array(
				'coupon_limit' => $coupon_limit,
				'coupon_datetime_update' => date('Y-m-d H:i:s')
			);

			$where = array(
				'coupon_id' => $coupon_id
			);

			$this->db->update('ci_coupon', $data, $where);
		}
	}

	public function getSearchProduct() {
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		
		if($this->session->userdata('lang') == 'th') {
			$this->db->like('ci_category1.category1_name_th', $this->session->userdata('search_inc'), 'both');
			$this->db->or_like('ci_category2.category2_name_th', $this->session->userdata('search_inc'), 'both');
			$this->db->or_like('ci_product.product_name_th', $this->session->userdata('search_inc'), 'both');
			$this->db->or_like('ci_product.product_description_th', $this->session->userdata('search_inc'), 'both');
		} elseif($this->session->userdata('lang') == 'en') {
			$this->db->like('ci_category1.category1_name_en', $this->session->userdata('search_inc'), 'both');
			$this->db->or_like('ci_category2.category2_name_en', $this->session->userdata('search_inc'), 'both');
			$this->db->or_like('ci_product.product_name_en', $this->session->userdata('search_inc'), 'both');
			$this->db->or_like('ci_product.product_description_en', $this->session->userdata('search_inc'), 'both');
		} elseif($this->session->userdata('lang') == 'ch') {
			$this->db->like('ci_category1.category1_name_ch', $this->session->userdata('search_inc'), 'both');
			$this->db->or_like('ci_category2.category2_name_ch', $this->session->userdata('search_inc'), 'both');
			$this->db->or_like('ci_product.product_name_ch', $this->session->userdata('search_inc'), 'both');
			$this->db->or_like('ci_product.product_description_ch', $this->session->userdata('search_inc'), 'both');
		}
		
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function getOrderResult() {
		$this->db->order_by('order_id', 'desc');
		$this->db->where('member_id', $this->session->userdata('member_id'));
		$query = $this->db->get('ci_order');

		return $query->result();
	}

	public function getOrderResult_() {
		$this->db->order_by('order_id', 'desc');
		$this->db->where('member_id', $this->session->userdata('member_id'));
		$this->db->where('order_status', 'Complete');
		$query = $this->db->get('ci_order');

		return $query->result();
	}

	public function getOrderDetailPointResult($order_id) {
		$this->db->order_by('order_detail_id', 'desc');
		$this->db->where('order_id', $order_id);
		$this->db->where('promotion_point !=', 0);
		$this->db->where('promotion_point !=', '');
		$query = $this->db->get('ci_order_detail');

		return $query->result();
	}

	public function getOrderRecord($order_id) {
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('ci_order');

		return $query->row();
	}

	public function getOrderDetailResult($order_id) {
		$this->db->order_by('order_detail_id', 'asc');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('ci_order_detail');

		return $query->result();
	}

	public function getOrderLastId() {
		$this->db->order_by('order_id', 'desc');
		$query = $this->db->get('ci_order');

		return $query->row();
	}

	public function getSetJoinProduct($get_set_id) {
		$this->db->where('ci_map_get_set.get_set_id', $get_set_id);
		$this->db->join('ci_map_get_set', 'ci_product.product_id = ci_map_get_set.product_id', 'inner');
		$query = $this->db->get('ci_product');

		$rows = $query->result();

		$product_price = 0;
		if(!empty($rows)) {
			foreach($rows as $r) {
				$product_price += $r->product_price;
			}
		}

		return $product_price;
	}

	public function getMemberShippingNotDefaultResult() {
		$this->db->order_by('member_shipping_id', 'asc');
		$this->db->where('member_id', $this->session->userdata('member_id'));
		$this->db->where('member_shipping_status', 'ตั้งเป็นที่อยู่หลัก');
		$query = $this->db->get('ci_member_shipping');

		return $query->result();
	}

	public function getPromotionSpecialRule() {
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->join('ci_product', 'ci_map_special_promotion_rule.product_id = ci_product.product_id', 'inner');
		$query = $this->db->get('ci_map_special_promotion_rule');

		return $query->result();
	}

	public function getShippingPrice($weight) {
		$this->db->where('shipping_price_id', 1);
		$query = $this->db->get('ci_shipping_price');

		$row = $query->row();
		if($weight < 1000) {
			return $row->shipping_price_1000;
		} elseif($weight >= 1000 and $weight < 2000) {
			return $row->shipping_price_1000_1999;
		} elseif($weight >= 2000 and $weight < 3000) {
			return $row->shipping_price_2000_2999;
		} elseif($weight >= 3000 and $weight < 4000) {
			return $row->shipping_price_3000_3999;
		} elseif($weight >= 4000 and $weight < 5000) {
			return $row->shipping_price_4000_4999;
		} elseif($weight >= 5000 and $weight < 6000) {
			return $row->shipping_price_5000_5999;
		} elseif($weight >= 6000 and $weight < 7000) {
			return $row->shipping_price_6000_6999;
		} elseif($weight >= 7000 and $weight < 8000) {
			return $row->shipping_price_7000_7999;
		} elseif($weight >= 8000 and $weight < 9000) {
			return $row->shipping_price_8000_8999;
		} elseif($weight >= 9000 and $weight < 10000) {
			return $row->shipping_price_9000_9999;
		} elseif($weight >= 10000 and $weight < 11000) {
			return $row->shipping_price_10000_10999;
		} elseif($weight >= 11000 and $weight < 12000) {
			return $row->shipping_price_11000_11999;
		} elseif($weight >= 12000 and $weight < 13000) {
			return $row->shipping_price_12000_12999;
		} elseif($weight >= 13000 and $weight < 14000) {
			return $row->shipping_price_13000_13999;
		} elseif($weight >= 14000 and $weight < 15000) {
			return $row->shipping_price_14000_14999;
		} elseif($weight >= 15000 and $weight < 16000) {
			return $row->shipping_price_15000_15999;
		} elseif($weight >= 16000 and $weight < 17000) {
			return $row->shipping_price_16000_16999;
		} elseif($weight >= 17000 and $weight < 18000) {
			return $row->shipping_price_17000_17999;
		} elseif($weight >= 18000 and $weight < 19000) {
			return $row->shipping_price_18000_18999;
		} elseif($weight >= 19000 and $weight < 19999) {
			return $row->shipping_price_19000_19999;
		} elseif($weight >= 19999) {
			return $row->shipping_price_20000_100000000;
		}
	}

	public function getProductRelated($product_id) {
		$this->db->where('ci_map_product_related.product_id', $product_id);
		$this->db->join('ci_map_product_related', 'ci_product.product_id = ci_map_product_related.map_product_related_product_id', 'inner');
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function getGetSet() {
		$this->db->order_by('get_set_id', 'asc');
		$query = $this->db->get('ci_get_set');

		return $query->result();
	}

	public function getGetSetRecord($get_set_id) {
		$this->db->where('get_set_id', $get_set_id);
		$query = $this->db->get('ci_get_set');

		return $query->row();
	}

	public function getPointPerBaht() {
		$this->db->where('point_per_baht_id', 1);
		$query = $this->db->get('ci_point_per_baht');

		return $query->row();
	}

	public function getCalculatePoint() {
		// หา Point รวม
		$this->db->where('member_id', $this->session->userdata('member_id'));
		$this->db->where('order_status', 'Complete');
		$query = $this->db->get('ci_order');

		$rows_input = $query->result();

		$point = 0;
		$use_point = 0;
		if(!empty($rows_input)) {
			foreach($rows_input as $r) {
				$point += $r->order_point;
				$use_point += $r->order_use_point;
			}
		}

		// ไม่ใช้แล้วทำผิด
		// หา Point ที่ใช้ไป
		// $this->db->where('ci_order.member_id', $this->session->userdata('member_id'));
		// $this->db->join('ci_order_detail', 'ci_order.order_id = ci_order_detail.order_id', 'inner');
		// $this->db->where('ci_order.order_status !=', 'Ordering');
		// $this->db->where('ci_order.order_status !=', 'Cancel');
		// $query = $this->db->get('ci_order');

		// $rows_use = $query->result();

		// $point_use = 0;
		// if(!empty($rows_use)) {
		// 	foreach($rows_use as $r) {
		// 		$point_use += $r->promotion_point;
		// 	}
		// }

		return $point - $use_point;
	}

	public function getDiscountPoint() {
		$this->db->order_by('point_use_point', 'asc');
		$query = $this->db->get('ci_point');

		return $query->result();
	}

	// promotion
	public function getInsertBuyAndGiveAway() {

		$this->db->order_by('buy_and_giveaway_id', 'asc');
		$query = $this->db->get('ci_buy_and_giveaway');

		$rows = $query->result();

		// Buy And Giveaway ID
		if(!empty($rows)) {
			foreach($rows as $r) {
				// หาสินค้าที่ซื้อ ว่ามีครบมั๊ย
				$this->db->where('buy_and_giveaway_id', $r->buy_and_giveaway_id);
				$query = $this->db->get('ci_map_buy');

				$buy = $query->result();

				$buy_no = 0;
				$price_buy_and_giveaway = false;
				foreach($this->cart->contents() as $items) {
					if($items['options']['promotion_buy_and_giveaway'] == true) {
						$price_buy_and_giveaway = true;
					}

					if(!empty($buy)) {
						foreach($buy as $b) {
							if($items['id'] == $b->product_id) {
								$buy_no++;
							}
						}
					}
				}

				if($buy_no == $r->buy_no) {
					$this->db->where('ci_map_giveaway.buy_and_giveaway_id', $r->buy_and_giveaway_id);
					$this->db->join('ci_product', 'ci_map_giveaway.product_id = ci_product.product_id', 'inner');
					$query = $this->db->get('ci_map_giveaway');

					$giveaway = $query->result();

					if(!empty($giveaway) and $price_buy_and_giveaway == false) {
						foreach($giveaway as $g) {
							$data = array(
								'id'      => $g->product_id,
								'qty'     => 1,
								'price'   => 0,
								'name'    => get2Lang($this->session->userdata('lang'), $g->product_name_th, $g->product_name_en),
								'options' => array(
									'image' => $g->product_image, 
									'price_before_discount' => $g->product_price_before_discount,
									'color' => '-',
									'size' => '-',
									'code' => $g->product_code,
									'promotion_buy_and_giveaway' => true,
									'promotion_get_set' => false,
									'promotion_point' => false,
									'promotion_auto_add_gift' => false,
									'promotion_special_rule' => false,
									'promotion_category_reduction' => false,
									'promotion_multiple_price_levels' => false,
									'weight' => $g->product_weight
								)
							);

							$this->cart->insert($data);
						}
					}
					
				} else {
					// ไม่เข้าเงื่อนไข
					$data = array(
						'promotion_buy_and_giveaway' => true,
						'qty'   => 0
					);
					
					$this->cart->update($data);
				}
			}
		}
	}

	public function getRemoveBuyAndGiveAway() {

		$this->db->order_by('buy_and_giveaway_id', 'asc');
		$query = $this->db->get('ci_buy_and_giveaway');

		$rows = $query->result();

		// Buy And Giveaway ID
		if(!empty($rows)) {
			foreach($rows as $r) {
				// หาสินค้าที่ซื้อ ว่ามีครบมั๊ย
				$this->db->where('buy_and_giveaway_id', $r->buy_and_giveaway_id);
				$query = $this->db->get('ci_map_buy');

				$buy = $query->result();

				$buy_no = 0;
				$price_buy_and_giveaway = false;
				foreach($this->cart->contents() as $items) {
					if($items['options']['promotion_buy_and_giveaway'] == true) {
						$price_buy_and_giveaway = true;
					}

					if(!empty($buy)) {
						foreach($buy as $b) {
							if($items['id'] == $b->product_id) {
								$buy_no++;
							}
						}
					}
				}

				if($buy_no != $r->buy_no) {
					// ไม่เข้าเงื่อนไข
					foreach($this->cart->contents() as $items) {
						if($items['options']['promotion_buy_and_giveaway'] == true) {
							$data = array(
								'rowid' => $items['rowid'],
								'qty'   => 0
							);
							
							$this->cart->update($data);
						}
					}
				}
			}
		}
	}

	public function getSet() {

	}

	public function getPoint() {

	}

	public function getAutoAddGift() {
		
		// หา Sub Total
		$sub_total = 0;
		$result_auto_add_gift = false;
		foreach($this->cart->contents() as $items) {
			$price = $items['qty'] * $items['price'];

			$sub_total += $price;
		}

		$this->db->order_by('auto_add_gift_price_limit', 'desc');
		$query = $this->db->get('ci_auto_add_gift');

		$rows = $query->result();

		if(!empty($rows)) {
			foreach($rows as $r) {
				if($sub_total >= $r->auto_add_gift_price_limit) {
					// Clear Auto Add Gift
					foreach($this->cart->contents() as $items) {
						if($items['options']['promotion_auto_add_gift'] == true) {
							$data = array(
								'rowid' => $items['rowid'],
								'qty'   => 0
							);
							
							$this->cart->update($data);
						}
					}

					if($result_auto_add_gift == false) {
						$this->db->where('product_id', $r->product_id);
						$query = $this->db->get('ci_product');
	
						$g = $query->row();
	
						if(!empty($g)) {
							$data = array(
								'id'      => $g->product_id,
								'qty'     => 1,
								'price'   => 0,
								'name'    => get2Lang($this->session->userdata('lang'), $g->product_name_th, $g->product_name_en),
								'options' => array(
									'image' => $g->product_image, 
									'price_before_discount' => $g->product_price_before_discount,
									'color' => '-',
									'size' => '-',
									'code' => $g->product_code,
									'promotion_buy_and_giveaway' => false,
									'promotion_get_set' => false,
									'promotion_point' => false,
									'promotion_auto_add_gift' => true,
									'promotion_special_rule' => false,
									'promotion_category_reduction' => false,
									'promotion_multiple_price_levels' => false,
									'weight' => $g->product_weight
								)
							);
	
							$this->cart->insert($data);

							$result_auto_add_gift = true;

							break;
						}
					}
				}
			}
		}

		if($result_auto_add_gift == false) {
			// ไม่เข้าเงื่อนไข
			foreach($this->cart->contents() as $items) {
				if($items['options']['promotion_auto_add_gift'] == true) {
					$data = array(
						'rowid' => $items['rowid'],
						'qty'   => 0
					);
					
					$this->cart->update($data);
				}
			}
		}
	}

	public function getSpecialPromotionRule() {
		$this->db->where('product_id !=', 0);
		$query = $this->db->get('ci_map_special_promotion_rule');
		$rows = $query->result();
	
		$sub_total = 0;
		$qty = 0;
		foreach($this->cart->contents() as $items) {
			if(!empty($rows)) {
				foreach($rows as $r) {
					if($r->product_id == $items['id']) {
						$qty += $items['qty'];

						$price = $items['qty'] * $items['price'];

						$sub_total += $price;
					}		
				}
			}
		}
		
		$this->db->order_by('special_promotion_rule_no', 'desc');
		$this->db->where('special_promotion_rule_no <=', $qty);
		$query = $this->db->get('ci_special_promotion_rule');

		$row = $query->row();

		if(!empty($row) and $qty >= $row->special_promotion_rule_no) {
			$discount_special = $sub_total * $row->product_price_low_percent / 100;

			//echo $discount_special.' = '.$sub_total.' * '.$row->product_price_low_percent.' / 100';

			$data_ppm = array(
				'special_promotion_rule_discount' => $discount_special
			);
		} else {
			$data_ppm = array(
				'special_promotion_rule_discount' => 0
			);
		}

		$this->session->set_userdata($data_ppm);
	}

	public function getMultiplePriceLevel() {
		$sub_total = 0;
		$qty = 0;
		foreach($this->cart->contents() as $items) {
			$qty += $items['qty'];

			$price = $items['qty'] * $items['price'];

			$sub_total += $price;
		}
		
		$this->db->order_by('multiple_price_level_buy', 'asc');
		$this->db->where('multiple_price_level_discount !=', 0);
		$query = $this->db->get('ci_multiple_price_level');

		$rows = $query->result();

		if(!empty($rows)) {
			foreach($rows as $r) {
				if($r->multiple_price_level_buy <= $qty) {
					if($r->multiple_price_level_type == '%') {
						$multiple_price_level_discount = $r->multiple_price_level_discount * $sub_total / 100;

						//echo $multiple_price_level_discount.' = '.$r->multiple_price_level_discount.' * '.$sub_total.' / 100';
					} elseif($r->multiple_price_level_type == 'บาท') {
						$multiple_price_level_discount = $r->multiple_price_level_discount;
					}
				}
			}
		}

		if(!empty($multiple_price_level_discount)) {
			$data_mpld = array(
				'multiple_price_level_discount' => $multiple_price_level_discount
			);
		} else {
			$data_mpld = array(
				'multiple_price_level_discount' => 0
			);
		}

		$this->session->set_userdata($data_mpld);

	}

	public function getDiscountCategory() {
		$discount_category_discount = 0;

		foreach($this->cart->contents() as $items) {
			$product_id = $items['id'];

			$this->db->where('product_id', $product_id);
			$query = $this->db->get('ci_product');

			$row = $query->row();

			if(!empty($row)) {
				$this->db->where('category2_id', $row->category2_id);
				$query_discount = $this->db->get('ci_discount_category');

				$row_discount = $query_discount->row();

				if(!empty($row_discount)) {
					$discount_category_discount += ($row_discount->discount_category_discount * $items['price'] * $items['qty'] / 100);
				}
			}
		}

		$data_dcd = array(
			'discount_category_discount' => $discount_category_discount
		);

		$this->session->set_userdata($data_dcd);
	}

	public function getCheckVIP() {
		$this->db->where('member_id', $this->session->userdata('member_id'));
		$query = $this->db->get('ci_member');

		$member = $query->row();

		if(!empty($member)) {
			$this->db->order_by('vip_order_amount', 'asc');
			$this->db->where('vip_begin_date <=', date('Y-m-d'));
			$this->db->where('vip_end_date >=', date('Y-m-d'));
			$query = $this->db->get('ci_vip');

			$rows = $query->result();

			if(!empty($rows)) {
				foreach($rows as $r) {
					if($member->member_order_amount >= $r->vip_order_amount) {
						$return = $r->vip_id;
					}
				}
			}

			if(!empty($return)) {
				$this->db->where('vip_id', $return);
				$query = $this->db->get('ci_vip');

				return $query->row();
			}
		}
	}

	public function getVip($member_order_amount) {
		$this->db->order_by('vip_order_amount', 'asc');
		$this->db->where('vip_begin_date <=', date('Y-m-d'));
		$this->db->where('vip_end_date >=', date('Y-m-d'));
		$query = $this->db->get('ci_vip');

		$rows = $query->result();

		if(!empty($rows)) {
			foreach($rows as $r) {
				if($member_order_amount >= $r->vip_order_amount) {
					$return = $r->vip_id;
				}
			}
		}

		$this->db->where('vip_id', $return);
		$query = $this->db->get('ci_vip');

		return $query->row();
	}
	// End Promotion
}