<?php
class ControllerPaymentQuickPayCreditcard extends Controller {
	public function index() {
    	$this->language->load('payment/quickpay_creditcard');
		
		$this->load->model('checkout/order');

		$data['text_credit_card'] = $this->language->get('text_credit_card');
		$data['text_start_date'] = $this->language->get('text_start_date');
		$data['text_issue'] = $this->language->get('text_issue');
		$data['text_wait'] = $this->language->get('text_wait');
		$data['text_creditcard_creditcard'] = $this->language->get('text_creditcard_creditcard');
		$data['text_method_creditcard'] = $this->language->get('text_method_creditcard');
		
		$data['button_confirm'] = $this->language->get('button_confirm');
		$data['button_back'] = $this->language->get('button_back');
		
		$data['action'] = 'https://secure.quickpay.dk/form/';
		
		$fields = array('quickpay_creditcard_protocol', 
						'quickpay_creditcard_merchant', 
						'quickpay_creditcard_language', 
						'quickpay_creditcard_currency', 
						'quickpay_creditcard_md5check', 
						'quickpay_creditcard_protocol', 
						'quickpay_creditcard_msgtype', 
						'quickpay_creditcard_order_status_id', 
						'quickpay_creditcard_autocapture', 
						'quickpay_creditcard_splitpayment');
		
		foreach ($fields as $field) {
			$data[$field] = $this->config->get($field);
		}
		
		$data['quickpay_creditcard_continueurl'] = $this->url->link('checkout/success', '', 'SSL');
		$data['quickpay_creditcard_cancelurl'] = $this->url->link('checkout/checkout', '', 'SSL');
		$data['quickpay_creditcard_callbackurl'] = $this->url->link('payment/quickpay_creditcard/callback', '', 'SSL');
		
		$data['back'] = $data['quickpay_creditcard_cancelurl'];
		
		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		
		$data['order_id'] = str_pad($this->session->data['order_id'], 4, '0', STR_PAD_LEFT);
		$data['amount'] = 100 * $this->currency->format($order_info['total'], $order_info['currency_code'], '', FALSE);
        $data['currency'] = $order_info['currency_code'];
		
		$data['md5'] = $this->createMd5($data, 'creditcard');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/quickpay_creditcard.tpl')) {
			return $this->load->view( $this->config->get('config_template') . '/template/payment/quickpay_creditcard.tpl', $data);
		} else {
			return $this->load->view('default/template/payment/quickpay_creditcard.tpl', $data);
		}	
		
	}

	public function callback() {
		$this->load->language('payment/quickpay_creditcard');
		
		if (isset($this->request->post['ordernumber'])) {
			$order_id = intval($this->request->post['ordernumber']);
		} else {
			$order_id = 0;
		}

		$this->load->model('checkout/order');

		$order_info = $this->model_checkout_order->getOrder($order_id);

		if ($order_info) {
			$md5sort = array(
				'msgtype',
				'ordernumber',
				'amount',
				'currency',
				'time',
				'state',
				'qpstat',
				'qpstatmsg',
				'chstat',
				'chstatmsg',
				'merchant',
				'merchantemail',
				'transaction',
				'cardtype',
				'cardnumber',
				'cardhash',
				'cardexpire',
                'acquirer',
				'splitpayment',
				'fraudprobability',
				'fraudremarks',
				'fraudreport',
				'fee',
			);
			
			$hash = '';
			foreach ($md5sort as $tmp) {
				$hash .= (isset($this->request->post[$tmp])) ? html_entity_decode($this->request->post[$tmp]) : '';
			}
			$hash .= $this->config->get('quickpay_creditcard_md5check');
			$this->log->write($this->request->post['qpstat']);
			if ($this->request->post['md5check'] == md5($hash)) {
				switch($this->request->post['qpstat']) {
					case '000':
						$this->log->write("Order_id = $order_id. Approved.");
						$this->model_checkout_order->addOrderHistory(intval($order_id), $this->config->get('quickpay_creditcard_order_status_completed'));
						$this->response->redirect($this->url->link('checkout/success'));
						break;
					case '001':
						$this->log->write("Order_id = $order_id. Rejected by acquirer. See field 'chstat' and 'chstatmsg' for further explanation.");
						break;
					case '002':
						$this->log->write("Order_id = $order_id. Communication error.");
						break;
					case '003':
						$this->log->write("Order_id = $order_id. Card expired.");
						break;
					case '004':
						$this->log->write("Order_id = $order_id. Transition is not allowed for transaction current state.");
						break;
					case '005':
						$this->log->write("Order_id = $order_id. Authorization is expired.");
						break;
					case '006':
						$this->log->write("Order_id = $order_id. Error reported by acquirer.");
						break;
					case '007':
						$this->log->write("Order_id = $order_id. Error reported by QuickPay.");
						break;
					case '008':
						$this->log->write("Order_id = $order_id. Error in request data.");
						break;
					case '009':
						$this->log->write("Order_id = $order_id. Payment aborted by shopper.");
						break;
				}
			} else {
				$this->log->write("Order_id = $order_id. MD5 checksum doesn't match.");
			}
		} else {
			$this->log->write('No order found!');
		}
	}

	protected function createMd5($data, $cardtypelock = '') {
		$md5 =	md5($data['quickpay_creditcard_protocol'] . 
		  	   		$data['quickpay_creditcard_msgtype'] . 
			 		$data['quickpay_creditcard_merchant'] . 
		  			$data['quickpay_creditcard_language'] . 
		  			$data['order_id'] . 
		  			$data['amount'] . 
		  			$data['currency'] . 
		  			$data['quickpay_creditcard_continueurl'] . 
		  			$data['quickpay_creditcard_cancelurl'] . 
		  			$data['quickpay_creditcard_callbackurl'] . 
		  			$data['quickpay_creditcard_autocapture'] .
		  			$cardtypelock .
			  		$data['quickpay_creditcard_splitpayment'] . 
			  		$this->config->get('quickpay_creditcard_md5check'));

		return $md5;
	}
}
?>