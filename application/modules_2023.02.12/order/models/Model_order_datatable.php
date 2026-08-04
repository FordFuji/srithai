<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_order_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
     public function order_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (order_id like '%{$keyword}%' or order_no like '%{$keyword}%' or order_name like '%{$keyword}%' or order_surname like '%{$keyword}%' or order_tel like '%{$keyword}%' or order_email like '%{$keyword}%' or order_total like '%{$keyword}%' or order_status like '%{$keyword}%' or order_datetime_create like '%{$keyword}%' or order_datetime_update like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);

		if($this->session->userdata('codyung') == '') {
			$this->db->order_by('order_id', 'desc');

			$data_sess = array(
				'codyung' => true
			);

			$this->session->set_userdata($data_sess);
		} else {
			$this->db->order_by($param['column'], $param['dir']);
		}
		
 
		$query = $this->db->get('ci_order');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('ci_order')->where($condition)->count_all_results();
		$count = $this->db->from('ci_order')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>