<?php 
class ModelPaymentQuickPayCreditcard extends Model {

  	public function getMethod($address, $total) { 
		$this->load->language('payment/quickpay_creditcard');
		
		if ($this->config->get('quickpay_creditcard_status')) {
      		$status = TRUE;
      	} else {
			$status = FALSE;
		}
		
		$method_data = array();
	
		if ($status) {  
      		$method_data = array( 
        		'code'        	=> 'quickpay_creditcard',
        		'title'      	=> $this->language->get('text_title'),
        		'terms'			=> '',
				'sort_order' 	=> $this->config->get('quickpay_creditcard_sort_order')
      		);
    	}
   
    	return $method_data;
  	}
}
?>