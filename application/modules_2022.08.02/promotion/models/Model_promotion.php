<?php
class Model_promotion extends CI_Model {
	
	function __construct() {
		parent::__construct();
        $this->load->database();	
	}
	
	// Buy and giveaway
	function get_buy_and_giveaway_list(){		
		$this->db->order_by("buy_and_giveaway_id","asc");
		$query = $this->db->get("ci_buy_and_giveaway");
			
		return $query->result();
	}
	
	function insert_buy_and_giveaway($data){
		$this->db->insert('ci_buy_and_giveaway', $data); 
	}
	
	function get_buy_and_giveaway_single($id){
		$this->db->where("buy_and_giveaway_id", $id);
		$query = $this->db->get("ci_buy_and_giveaway");
		return $query->row();	
	}
	
	function update_buy_and_giveaway($data,$id){
		$this->db->where('buy_and_giveaway_id', $id);
		$this->db->update('ci_buy_and_giveaway', $data);
	}
	
	function delete_buy_and_giveaway($val){
		$this->db->where_in('buy_and_giveaway_id', $val);
		return $this->db->delete('ci_buy_and_giveaway');
	}

	public function getProductResult() {
		$this->db->order_by('product_sort', 'asc');
		$query = $this->db->get('ci_product');

		return $query->result();
	}

	public function getBuyAndGiveawayLastedId() {
		$this->db->order_by('buy_and_giveaway_id', 'desc');
		$query = $this->db->get('ci_buy_and_giveaway');

		return $query->row();
	}

	public function getMapBuy($buy_and_giveaway_id) {
		$this->db->order_by('map_buy_id', 'asc');
		$this->db->where('buy_and_giveaway_id', $buy_and_giveaway_id);
		$query = $this->db->get('ci_map_buy');

		return $query->result();
	}

	public function getMapGiveaway($buy_and_giveaway_id) {
		$this->db->order_by('map_giveaway_id', 'asc');
		$this->db->where('buy_and_giveaway_id', $buy_and_giveaway_id);
		$query = $this->db->get('ci_map_giveaway');

		return $query->result();
	}
	// End Buy and giveaway

	// Get_set
	function get_set_list(){		
		$this->db->order_by("get_set_id","asc");
		$query = $this->db->get("ci_get_set");
			
		return $query->result();
	}
	
	function insert_get_set($data){
		$this->db->insert('ci_get_set', $data); 
	}
	
	function get_set_single($id){
		$this->db->where("get_set_id", $id);
		$query = $this->db->get("ci_get_set");
		return $query->row();	
	}
	
	function update_get_set($data,$id){
		$this->db->where('get_set_id', $id);
		$this->db->update('ci_get_set', $data);
	}
	
	function delete_get_set($val){
		$this->db->where_in('get_set_id', $val);
		return $this->db->delete('ci_get_set');
	}

	public function getGetSetLastedId() {
		$this->db->order_by('get_set_id', 'desc');
		$query = $this->db->get('ci_get_set');

		return $query->row();
	}

	public function getMapGetSet($get_set_id) {
		$this->db->where('get_set_id', $get_set_id);
		$this->db->order_by('map_get_set_id', 'asc');
		$query = $this->db->get('ci_map_get_set');

		return $query->result();
	}
	// Set

	// Point
	function get_point_list(){		
		$this->db->order_by("point_id","asc");
		$query = $this->db->get("ci_point");
			
		return $query->result();
	}
	
	function insert_point($data){
		$this->db->insert('ci_point', $data); 
	}
	
	function get_point_single($id){
		$this->db->where("point_id", $id);
		$query = $this->db->get("ci_point");
		return $query->row();	
	}
	
	function update_point($data,$id){
		$this->db->where('point_id', $id);
		$this->db->update('ci_point', $data);
	}
	
	function delete_point($val){
		$this->db->where_in('point_id', $val);
		return $this->db->delete('ci_point');
	}
	// End Point

	// auto_add_gift
	function get_auto_add_gift_list(){		
		$this->db->order_by("auto_add_gift_id","asc");
		$query = $this->db->get("ci_auto_add_gift");
			
		return $query->result();
	}
	
	function insert_auto_add_gift($data){
		$this->db->insert('ci_auto_add_gift', $data); 
	}
	
	function get_auto_add_gift_single($id){
		$this->db->where("auto_add_gift_id", $id);
		$query = $this->db->get("ci_auto_add_gift");
		return $query->row();	
	}
	
	function update_auto_add_gift($data, $id){
		$this->db->where('auto_add_gift_id', $id);
		$this->db->update('ci_auto_add_gift', $data);
	}
	
	function delete_auto_add_gift($val){
		$this->db->where_in('auto_add_gift_id', $val);
		return $this->db->delete('ci_auto_add_gift');
	}
	// End auto_add_gift

	// special_promotion_rule
	function get_special_promotion_rule_list(){		
		$this->db->order_by("special_promotion_rule_id","asc");
		$query = $this->db->get("ci_special_promotion_rule");
			
		return $query->result();
	}
	
	function insert_special_promotion_rule($data){
		$this->db->insert('ci_special_promotion_rule', $data); 
	}
	
	function get_special_promotion_rule_single(){
		$this->db->where("special_promotion_rule_id", 1);
		$query = $this->db->get("ci_special_promotion_rule");
		return $query->row();	
	}
	
	function update_special_promotion_rule($data){
		$this->db->where('special_promotion_rule_id', 1);
		$this->db->update('ci_special_promotion_rule', $data);
	}
	
	function delete_special_promotion_rule($val){
		$this->db->where_in('special_promotion_rule_id', $val);
		return $this->db->delete('ci_special_promotion_rule');
	}

	public function getMapSpecialPromotionRule($product_id, $i) {
		$this->db->where('map_special_promotion_rule_id', $i);
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('ci_map_special_promotion_rule');

		return $query->row();
	}
	// End special_promotion_rule

	// multiple_price_level
	function get_multiple_price_level_list(){		
		$this->db->order_by("multiple_price_level_id","asc");
		$this->db->where("multiple_price_level_discount !=", 0);
		$query = $this->db->get("ci_multiple_price_level");
			
		return $query->result();
	}
	
	function insert_multiple_price_level($data){
		$this->db->insert('ci_multiple_price_level', $data); 
	}
	
	function get_multiple_price_level_single(){
		$this->db->where("multiple_price_level_id", 1);
		$query = $this->db->get("ci_multiple_price_level");
		return $query->row();	
	}
	
	function update_multiple_price_level($data){
		$this->db->where('multiple_price_level_id', 1);
		$this->db->update('ci_multiple_price_level', $data);
	}
	
	function delete_multiple_price_level($val){
		$this->db->where_in('multiple_price_level_id', $val);
		return $this->db->delete('ci_multiple_price_level');
	}
	// End multiple_price_level

	// discount_category
	function discount_category_list(){		
		$this->db->order_by("discount_category_id","asc");
		$query = $this->db->get("ci_discount_category");
			
		return $query->result();
	}
	
	function insert_discount_category($data){
		$this->db->insert('ci_discount_category', $data); 
	}
	
	function discount_category_single($id){
		$this->db->where("discount_category_id", $id);
		$query = $this->db->get("ci_discount_category");
		return $query->row();	
	}
	
	function update_discount_category($data,$id){
		$this->db->where('discount_category_id', $id);
		$this->db->update('ci_discount_category', $data);
	}
	
	function delete_discount_category($val){
		$this->db->where_in('discount_category_id', $val);
		return $this->db->delete('ci_discount_category');
	}

	public function getCategory1Result() {
		$this->db->order_by('category1_id', 'asc');
		$query = $this->db->get('ci_category1');

		return $query->result();
	}

	public function getCategory2Result($category1_id) {
		$this->db->order_by('category2_id', 'asc');
		$this->db->where('category1_id', $category1_id);
		$query = $this->db->get('ci_category2');

		return $query->result();
	}
	// End discount_category

	// vip
	function get_vip_list(){		
		$this->db->order_by("vip_id","asc");
		$query = $this->db->get("ci_vip");
			
		return $query->result();
	}
	
	function insert_vip($data){
		$this->db->insert('ci_vip', $data); 
	}
	
	function get_vip_single($id){
		$this->db->where("vip_id", $id);
		$query = $this->db->get("ci_vip");
		return $query->row();	
	}
	
	function update_vip($data,$id){
		$this->db->where('vip_id', $id);
		$this->db->update('ci_vip', $data);
	}
	
	function delete_vip($val){
		$this->db->where_in('vip_id', $val);
		return $this->db->delete('ci_vip');
	}
	// End vip
}