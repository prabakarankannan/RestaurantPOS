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
  # This is Pricing_plan_model Model
  ###########################################################
 */
class Pricing_plan_model extends CI_Model {

    /**
     * get Supplier Due
     * @access public
     * @return object
     * @param int
     */
    public function getSupplierDue($supplier_id) {

        $outlet_id = $this->session->userdata('outlet_id');

        $supplier_due = $this->db->query("SELECT SUM(due) as due FROM tbl_purchase WHERE supplier_id=$supplier_id and outlet_id=$outlet_id and del_status='Live'")->row();

        $supplier_payment = $this->db->query("SELECT SUM(amount) as amount FROM tbl_pricing_plans WHERE supplier_id=$supplier_id and outlet_id=$outlet_id and del_status='Live'")->row();

        $remaining_due = $supplier_due->due - $supplier_payment->amount;

        return $remaining_due;
    }

}

