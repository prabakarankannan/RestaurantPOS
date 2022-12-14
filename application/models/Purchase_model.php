<?php
/*
  ###########################################################
  # PRODUCT NAME: 	Restaurant POS - Next Gen Restaurant POS
  ###########################################################
  # AUTHER:		Prabakaran
  ###########################################################
  # EMAIL:		prabaerode@gmail.com
  ###########################################################
  # COPYRIGHTS:		RESERVED BY Restaurant POS
  ###########################################################
  # WEBSITE:		https://prabakarankannan.in/
  ###########################################################
  # This is Purchase_model Model
  ###########################################################
 */
class Purchase_model extends CI_Model {
 /**
     * generate Purchase Ref No
     * @access public
     * @return string
     * @param int
     */
    public function generatePurRefNo($outlet_id) {
        $purchase_count = $this->db->query("SELECT count(id) as purchase_count
               FROM tbl_purchase where outlet_id=$outlet_id")->row('purchase_count');
        $ingredient_code = str_pad($purchase_count + 1, 6, '0', STR_PAD_LEFT);
        return $ingredient_code;
    }
 /**
     * get Ingredient List With Unit And Price
     * @access public
     * @return object
     * @param int
     */
    public function getIngredientListWithUnitAndPrice($company_id) {
        $result = $this->db->query("SELECT tbl_ingredients.id, tbl_ingredients.name, tbl_ingredients.code, tbl_ingredients.purchase_price, tbl_units.unit_name
          FROM tbl_ingredients 
          JOIN tbl_units ON tbl_ingredients.unit_id = tbl_units.id
          WHERE tbl_ingredients.company_id=$company_id AND tbl_ingredients.del_status = 'Live'  
          ORDER BY tbl_ingredients.name ASC")->result();
        return $result;
    }
    /**
     * get Purchase Ingredients
     * @access public
     * @return object
     * @param int
     */
    public function getPurchaseIngredients($id) {
        $this->db->select("*");
        $this->db->from("tbl_purchase_ingredients");
        $this->db->order_by('id', 'ASC');
        $this->db->where("purchase_id", $id);
        $this->db->where("del_status", 'Live');
        return $this->db->get()->result();
    }

}

