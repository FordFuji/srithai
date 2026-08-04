<?php
class Model_shipping_price extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	/*function get_data_list(){		
		$this->db->order_by("shipping_price_id","asc");
		$query = $this->db->get("ci_shipping_price");
			
		return $query->result();
	}
	
	function insert_data($data){
		$this->db->insert('ci_shipping_price', $data); 
	}*/
	
	function get_data_single(){
		$this->db->where("shipping_price_id", 1);
		$query = $this->db->get("ci_shipping_price");
		return $query->row();	
	}
	
	function update_data($data){
		$this->db->where('shipping_price_id', 1);
		$this->db->update('ci_shipping_price', $data);
	}
	
	/*function delete_data($val){
		$this->db->where_in('shipping_price_id', $val);
		return $this->db->delete('ci_shipping_price');
	}*/
}