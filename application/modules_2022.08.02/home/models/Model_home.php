<?php
class Model_home extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_data_single(){
		$this->db->where("home_id", 1);
		$query = $this->db->get("ci_home");
		return $query->row();	
	}
	
	function update_data($data){
		$this->db->where('home_id', 1);
		$this->db->update('ci_home', $data);
	}
}