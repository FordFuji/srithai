<?php
class Model_order extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_data_list(){		
		$this->db->order_by("order_id","asc");
		$query = $this->db->get("ci_order");
			
		return $query->result();
	}
	
	function insert_data($data){
		$this->db->insert('ci_order', $data); 
	}
	
	function get_data_single($id){
		$this->db->where("order_id", $id);
		$query = $this->db->get("ci_order");
		return $query->row();	
	}
	
	function update_data($data,$id){
		$this->db->where('order_id', $id);
		$this->db->update('ci_order', $data);
	}
	
	function delete_data($val){
		$this->db->where_in('order_id', $val);
		return $this->db->delete('ci_order');
	}
	
	function getProfileList() {
		$this->db->order_by('profile_id', 'asc');
		$query = $this->db->get('profile');
		
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

	public function get_order_detail_result($order_id) {
		$this->db->order_by('order_detail_id', 'asc');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('ci_order_detail');

		return $query->result();
	}

	public function getProductRecord($product_id) {
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('ci_product');

		return $query->row();
	}

	public function getOrderRecord($order_id) {
		$this->db->where('order_id', $order_id);
		$this->db->join('ci_member', 'ci_order.member_id = ci_member.member_id', 'inner');
		$query = $this->db->get('ci_order');

		return $query->row();
	}

	public function getVipResult() {
		$this->db->order_by('vip_order_amount', 'asc');
		$query = $this->db->get('ci_vip');

		return $query->result();
	}
}