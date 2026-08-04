<?php
class Model_point_per_baht extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_data_single(){
		$this->db->where("point_per_baht_id", 1);
		$query = $this->db->get("ci_point_per_baht");
		return $query->row();	
	}
	
	function update_data($data){
		$this->db->where('point_per_baht_id', 1);
		$this->db->update('ci_point_per_baht', $data);
	}
}