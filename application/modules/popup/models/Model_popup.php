<?php
class Model_popup extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_data_list(){		
		$this->db->order_by("popup_id","asc");
		$query = $this->db->get("ci_popup");
			
		return $query->result();
	}
	
	function insert_data($data){
		$this->db->insert('ci_popup', $data); 
	}
	
	function get_data_single($id){
		$this->db->where("popup_id", $id);
		$query = $this->db->get("ci_popup");
		return $query->row();	
	}
	
	function update_data($data,$id){
		$this->db->where('popup_id', $id);
		$this->db->update('ci_popup', $data);
	}
	
	function delete_data($val){
		$this->db->where_in('popup_id', $val);
		return $this->db->delete('ci_popup');
	}
	
	function getProfileList() {
		$this->db->order_by('profile_id', 'asc');
		$query = $this->db->get('profile');
		
		return $query->result();
	}
}