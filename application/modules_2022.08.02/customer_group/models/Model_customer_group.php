<?php
class Model_customer_group extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	function get_data_list(){		
		$this->db->order_by("customer_group_id","asc");
		$query = $this->db->get("ci_customer_group");
			
		return $query->result();
	}
	
	function insert_data($data){
		$this->db->insert('ci_customer_group', $data); 
	}
	
	function get_data_single($id){
		$this->db->where("customer_group_id", $id);
		$query = $this->db->get("ci_customer_group");
		return $query->row();	
	}
	
	function update_data($data,$id){
		$this->db->where('customer_group_id', $id);
		$this->db->update('ci_customer_group', $data);
	}
	
	function delete_data($val){
		$this->db->where_in('customer_group_id', $val);
		return $this->db->delete('ci_customer_group');
	}
	
	public function getCategory1() {
		$this->db->order_by('category1_id', 'asc');
		$query = $this->db->get('ci_category1');

		return $query->result();
	}

	public function getProductResult($category1_id) {
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->where('ci_category2.category1_id', $category1_id);
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function getCustomerGroupIDLasted() {
		$this->db->order_by('customer_group_id', 'desc');
		$query = $this->db->get('ci_customer_group');

		return $query->row();
	}

	public function getMapCustomerGroupProductId($customer_group_id, $product_id) {
		$this->db->where('customer_group_id', $customer_group_id);
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('ci_map_customer_group');

		return $query->row();
	}
}