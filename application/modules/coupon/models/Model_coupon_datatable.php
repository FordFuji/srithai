<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_coupon_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
     public function coupon_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (coupon_id like '%{$keyword}%' or coupon_code like '%{$keyword}%' or coupon_discount like '%{$keyword}%' or coupon_type like '%{$keyword}%' or coupon_begin_date like '%{$keyword}%' or coupon_end_date like '%{$keyword}%' or coupon_limit like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);
		$this->db->order_by($param['column'], $param['dir']);
 
		$query = $this->db->get('ci_coupon');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('ci_coupon')->where($condition)->count_all_results();
		$count = $this->db->from('ci_coupon')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>