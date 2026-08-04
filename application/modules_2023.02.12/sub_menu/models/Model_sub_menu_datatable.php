<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_sub_menu_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
     public function sub_menu_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (menu_name like '%{$keyword}%' or sub_menu_name like '%{$keyword}%' or sub_menu_controller like '%{$keyword}%' or sub_menu_sort like '%{$keyword}%' or sub_menu_enable like '%{$keyword}%' or sub_menu_link like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);
		$this->db->order_by($param['column'], $param['dir']);
 
        $this->db->join('menu', 'sub_menu.menu_id = menu.menu_id', 'inner');
		$query = $this->db->get('sub_menu');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('sub_menu')->join('menu', 'sub_menu.menu_id = menu.menu_id', 'inner')->where($condition)->count_all_results();
		$count = $this->db->from('sub_menu')->join('menu', 'sub_menu.menu_id = menu.menu_id', 'inner')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>