<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_category2_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
     public function category2_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (category2_id like '%{$keyword}%' or category1_name like '%{$keyword}%' or category2_name like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);
		$this->db->order_by($param['column'], $param['dir']);
 
		$this->input->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$query = $this->db->get('ci_category2');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('ci_category2')->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner')->where($condition)->count_all_results();
		$count = $this->db->from('ci_category2')->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>