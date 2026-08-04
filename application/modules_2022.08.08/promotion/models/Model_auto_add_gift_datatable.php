<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_auto_add_gift_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
     public function auto_add_gift_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (auto_add_gift_id like '%{$keyword}%' or auto_add_gift_name_th like '%{$keyword}%' or auto_add_gift_name_en like '%{$keyword}%' or auto_add_gift_use_auto_add_gift like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);
		$this->db->order_by($param['column'], $param['dir']);
		
		$this->db->join('ci_product', 'ci_auto_add_gift.product_id = ci_product.product_id', 'inner');
		$query = $this->db->get('ci_auto_add_gift');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('ci_auto_add_gift')->join('ci_product', 'ci_auto_add_gift.product_id = ci_product.product_id', 'inner')->where($condition)->count_all_results();
		$count = $this->db->from('ci_auto_add_gift')->join('ci_product', 'ci_auto_add_gift.product_id = ci_product.product_id', 'inner')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>