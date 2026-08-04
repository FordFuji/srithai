<?php
class Model_product extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	// category1
	function get_category1_list(){		
		$this->db->order_by("category1_id","asc");
		$query = $this->db->get("ci_category1");
			
		return $query->result();
	}
	
	function insert_category1($data){
		$this->db->insert('ci_category1', $data); 
	}
	
	function get_category1_single($id){
		$this->db->where("category1_id", $id);
		$query = $this->db->get("ci_category1");
		return $query->row();	
	}
	
	function update_category1($data,$id){
		$this->db->where('category1_id', $id);
		$this->db->update('ci_category1', $data);
	}
	
	function delete_category1($val){
		$this->db->where_in('category1_id', $val);
		return $this->db->delete('ci_category1');
	}
	// end category1

	// category2
	function get_category2_list(){		
		$this->db->order_by("category2_id","asc");
		$query = $this->db->get("ci_category2");
			
		return $query->result();
	}
	
	function insert_category2($data){
		$this->db->insert('ci_category2', $data); 
	}
	
	function get_category2_single($id){
		$this->db->where("category2_id", $id);
		$query = $this->db->get("ci_category2");
		return $query->row();	
	}
	
	function update_category2($data,$id){
		$this->db->where('category2_id', $id);
		$this->db->update('ci_category2', $data);
	}
	
	function delete_category2($val){
		$this->db->where_in('category2_id', $val);
		return $this->db->delete('ci_category2');
	}
	// end category2

	// category3
	function get_category3_list(){		
		$this->db->order_by("category3_id","asc");
		$query = $this->db->get("ci_category3");
			
		return $query->result();
	}
	
	function insert_category3($data){
		$this->db->insert('ci_category3', $data); 
	}
	
	function get_category3_single($id){
		$this->db->where("category3_id", $id);
		$query = $this->db->get("ci_category3");
		return $query->row();	
	}
	
	function update_category3($data,$id){
		$this->db->where('category3_id', $id);
		$this->db->update('ci_category3', $data);
	}
	
	function delete_category3($val){
		$this->db->where_in('category3_id', $val);
		return $this->db->delete('ci_category3');
	}
	// end category3
	
}