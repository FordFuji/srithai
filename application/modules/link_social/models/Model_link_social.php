<?php
class Model_link_social extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_data_list(){		
		$this->db->order_by("link_social_id","asc");
		$query = $this->db->get("ci_link_social");
			
		return $query->result();
	}
	
	function insert_data($data){
		$this->db->insert('ci_link_social', $data); 
	}
	
	function get_data_single($id){
		$this->db->where("link_social_id", $id);
		$query = $this->db->get("ci_link_social");
		return $query->row();	
	}
	
	function update_data($data,$id){
		$this->db->where('link_social_id', $id);
		$this->db->update('ci_link_social', $data);
	}
	
	function delete_data($val){
		$this->db->where_in('link_social_id', $val);
		return $this->db->delete('ci_link_social');
	}
	
	function getProfileList() {
		$this->db->order_by('profile_id', 'asc');
		$query = $this->db->get('profile');
		
		return $query->result();
	}
}