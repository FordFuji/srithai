<?php
class Model_member extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_member_list(){		
		$this->db->order_by("member_id","asc");
		$query = $this->db->get("ci_member");
			
		return $query->result();
	}
	
	function insert_member($data){
		$this->db->insert('ci_member', $data); 
	}
	
	function get_member_single($id){
		$this->db->where("member_id", $id);
		$query = $this->db->get("ci_member");
		return $query->row();	
	}
	
	function update_member($data,$id){
		$this->db->where('member_id', $id);
		$this->db->update('ci_member', $data);
	}
	
	function delete_member($val){
		$this->db->where_in('member_id', $val);
		return $this->db->delete('ci_member');
	}
	
	function getProfileList() {
		$this->db->order_by('profile_id', 'asc');
		$query = $this->db->get('profile');
		
		return $query->result();
	}

	public function get_member_shipping_result() {
		$this->db->where('member_id', $this->session->userdata('member_id'));
		$this->db->order_by('member_shipping_id', 'asc');
		$query = $this->db->get('ci_member_shipping');

		return $query->result();
	}

	public function get_province_record($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('provinces');

		return $query->row();
	}

	public function get_amphur_record($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('districts');

		return $query->row();
	}

	public function get_tumbol_record($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('subdistricts');

		return $query->row();
	}

	public function getVipNameRecord($vip_id) {
		$this->db->where('vip_id', $vip_id);
		$query = $this->db->get('ci_vip');

		$row = $query->row();

		if(!empty($row)) {
			return get2Lang($this->session->userdata('lang'), $row->vip_name_th, $row->vip_name_en);
		}
	}

	public function getVipNameRow($vip_id) {
		$this->db->where('vip_id', $vip_id);
		$query = $this->db->get('ci_vip');

		$row = $query->row();

		if(!empty($row)) {
			return $row->vip_name_en;
		}
	}

	public function getOrderHistory($member_id) {
		$this->db->order_by('order_id', 'desc');
		$this->db->where('member_id', $member_id);
		$query = $this->db->get('ci_order');

		return $query->result();
	}

	public function getOrderDetailHistory($order_id) {
		$this->db->order_by('order_detail_id', 'asc');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('ci_order_detail');

		return $query->result();
	}
}