<?php 
class ControllerPaymentQuickPayCreditcard extends Controller {
	private $error = array(); 

	public function index() {
		$this->language->load('payment/quickpay_creditcard');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
			
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('quickpay_creditcard', $this->request->post);				
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');	

		$data['text_edit'] = $this->language->get('text_edit');

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_authorization'] = $this->language->get('text_authorization');
		$data['text_sale'] = $this->language->get('text_sale');
		
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_protocol'] = $this->language->get('entry_protocol');
		$data['entry_msgtype'] = $this->language->get('entry_msgtype');
		$data['entry_merchant'] = $this->language->get('entry_merchant');
		$data['entry_language'] = $this->language->get('entry_language');
		$data['entry_md5check'] = $this->language->get('entry_md5check');
		$data['entry_autocapture'] = $this->language->get('entry_autocapture');
		$data['entry_splitpayment'] = $this->language->get('entry_splitpayment');
		$data['entry_order_status_completed'] = $this->language->get('entry_order_status_completed');

		// Tooltips
		$data['tooltip_status'] = $this->language->get('tooltip_status');
		$data['tooltip_merchant'] = $this->language->get('tooltip_merchant');
		$data['tooltip_language'] = $this->language->get('tooltip_language');
		$data['tooltip_md5check'] = $this->language->get('tooltip_md5check');
		$data['tooltip_protocol'] = $this->language->get('tooltip_protocol');
		$data['tooltip_msgtype'] = $this->language->get('tooltip_msgtype');
		$data['tooltip_autocapture'] = $this->language->get('tooltip_autocapture');
		$data['tooltip_cardtypelock'] = $this->language->get('tooltip_cardtypelock');
		$data['tooltip_splitpayment'] = $this->language->get('tooltip_splitpayment');
		$data['tooltip_order_status_completed'] = $this->language->get('tooltip_order_status_completed');
		$data['tooltip_status'] = $this->language->get('tooltip_status');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		
		
 		$errors = array('warning', 'protocol', 'msgtype', 'merchant', 'language', 'md5check');
		foreach ($errors as $error) {
			if (isset($this->error[$error])) {
				$data['error_' . $error] = $this->error[$error];
			} else {
				$data['error_' . $error] = '';
			}
		}
		
		
		$data['breadcrumbs'] = array();
		
   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);
		
   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_payment'),
			'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),      		
      		'separator' => ' :: '
   		);
		
   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('payment/quickpay', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$data['action'] = $this->url->link('payment/quickpay_creditcard', 'token=' . $this->session->data['token'], 'SSL');
		
		$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');
		
		
		
		$fields = array('quickpay_creditcard_status', 
						'quickpay_creditcard_protocol', 
						'quickpay_creditcard_merchant', 
						'quickpay_creditcard_language', 
						'quickpay_creditcard_secret', 
						'quickpay_creditcard_msgtype', 
						'quickpay_creditcard_order_status_completed', 
						'quickpay_creditcard_autocapture', 
						'quickpay_creditcard_splitpayment', 
						'quickpay_creditcard_md5check');

		foreach ($fields as $field) {
			if (isset($this->request->post[$field])) {
				$data[$field] = $this->request->post[$field];
			} else {
				$data[$field] = $this->config->get($field);
			}
		}

		if (!isset($data['quickpay_creditcard_status'])) $data['quickpay_creditcard_status'] = "0";
		if (!isset($data['quickpay_creditcard_protocol'])) $data['quickpay_creditcard_protocol'] = "7";
		if (!isset($data['quickpay_creditcard_language'])) $data['quickpay_creditcard_language'] = "da";
		if (!isset($data['quickpay_creditcard_msgtype'])) $data['quickpay_creditcard_msgtype'] = "authorize";
		if (!isset($data['quickpay_creditcard_order_status_completed'])) $data['quickpay_order_status_completed'] = "5";
		if (!isset($data['quickpay_creditcard_autocapture'])) $data['quickpay_creditcard_autocapture'] = "0";
		if (!isset($data['quickpay_creditcard_splitpayment'])) $data['quickpay_creditcard_splitpayment'] = "1";

		$data['languages'] = array('da' => 'Danish', 'de' => 'German', 'en' => 'English', 'fo' => 'Faeroese', 'fr' => 'French', 'kl' => ' Greenlandish', 'it' => 'Italian', 'no' => 'Norwegian', 'nl' => 'Dutch', 'pl' => 'Polish', 'ru' => 'Russian', 'sv' => 'Swedish');

		$this->load->model('localisation/order_status');
		
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('payment/quickpay_creditcard.tpl', $data));
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/quickpay_creditcard')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		$errors = array('protocol', 'msgtype', 'merchant', 'md5check');
		foreach ($errors as $error) {
			if (!$this->request->post['quickpay_creditcard_' . $error]) {
				$this->error[$error] = $this->language->get('error_' . $error);
			}
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
}
?>