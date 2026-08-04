<?php
class Model_contact_us_send_mail extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_data_list(){		
		$this->db->order_by("contact_us_send_mail_id","asc");
		$query = $this->db->get("ci_contact_us_send_mail");
			
		return $query->result();
	}
	
	function insert_data($data){
		$this->db->insert('ci_contact_us_send_mail', $data); 
	}
	
	function get_data_single($id){
		$this->db->where("contact_us_send_mail_id", $id);
		$query = $this->db->get("ci_contact_us_send_mail");
		return $query->row();	
	}
	
	function update_data($data,$id){
		$this->db->where('contact_us_send_mail_id', $id);
		$this->db->update('ci_contact_us_send_mail', $data);
	}
	
	function delete_data($val){
		$this->db->where_in('contact_us_send_mail_id', $val);
		return $this->db->delete('ci_contact_us_send_mail');
	}
	
	function getProfileList() {
		$this->db->order_by('profile_id', 'asc');
		$query = $this->db->get('profile');
		
		return $query->result();
	}
}