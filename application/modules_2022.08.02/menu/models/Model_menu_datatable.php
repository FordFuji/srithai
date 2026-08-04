<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_menu_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
    public function menu_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (menu_id like '%{$keyword}%' or menu_name like '%{$keyword}%' or menu_controller like '%{$keyword}%' or menu_sort like '%{$keyword}%' or menu_enable like '%{$keyword}%' or menu_link like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);
		$this->db->order_by($param['column'], $param['dir']);
 
		$query = $this->db->get('menu');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('menu')->where($condition)->count_all_results();
		$count = $this->db->from('menu')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>