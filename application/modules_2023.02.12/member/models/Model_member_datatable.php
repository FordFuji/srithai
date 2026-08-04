<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_member_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
     public function member_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (member_id like '%{$keyword}%' or member_name like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);
		$this->db->order_by($param['column'], $param['dir']);
 
		$this->db->join('ci_vip', 'ci_member.vip_id = ci_vip.vip_id', 'inner');
		$query = $this->db->get('ci_member');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('ci_member')->join('ci_vip', 'ci_member.vip_id = ci_vip.vip_id', 'inner')->where($condition)->count_all_results();
		$count = $this->db->from('ci_member')->join('ci_vip', 'ci_member.vip_id = ci_vip.vip_id', 'inner')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>