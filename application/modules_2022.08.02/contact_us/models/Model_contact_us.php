<?php
class Model_contact_us extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_contact_us_list(){		
		$this->db->order_by("contact_us_id","asc");
		$query = $this->db->get("ci_contact_us");
			
		return $query->result();
	}
	
	function insert_contact_us($data){
		$this->db->insert('ci_contact_us', $data); 
	}
	
	function get_contact_us_single($id){
		$this->db->where("contact_us_id", $id);
		$query = $this->db->get("ci_contact_us");
		return $query->row();	
	}
	
	function update_contact_us($data,$id){
		$this->db->where('contact_us_id', $id);
		$this->db->update('ci_contact_us', $data);
	}
	
	function delete_contact_us($val){
		$this->db->where_in('contact_us_id', $val);
		return $this->db->delete('ci_contact_us');
	}
	
	function getProfileList() {
		$this->db->order_by('profile_id', 'asc');
		$query = $this->db->get('profile');
		
		return $query->result();
	}
}