<?php
class Model_report extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_report_sale_online_list($date_begin = '', $date_end = '', $order_status = ''){	
		if($date_begin != '' and $date_end != '') {
			$this->db->where('order_datetime_create >=', $date_begin.' 00:00:00');
			$this->db->where('order_datetime_create <=', $date_end.' 23:59:59');
		} else {
			$this->db->where('order_datetime_create >=', date('Y-m-d').' 00:00:00');
			$this->db->where('order_datetime_create <=', date('Y-m-d').' 23:59:59');
		}

		if($order_status != '') {
			$this->db->where('order_status', $order_status);
		}

		$this->db->order_by("ci_order_detail.order_detail_id","asc");
		$this->db->join('ci_order_detail', 'ci_order.order_id = ci_order_detail.order_id', 'inner');
		$this->db->join('ci_product', 'ci_order_detail.product_id = ci_product.product_id', 'inner');
		$this->db->join('ci_member', 'ci_order.member_id = ci_member.member_id', 'inner');
		$query = $this->db->get("ci_order");
			
		return $query->result();
	}

	public function get_tumbol_record($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('subdistricts');

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

	public function getCouponRecord($coupon_id) {
		$this->db->where('coupon_id', $coupon_id);
		$query = $this->db->get('ci_coupon');

		return $query->row();
	}

	function get_report_shipment_list($date_begin = '', $date_end = ''){	
		if($date_begin != '' and $date_end != '') {
			$this->db->where('order_datetime_create >=', $date_begin.' 00:00:00');
			$this->db->where('order_datetime_create <=', $date_end.' 23:59:59');
		} else {
			$this->db->where('order_datetime_create >=', date('Y-m-d').' 00:00:00');
			$this->db->where('order_datetime_create <=', date('Y-m-d').' 23:59:59');
		}
			
		$this->db->order_by("ci_order.order_id","asc");
		$query = $this->db->get("ci_order");
			
		return $query->result();
	}

	public function get_report_order_detail($order_id) {
		$this->db->order_by('order_detail_id', 'asc');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('ci_order_detail');

		return $query->result();
	}

	function get_report_type_payment_list($date_begin = '', $date_end = '', $order_status = ''){	
		if($date_begin != '' and $date_end != '') {
			$this->db->where('order_datetime_create >=', $date_begin.' 00:00:00');
			$this->db->where('order_datetime_create <=', $date_end.' 23:59:59');
		} else {
			$this->db->where('order_datetime_create >=', date('Y-m-d').' 00:00:00');
			$this->db->where('order_datetime_create <=', date('Y-m-d').' 23:59:59');
		}

		if($order_status != '') {
			$this->db->where('order_status', $order_status);
		}

		$this->db->join('ci_member', 'ci_order.member_id = ci_member.member_id', 'inner');
		$this->db->order_by("order_id","asc");
		$query = $this->db->get("ci_order");
			
		return $query->result();
	}

	public function getReportStockRemain() {
		$this->db->order_by('ci_category1.category1_id', 'asc');
		$this->db->order_by('ci_category2.category2_id', 'asc');
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->result();
	}
}