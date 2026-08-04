<?php
class Model_banner extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_data_list(){		
		$this->db->order_by("banner_id","asc");
		$query = $this->db->get("ci_banner");
			
		return $query->result();
	}
	
	function insert_data($data){
		$this->db->insert('ci_banner', $data); 
	}
	
	function get_data_single($id){
		$this->db->where("banner_id", $id);
		$query = $this->db->get("ci_banner");
		return $query->row();	
	}
	
	function update_data($data,$id){
		$this->db->where('banner_id', $id);
		$this->db->update('ci_banner', $data);
	}
	
	function delete_data($val){
		$this->db->where_in('banner_id', $val);
		return $this->db->delete('ci_banner');
	}
	
	function getProfileList() {
		$this->db->order_by('profile_id', 'asc');
		$query = $this->db->get('profile');
		
		return $query->result();
	}
}