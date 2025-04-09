<?php 
class ModelPaymentQuickPayViabill extends Model {

  	public function getMethod($address) { 
		$this->language->load('payment/quickpay_viabill');
		
		if ($this->config->get('quickpay_viabill_status')) {
      		$status = TRUE;
      	} else {
			$status = FALSE;
		}
		
		$method_data = array();
	
		if ($status) {  
      		$method_data = array( 
        		'code'         => 'quickpay_viabill',
        		'title'      => $this->language->get('text_title'),
        		'terms'		 => '',
				'sort_order' => $this->config->get('quickpay_viabill_sort_order')
      		);
    	}
   
    	return $method_data;
  	}
}
?>