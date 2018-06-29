<?php
class Sng_Restrict_Model_Observer extends Varien_Object {

    public function checkForLogin(Varien_Event_Observer $observer){
		$allow = array('customer_account_login','customer_account_forgotpassword','customer_account_resetpassword','customer_account_loginpost','customer_account_forgotpasswordpost','customer_account_resetpasswordpost');
        if(!Mage::getSingleton('customer/session')->isLoggedIn() && !in_array(strtolower($observer->getControllerAction()->getFullActionName()),$allow) ) {
            Mage::app()->getResponse()->setRedirect(Mage::getUrl('customer/account/login'))->sendResponse();
            exit;
        }
    }
}