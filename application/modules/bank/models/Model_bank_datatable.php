<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_bank_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
     public function bank_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (bank_id like '%{$keyword}%' or bank_name_th like '%{$keyword}%' or bank_name_en like '%{$keyword}%' or bank_company_th like '%{$keyword}%' or bank_company_en like '%{$keyword}%' or bank_branch_th like '%{$keyword}%' or bank_branch_en like '%{$keyword}%' or bank_account_no like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);
		$this->db->order_by($param['column'], $param['dir']);
 
		$query = $this->db->get('ci_bank');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('ci_bank')->where($condition)->count_all_results();
		$count = $this->db->from('ci_bank')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>