<?php
/*
  ###########################################################
  # PRODUCT NAME: 	Door Knock
  ###########################################################
  # AUTHER:		Prabakaran
  ###########################################################
  # EMAIL:		prabaerode@gmail.com
  ###########################################################
  # COPYRIGHTS:		RESERVED BY Restaurant POS
  ###########################################################
  # WEBSITE:		https://prabakarankannan.in/
  ###########################################################
  # This is Payment_model Model
  ###########################################################
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Payment_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
    /**
     * payment configration
     * @access public
     * @param int
     */
	function paymentConfig($payment_name) {
        $paymentSetting = paymentSetting();
        if($payment_name=="paypal"){
            if(APPLICATION_MODE == 'demo')
            {
                return ["sandbox","",""];
            }else{
                return [$paymentSetting->field_2_v,$paymentSetting->field_2_key_1,$paymentSetting->field_2_key_2];
            }


        }
	}

}