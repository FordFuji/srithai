<?php
class Model_article extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_data_list(){		
		$this->db->order_by("article_id","asc");
		$query = $this->db->get("ci_article");
			
		return $query->result();
	}
	
	function insert_data($data){
		$this->db->insert('ci_article', $data); 
	}
	
	function get_data_single($id){
		$this->db->where("article_id", $id);
		$query = $this->db->get("ci_article");
		return $query->row();	
	}
	
	function update_data($data,$id){
		$this->db->where('article_id', $id);
		$this->db->update('ci_article', $data);
	}
	
	function delete_data($val){
		$this->db->where_in('article_id', $val);
		return $this->db->delete('ci_article');
	}
	
	function getProfileList() {
		$this->db->order_by('profile_id', 'asc');
		$query = $this->db->get('profile');
		
		return $query->result();
	}

	function get_banner_article_data_single($id){
		$this->db->where("banner_article_id", $id);
		$query = $this->db->get("ci_banner_article");
		return $query->row();	
	}
	
	function banner_article_update_data($data,$id){
		$this->db->where('banner_article_id', $id);
		$this->db->update('ci_banner_article', $data);
	}
}