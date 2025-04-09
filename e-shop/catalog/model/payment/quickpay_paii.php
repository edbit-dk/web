<?php 
class ModelPaymentQuickPayPaii extends Model {

  	public function getMethod($address) { 
		$this->language->load('payment/quickpay_paii');
		
		if ($this->config->get('quickpay_paii_status')) {
      		$status = TRUE;
      	} else {
			$status = FALSE;
		}
		
		$method_data = array();
	
		if ($status) {  
      		$method_data = array( 
        		'code'         => 'quickpay_paii',
        		'title'      => $this->language->get('text_title'),
        		'terms'		 => '',
				'sort_order' => $this->config->get('quickpay_paii_sort_order')
      		);
    	}
   
    	return $method_data;
  	}
}
?>