<?php
class ControllerLightcheckoutPaymentMethod extends Controller {
	public function index() {
		
		$this->load->language('lightcheckout/checkout');
		
		$language_get = array('text_comments', 'text_payment_method','text_none');
		foreach ($language_get as $get){
			$data[$get] = $this->language->get($get);
		}
		
		$config_version = substr(VERSION, 0, 3);
		
		$data['language_id'] = (int)$this->config->get('config_language_id');
		
		$this->load->model('extension/module/lightcheckout');
		$settings = $this->model_extension_module_lightcheckout->getBaseSettings();
		$data['fields'] = $this->model_extension_module_lightcheckout->getBaseFields('checked_payment_method', 'payment_method');
		
		if (isset($this->request->post['zone_id'])) {
			$this->session->data['payment_address']['zone_id'] = $this->request->post['zone_id'];
		} elseif (!isset($this->session->data['payment_address']['zone_id']) or !$this->session->data['payment_address']['zone_id']) {
			if (isset($this->session->data['shipping_address']['zone_id']) and !$this->session->data['shipping_address']['zone_id']) {
				$this->session->data['payment_address']['zone_id'] = $this->session->data['shipping_address']['zone_id'];
			} else {
				if (isset($settings['zone_id']) and $settings['zone_id']) {
					$this->session->data['payment_address']['zone_id'] = $settings['zone_id'];
				} else {
					$this->session->data['payment_address']['zone_id'] = $this->config->get('config_zone_id');
				}
			}
		}
		if (isset($this->request->post['country_id'])) {
			$this->session->data['payment_address']['country_id'] = $this->request->post['country_id'];
		} elseif (!isset($this->session->data['payment_address']['country_id']) or !$this->session->data['payment_address']['country_id']) {
			if (isset($this->session->data['shipping_address']['country_id']) and !$this->session->data['shipping_address']['country_id']) {
				$this->session->data['payment_address']['country_id'] = $this->session->data['shipping_address']['country_id'];
			} else {				
				if (isset($settings['country_id']) and $settings['country_id']) {
					$this->session->data['payment_address']['country_id']  = $settings['country_id'];
				} else {
					$this->session->data['payment_address']['country_id']  = $this->config->get('config_country_id');
				}
			}
		}

		if (isset($this->session->data['payment_address'])) {
			$this->session->data['payment_methods'] = $this->PaymentMethods($this->session->data['payment_address']);
		}

		if (empty($this->session->data['payment_methods'])) {
			$data['error_warning'] = sprintf($this->language->get('error_no_payment'), $this->url->link('information/contact'));
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['payment_methods'])) {
			$data['payment_methods'] = $this->session->data['payment_methods'];
		} else {
			$data['payment_methods'] = array();
		}

		if (isset($this->session->data['payment_method']['code'])) {
			$data['code'] = $this->session->data['payment_method']['code'];
		} else {
			$data['code'] = '';
		}

		if (isset($this->session->data['comment'])) {
			$data['comment'] = $this->session->data['comment'];
		} else {
			$data['comment'] = '';
		}

		$data['scripts'] = $this->document->getScripts();

		if ($this->config->get('config_checkout_id') and isset($data['fields']['payment_agree']) and $data['fields']['payment_agree']['show']) {
			$this->load->model('catalog/information');

			$information_info = $this->model_catalog_information->getInformation($this->config->get('config_checkout_id'));

			if ($information_info) {
				$data['text_agree'] = sprintf($this->language->get('text_agree'), $this->url->link('information/information/agree', 'information_id=' . $this->config->get('config_checkout_id'), true), $information_info['title'], $information_info['title']);
			} else {
				$data['text_agree'] = '';
			}
		} else {
			$data['text_agree'] = '';
		}

		if (isset($this->session->data['agree'])) {
			$data['agree'] = $this->session->data['agree'];
		} else {
			$data['agree'] = '';
		}		

		$this->response->setOutput($this->load->view('lightcheckout/payment_method', $data));
	}
	
	public function PaymentMethods($payment_address) {
		// Payment Methods
		
		$config_version = substr(VERSION, 0, 3);
		
		// Totals
		$totals = array();
		$taxes = $this->cart->getTaxes();
		$total = 0;

		// Because __call can not keep var references so we put them into an array.
		$total_data = array(
			'totals' => &$totals,
			'taxes'  => &$taxes,
			'total'  => &$total
		);
		
		$sort_order = array();
		
		if ($config_version == '3.0' or $config_version == '3.1'){
			$this->load->model('setting/extension');
			$results = $this->model_setting_extension->getExtensions('total');
			$total_ = 'total_';
		} else {
			$this->load->model('extension/extension');
			$results = $this->model_extension_extension->getExtensions('total');
			$total_ = '';
		}

		foreach ($results as $key => $value) {
			$sort_order[$key] = $this->config->get($total_ . $value['code'] . '_sort_order');
		}

		array_multisort($sort_order, SORT_ASC, $results);

		foreach ($results as $result) {
			if ($this->config->get($total_ . $result['code'] . '_status')) {
				$this->load->model('extension/total/' . $result['code']);
				
				// We have to put the totals in an array so that they pass by reference.
				$this->{'model_extension_total_' . $result['code']}->getTotal($total_data);
			}
		}
		
		$method_data = array();
		
		if ($config_version == '3.0' or $config_version == '3.1'){
			$results = $this->model_setting_extension->getExtensions('payment');
			$payment_ = 'payment_';
		} else {
			$results = $this->model_extension_extension->getExtensions('payment');
			$payment_ = '';
		}
		
		$recurring = $this->cart->hasRecurringProducts();

		foreach ($results as $result) {
			if ($this->config->get($payment_ . $result['code'] . '_status')) {
				$this->load->model('extension/payment/' . $result['code']);

				$method = $this->{'model_extension_payment_' . $result['code']}->getMethod($payment_address, $total);

				if ($method) {
					if ($recurring) {
						if (property_exists($this->{'model_extension_payment_' . $result['code']}, 'recurringPayments') && $this->{'model_extension_payment_' . $result['code']}->recurringPayments()) {
							$method_data[$result['code']] = $method;
						}
					} else {
						$method_data[$result['code']] = $method;
					}
				}
			}
		}

		$sort_order = array();

		foreach ($method_data as $key => $value) {
			$sort_order[$key] = $value['sort_order'];
		}

		array_multisort($sort_order, SORT_ASC, $method_data);

		return $method_data;
	}

	public function save() {
		
		$this->load->language('lightcheckout/checkout');

		$json = array();

		// Validate if payment address has been set.
		/*if (!isset($this->session->data['payment_address'])) {
			$json['redirect'] = $this->url->link('lightcheckout/checkout', '', true);
		}

		// Validate cart has products and has stock.
		if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers'])) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
			$json['redirect'] = $this->url->link('checkout/cart');
		}*/

		// Validate minimum quantity requirements.
		$products = $this->cart->getProducts();

		foreach ($products as $product) {
			$product_total = 0;

			foreach ($products as $product_2) {
				if ($product_2['product_id'] == $product['product_id']) {
					$product_total += $product_2['quantity'];
				}
			}

			/*if ($product['minimum'] > $product_total) {
				$json['redirect'] = $this->url->link('checkout/cart');

				break;
			}*/
		}
		
		$this->load->model('extension/module/lightcheckout');
		$status = $this->model_extension_module_lightcheckout->getBaseStatus();
		$settings = $this->model_extension_module_lightcheckout->getBaseSettings();
		$fields = $this->model_extension_module_lightcheckout->getBaseFields('checked_payment_method', 'payment_method');
		
		if ($this->customer->isLogged()) {
			if (!isset($this->session->data['payment_address'])){
				if (isset($this->session->data['shipping_address']['country_id'])) {
					$this->session->data['payment_address']['country_id'] = $this->session->data['shipping_address']['country_id'];
				} else {
					if (isset($settings['country_id']) and $settings['country_id']) {
						$this->session->data['payment_address']['country_id'] = $settings['country_id'];
					} else {
						$this->session->data['payment_address']['country_id'] = $this->config->get('config_country_id');
					}
				}
				if (isset($this->session->data['shipping_address']['zone_id'])) {
					$this->session->data['payment_address']['zone_id'] = $this->session->data['shipping_address']['zone_id'];
				} else {
					if (isset($settings['zone_id']) and $settings['zone_id']) {
						$this->session->data['payment_address']['zone_id'] = $settings['zone_id'];
					} else {
						$this->session->data['payment_address']['zone_id'] = $this->config->get('config_zone_id');
					}
				}
			}
		}
		
		if (isset($this->session->data['payment_address'])) {
			$this->session->data['payment_methods'] = $this->PaymentMethods($this->session->data['payment_address']);
		}
		
		if (isset($status['payment_method']) and !isset($this->session->data['payment_address']) and isset($this->session->data['shipping_address'])){
			$this->session->data['payment_methods'] = $this->PaymentMethods($this->session->data['shipping_address']);
		}
		
		/*print_r($this->session->data['payment_address']);
		print_r($this->session->data['shipping_address']);
		print_r($this->session->data['payment_methods']);*/
		
		if (!isset($this->request->post['payment_method'])) {
			$json['error']['warning'] = $this->language->get('error_payment');
		} elseif (!isset($this->session->data['payment_methods'][$this->request->post['payment_method']])) {
			$json['error']['warning'] = $this->language->get('error_payment');
		}

		if ($this->config->get('config_checkout_id') and $fields['payment_agree']['show'] and $fields['payment_agree']['required']) {
			$this->load->model('catalog/information');

			$information_info = $this->model_catalog_information->getInformation($this->config->get('config_checkout_id'));

			if ($information_info && !isset($this->request->post['payment_agree'])) {
				$json['error']['warning'] = sprintf($this->language->get('error_agree'), $information_info['title']);
			}
		}
		
		if (isset($this->request->post['comment']) and $fields['payment_comment']['required'] and $fields['payment_comment']['show']) {
			if ((utf8_strlen(trim($this->request->post['comment'])) < 2) || (utf8_strlen(trim($this->request->post['comment'])) > 128)) {
				$json['error']['comment'] = $this->language->get('error_comment');
			}
		}
		
		if (isset($this->request->get['updatecart'])) {
			unset($json['error']);
		}

		if (!$json) {
			$this->session->data['payment_method'] = $this->session->data['payment_methods'][$this->request->post['payment_method']];

			if (isset($this->request->post['comment'])){$this->session->data['comment'] = strip_tags($this->request->post['comment']);}
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function accountaddress(){
		$json = array();
		
		if (isset($this->request->post['address_id'])) {
			$this->load->model('account/address');
			$this->session->data['payment_address'] = $this->model_account_address->getAddress($this->request->post['address_id']);
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
