<?php
class Model_data_sub_menu extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_ford_list(){		
		$this->db->order_by("ford_id","asc");
		$query = $this->db->get("ci_ford");
			
		return $query->result();
	}
	
	function insert_ford($data){
		$this->db->insert('ci_ford', $data); 
	}
	
	function get_ford_single($id){
		$this->db->where("ford_id", $id);
		$query = $this->db->get("ci_ford");
		return $query->row();	
	}
	
	function update_ford($data,$id){
		$this->db->where('ford_id', $id);
		$this->db->update('ci_ford', $data);
	}
	
	function delete_ford($val){
		$this->db->where_in('ford_id', $val);
		return $this->db->delete('ci_ford');
	}
	
	function getProfileList() {
		$this->db->order_by('profile_id', 'asc');
		$query = $this->db->get('profile');
		
		return $query->result();
	}
}