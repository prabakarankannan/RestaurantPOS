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
  # This is Admin_model Model
  ###########################################################
 */

class Admin_model extends CI_Model {
    /**
     * get all company info
     * @access public
     * @return object
     * @param no
     */
    public function getAllCompanies() {
        $this->db->select("*");
        $this->db->from("tbl_users");
        $this->db->order_by('tbl_companies.id', 'desc');
        $this->db->where("tbl_users.role", "Admin");
        $this->db->join('tbl_companies', 'tbl_users.company_id = tbl_companies.id');
        return $this->db->get()->result();
    }

}

?>
