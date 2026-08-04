<?php
class Model_bank extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_data_list(){		
		$this->db->order_by("bank_id","asc");
		$query = $this->db->get("ci_bank");
			
		return $query->result();
	}
	
	function insert_data($data){
		$this->db->insert('ci_bank', $data); 
	}
	
	function get_data_single($id){
		$this->db->where("bank_id", $id);
		$query = $this->db->get("ci_bank");
		return $query->row();	
	}
	
	function update_data($data,$id){
		$this->db->where('bank_id', $id);
		$this->db->update('ci_bank', $data);
	}
	
	function delete_data($val){
		$this->db->where_in('bank_id', $val);
		return $this->db->delete('ci_bank');
	}
	
	function getProfileList() {
		$this->db->order_by('profile_id', 'asc');
		$query = $this->db->get('profile');
		
		return $query->result();
	}
}