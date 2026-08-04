<?php
class Model_product extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}

	// color
	function get_color_list(){		
		$this->db->order_by("color_id","asc");
		$query = $this->db->get("ci_color");
			
		return $query->result();
	}
	
	function insert_color($data){
		$this->db->insert('ci_color', $data); 
	}
	
	function get_color_single($id){
		$this->db->where("color_id", $id);
		$query = $this->db->get("ci_color");
		return $query->row();	
	}
	
	function update_color($data,$id){
		$this->db->where('color_id', $id);
		$this->db->update('ci_color', $data);
	}
	
	function delete_color($val){
		$this->db->where_in('color_id', $val);
		return $this->db->delete('ci_color');
	}
	// end color

	// size
	function get_size_list(){		
		$this->db->order_by("size_id","asc");
		$query = $this->db->get("ci_size");
			
		return $query->result();
	}
	
	function insert_size($data){
		$this->db->insert('ci_size', $data); 
	}
	
	function get_size_single($id){
		$this->db->where("size_id", $id);
		$query = $this->db->get("ci_size");
		return $query->row();	
	}
	
	function update_size($data,$id){
		$this->db->where('size_id', $id);
		$this->db->update('ci_size', $data);
	}
	
	function delete_size($val){
		$this->db->where_in('size_id', $val);
		return $this->db->delete('ci_size');
	}
	// end size
	
	// category1
	function get_category1_list(){		
		$this->db->order_by("category1_id","asc");
		$query = $this->db->get("ci_category1");
			
		return $query->result();
	}
	
	function insert_category1($data){
		$this->db->insert('ci_category1', $data); 
	}
	
	function get_category1_single($id){
		$this->db->where("category1_id", $id);
		$query = $this->db->get("ci_category1");
		return $query->row();	
	}
	
	function update_category1($data,$id){
		$this->db->where('category1_id', $id);
		$this->db->update('ci_category1', $data);
	}
	
	function delete_category1($val){
		$this->db->where_in('category1_id', $val);
		return $this->db->delete('ci_category1');
	}

	public function getCategory1Banner($category1_id) {
		$this->db->where('category1_id', $category1_id);
		$this->db->order_by('map_category1_id', 'asc');
		$query = $this->db->get('ci_map_category1');

		return $query->result();
	}
	// end category1

	// category2
	function get_category2_list(){		
		$this->db->order_by("category2_id","asc");
		$query = $this->db->get("ci_category2");
			
		return $query->result();
	}
	
	function insert_category2($data){
		$this->db->insert('ci_category2', $data); 
	}
	
	function get_category2_single($id){
		$this->db->where("category2_id", $id);
		$query = $this->db->get("ci_category2");
		return $query->row();	
	}
	
	function update_category2($data,$id){
		$this->db->where('category2_id', $id);
		$this->db->update('ci_category2', $data);
	}
	
	function delete_category2($val){
		$this->db->where_in('category2_id', $val);
		return $this->db->delete('ci_category2');
	}
	// end category2

	// product
	function get_product_list(){		
		$this->db->order_by("product_id","asc");
		$query = $this->db->get("ci_product");
			
		return $query->result();
	}
	
	function insert_product($data){
		$this->db->insert('ci_product', $data); 
	}
	
	function get_product_single($id){
		$this->db->where("ci_product.product_id", $id);
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$this->db->join('ci_category1', 'ci_category2.category1_id = ci_category1.category1_id', 'inner');
		$query = $this->db->get("ci_product");
		return $query->row();	
	}
	
	function update_product($data,$id){
		$this->db->where('product_id', $id);
		$this->db->update('ci_product', $data);
	}
	
	function delete_product($val){
		$this->db->where_in('product_id', $val);
		return $this->db->delete('ci_product');
	}

	function get_product_photo($product_id) {
		$this->db->where('product_id', $product_id);
		$this->db->order_by('product_photo_id', 'asc');
		$query = $this->db->get('ci_product_photo');

		return $query->result();
	}

	public function getProductByCategory1($category1_id) {
		$this->db->order_by('ci_product.product_sort', 'asc');
		$this->db->where('ci_category2.category1_id', $category1_id);
		$this->db->join('ci_category2', 'ci_product.category2_id = ci_category2.category2_id', 'inner');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function getProductRelated($product_id, $map_product_related_product_id) {
		$this->db->where('product_id', $product_id);
		$this->db->where('map_product_related_product_id', $map_product_related_product_id);
		$query = $this->db->get('ci_map_product_related');

		return $query->row();
	}
	// end product
}