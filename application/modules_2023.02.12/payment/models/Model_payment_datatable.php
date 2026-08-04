<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_payment_datatable extends CI_Model { 
 	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
 	// datatable
     public function payment_datatable($param){
		$keyword = $param['keyword'];
		$this->db->select('*');
 
		$condition = "1=1";
		if(!empty($keyword)){
			$condition .= " and (payment_id like '%{$keyword}%' or ci_payment.order_no like '%{$keyword}%' or payment_account like '%{$keyword}%' or payment_amount like '%{$keyword}%' or payment_date like '%{$keyword}%' or payment_time like '%{$keyword}%' or payment_slip like '%{$keyword}%' or order_datetime_create like '%{$keyword}%' or order_datetime_update like '%{$keyword}%')";
		}
 
		$this->db->where($condition);
		$this->db->limit($param['page_size'], $param['start']);
		if($this->session->userdata('codyung2') == '') {
			$this->db->order_by('payment_id', 'desc');

			$data_sess = array(
				'codyung2' => true
			);

			$this->session->set_userdata($data_sess);
		} else {
			$this->db->order_by($param['column'], $param['dir']);
		}
 
		$this->db->join('ci_order', 'ci_payment.order_no = ci_order.order_no', 'left outer');
		$query = $this->db->get('ci_payment');
		$data = [];
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
		}
 
		$count_condition = $this->db->from('ci_payment')->join('ci_order', 'ci_payment.order_no = ci_order.order_no', 'left outer')->where($condition)->count_all_results();
		$count = $this->db->from('ci_payment')->join('ci_order', 'ci_payment.order_no = ci_order.order_no', 'left outer')->count_all_results();
		$result = array('count'=>$count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
	// end datatable
}
?>