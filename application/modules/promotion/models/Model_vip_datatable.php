<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_vip_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
     public function vip_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (vip_id like '%{$keyword}%' or vip_name_th like '%{$keyword}%' or vip_name_en like '%{$keyword}%' or vip_order_amount like '%{$keyword}%' or vip_discount like '%{$keyword}%' or vip_begin_date like '%{$keyword}%' or vip_end_date like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);
		$this->db->order_by($param['column'], $param['dir']);
 
		$query = $this->db->get('ci_vip');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('ci_vip')->where($condition)->count_all_results();
		$count = $this->db->from('ci_vip')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>