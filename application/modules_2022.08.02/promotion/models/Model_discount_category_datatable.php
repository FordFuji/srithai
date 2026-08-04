<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_discount_category_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
     public function discount_category_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (discount_category_id like '%{$keyword}%' or category1_name_th like '%{$keyword}%' or category1_name_en like '%{$keyword}%' or category2_name_th like '%{$keyword}%' or category2_name_en like '%{$keyword}%' or discount_category_discount like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);
		$this->db->order_by($param['column'], $param['dir']);
		$this->db->join('ci_category2', 'ci_discount_category.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
 
		$query = $this->db->get('ci_discount_category');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('ci_discount_category')->where($condition)->join('ci_category2', 'ci_discount_category.category2_id = ci_category2.category2_id', 'inner')->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner')->count_all_results();
		$count = $this->db->from('ci_discount_category')->join('ci_category2', 'ci_discount_category.category2_id = ci_category2.category2_id', 'inner')->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>