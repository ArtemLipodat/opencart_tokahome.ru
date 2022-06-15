<?php
class ControllerLightcheckoutGuest extends Controller {
	public function index() {
		$this->load->language('lightcheckout/checkout');
		
		$language_get = array('entry_customer_group','entry_firstname','entry_lastname','entry_email','entry_telephone','entry_company','entry_address_1','entry_address_2','entry_city','entry_postcode','entry_country','entry_zone','text_none');
		foreach ($language_get as $get){
			$data[$get] = $this->language->get($get);
		}
		
		$data['language_id'] = (int)$this->config->get('config_language_id');
		
		$data['customer_groups'] = array();

		if (is_array($this->config->get('config_customer_group_display'))) {
			$this->load->model('account/customer_group');

			$customer_groups = $this->model_account_customer_group->getCustomerGroups();

			foreach ($customer_groups as $customer_group) {
				if (in_array($customer_group['customer_group_id'], $this->config->get('config_customer_group_display'))) {
					$data['customer_groups'][] = $customer_group;
				}
			}
		}
		
		$this->load->model('extension/module/lightcheckout');
		$data['status'] = $this->model_extension_module_lightcheckout->getBaseStatus();
		
		$data['fields'] = $this->model_extension_module_lightcheckout->getBaseFields('checked_alogin');
		
		$settings = $this->model_extension_module_lightcheckout->getBaseSettings();

		if (isset($this->session->data['guest']['customer_group_id'])) {
			$data['customer_group_id'] = $this->session->data['guest']['customer_group_id'];
		} else {
			$data['customer_group_id'] = $this->config->get('config_customer_group_id');
		}

		if (isset($this->session->data['guest']['firstname'])) {
			$data['firstname'] = $this->session->data['guest']['firstname'];
		} else {
			$data['firstname'] = '';
		}

		if (isset($this->session->data['guest']['lastname'])) {
			$data['lastname'] = $this->session->data['guest']['lastname'];
		} else {
			$data['lastname'] = '';
		}

		if (isset($this->session->data['guest']['email'])) {
			$data['email'] = $this->session->data['guest']['email'];
		} else {
			$data['email'] = '';
		}

		if (isset($this->session->data['guest']['telephone'])) {
			$data['telephone'] = $this->session->data['guest']['telephone'];
		} else {
			$data['telephone'] = '';
		}

		if (isset($this->session->data['payment_address']['company'])) {
			$data['company'] = $this->session->data['payment_address']['company'];
		} else {
			$data['company'] = '';
		}

		if (isset($this->session->data['payment_address']['address_1'])) {
			$data['address_1'] = $this->session->data['payment_address']['address_1'];
		} else {
			$data['address_1'] = '';
		}

		if (isset($this->session->data['payment_address']['address_2'])) {
			$data['address_2'] = $this->session->data['payment_address']['address_2'];
		} else {
			$data['address_2'] = '';
		}

		if (isset($this->session->data['payment_address']['postcode'])) {
			$data['postcode'] = $this->session->data['payment_address']['postcode'];
		} elseif (isset($this->session->data['shipping_address']['postcode'])) {
			$data['postcode'] = $this->session->data['shipping_address']['postcode'];
		} else {
			$data['postcode'] = '';
		}

		if (isset($this->session->data['payment_address']['city'])) {
			$data['city'] = $this->session->data['payment_address']['city'];
		} else {
			$data['city'] = '';
		}

		if (isset($this->session->data['payment_address']['country_id'])) {
			$data['country_id'] = $this->session->data['payment_address']['country_id'];
		} elseif (isset($this->session->data['shipping_address']['country_id'])) {
			$data['country_id'] = $this->session->data['shipping_address']['country_id'];
		} else {
			if (isset($settings['country_id']) and $settings['country_id']) {
				$data['country_id'] = $settings['country_id'];
			} else {
				$data['country_id'] = $this->config->get('config_country_id');
			}
		}

		if (isset($this->session->data['payment_address']['zone_id'])) {
			$data['zone_id'] = $this->session->data['payment_address']['zone_id'];
		} elseif (isset($this->session->data['shipping_address']['zone_id'])) {
			$data['zone_id'] = $this->session->data['shipping_address']['zone_id'];
		} else {
			if (isset($settings['zone_id']) and $settings['zone_id']) {
				$data['zone_id'] = $settings['zone_id'];
			} else {
				$data['zone_id'] = $this->config->get('config_zone_id');
			}
		}

		$this->load->model('localisation/country');

		$data['countries'] = $this->model_localisation_country->getCountries();

		// Custom Fields
		$this->load->model('account/custom_field');

		$data['custom_fields'] = $this->model_account_custom_field->getCustomFields();

		if (isset($this->session->data['guest']['custom_field'])) {
			if (isset($this->session->data['guest']['custom_field'])) {
				$guest_custom_field = $this->session->data['guest']['custom_field'];
			} else {
				$guest_custom_field = array();
			}

			if (isset($this->session->data['payment_address']['custom_field'])) {
				$address_custom_field = $this->session->data['payment_address']['custom_field'];
			} else {
				$address_custom_field = array();
			}

			$data['guest_custom_field'] = $guest_custom_field + $address_custom_field;
		} else {
			$data['guest_custom_field'] = array();
		}

		$data['shipping_required'] = $this->cart->hasShipping();

		if (isset($this->session->data['guest']['shipping_address'])) {
			$data['shipping_address'] = $this->session->data['guest']['shipping_address'];
		} else {
			$data['shipping_address'] = true;
		}

		// Captcha
		if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('guest', (array)$this->config->get('config_captcha_page'))) {
			$data['captcha'] = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha'));
		} else {
			$data['captcha'] = '';
		}
		
		
		
		$this->load->model('localisation/zone');
		$data['zones'] = $this->model_localisation_zone->getZonesByCountryId($data['country_id']);
		
		$this->response->setOutput($this->load->view('lightcheckout/guest', $data));
	}

	public function save() {
		$this->load->language('lightcheckout/checkout');

		$json = array();

		// Validate if customer is logged in.
		if ($this->customer->isLogged()) {
			$json['redirect'] = $this->url->link('lightcheckout/checkout', '', true);
		}

		// Validate cart has products and has stock.
		if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers'])) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
			$json['redirect'] = $this->url->link('checkout/cart');
		}

		// Check if guest checkout is available.
		if (!$this->config->get('config_checkout_guest') || $this->config->get('config_customer_price') || $this->cart->hasDownload()) {
			$json['redirect'] = $this->url->link('lightcheckout/checkout', '', true);
		}
		
		if (!$json) {
			
			$this->load->model('extension/module/lightcheckout');
			$fields = $this->model_extension_module_lightcheckout->getBaseFields('checked_alogin', 'guest');
			
			
			if (isset($this->request->post['firstname']) and $fields['guest_firstname']['required'] and $fields['guest_firstname']['show']) {
				if ((utf8_strlen(trim($this->request->post['firstname'])) < 1) || (utf8_strlen(trim($this->request->post['firstname'])) > 32)) {
					$json['error']['firstname'] = $this->language->get('error_firstname');
				}
			}
			if (isset($this->request->post['lastname']) and $fields['guest_lastname']['required'] and $fields['guest_lastname']['show']) {
				if ((utf8_strlen(trim($this->request->post['lastname'])) < 1) || (utf8_strlen(trim($this->request->post['lastname'])) > 32)) {
					$json['error']['lastname'] = $this->language->get('error_lastname');
				}
			}
			if (isset($this->request->post['email']) and $fields['guest_email']['required'] and $fields['guest_email']['show']) {
				if ((utf8_strlen($this->request->post['email']) > 96) || !filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL)) {
					$json['error']['email'] = $this->language->get('error_email');
				}
			}
			if (isset($this->request->post['telephone']) and $fields['guest_phone']['required'] and $fields['guest_phone']['show']) {
				if ((utf8_strlen($this->request->post['telephone']) < 3) || (utf8_strlen($this->request->post['telephone']) > 32)) {
					$json['error']['telephone'] = $this->language->get('error_telephone');
				}
			}
			if (isset($this->request->post['company']) and $fields['guest_company']['required'] and $fields['guest_company']['show']) {
				if ((utf8_strlen(trim($this->request->post['company'])) < 2) || (utf8_strlen(trim($this->request->post['company'])) > 128)) {
					$json['error']['company'] = $this->language->get('error_company');
				}
			}
			if (isset($this->request->post['address_1']) and $fields['guest_address_1']['required'] and $fields['guest_address_1']['show']) {
				if ((utf8_strlen(trim($this->request->post['address_1'])) < 3) || (utf8_strlen(trim($this->request->post['address_1'])) > 128)) {
					$json['error']['address_1'] = $this->language->get('error_address_1');
				}
			}
			if (isset($this->request->post['address_2']) and $fields['guest_address_2']['required'] and $fields['guest_address_2']['show']) {
				if ((utf8_strlen(trim($this->request->post['address_2'])) < 3) || (utf8_strlen(trim($this->request->post['address_2'])) > 128)) {
					$json['error']['address_2'] = $this->language->get('error_address_1');
				}
			}
			if (isset($this->request->post['city']) and $fields['guest_city']['required'] and $fields['guest_city']['show']) {
				if ((utf8_strlen(trim($this->request->post['city'])) < 2) || (utf8_strlen(trim($this->request->post['city'])) > 128)) {
					$json['error']['city'] = $this->language->get('error_city');
				}
			}
			if (isset($this->request->post['light_country_id'])) {
				$this->load->model('localisation/country');
				$country_info = $this->model_localisation_country->getCountry($this->request->post['light_country_id']);
				if ((($country_info && $country_info['postcode_required']) or ($fields['guest_postcode']['required'] and $fields['guest_postcode']['show'])) && (utf8_strlen(trim($this->request->post['postcode'])) < 2 || utf8_strlen(trim($this->request->post['postcode'])) > 10)) {
					$json['error']['postcode'] = $this->language->get('error_postcode');
				}
				if (isset($this->request->post['light_country_id']) and $fields['guest_country_id']['required'] and $fields['guest_country_id']['show']) {
					if ($this->request->post['light_country_id'] == '') {
						$json['error']['country'] = $this->language->get('error_country');
					}
				}
			}
			if (isset($this->request->post['guest_zone_id']) and $fields['guest_zone_id']['required'] and $fields['guest_zone_id']['show']) {
				if (!isset($this->request->post['light_zone_id']) || $this->request->post['light_zone_id'] == '' || !is_numeric($this->request->post['light_zone_id'])) {
					$json['error']['zone'] = $this->language->get('error_zone');
				}
			}
			
			// Customer Group
			if (isset($this->request->post['customer_group_id']) && is_array($this->config->get('config_customer_group_display')) && in_array($this->request->post['customer_group_id'], $this->config->get('config_customer_group_display'))) {
				$customer_group_id = $this->request->post['customer_group_id'];
			} else {
				$customer_group_id = $this->config->get('config_customer_group_id');
			}
			
			if (isset($this->request->post['custom_field'])) {
				// Custom field validation
				$this->load->model('account/custom_field');

				$custom_fields = $this->model_account_custom_field->getCustomFields($customer_group_id);

				foreach ($custom_fields as $custom_field) {
					if ($custom_field['required'] && empty($this->request->post['custom_field'][$custom_field['location']][$custom_field['custom_field_id']])) {
						$json['error']['custom_field' . $custom_field['custom_field_id']] = sprintf($this->language->get('error_custom_field'), $custom_field['name']);
					} elseif (($custom_field['type'] == 'text') && !empty($custom_field['validation']) && !filter_var($this->request->post['custom_field'][$custom_field['location']][$custom_field['custom_field_id']], FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => $custom_field['validation'])))) {
						$json['error']['custom_field' . $custom_field['custom_field_id']] = sprintf($this->language->get('error_custom_field'), $custom_field['name']);
					}
				}
			}

			// Captcha
			if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('guest', (array)$this->config->get('config_captcha_page'))) {
				$captcha = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha') . '/validate');

				if ($captcha) {
					$json['error']['captcha'] = $captcha;
				}
			}
		}

		if (!$json) {
			$this->session->data['account'] = 'guest';

			$this->session->data['guest']['customer_group_id'] = $customer_group_id;
			if (isset($this->request->post['firstname'])){$this->session->data['guest']['firstname'] = $this->request->post['firstname'];}
			if (isset($this->request->post['lastname'])){$this->session->data['guest']['lastname'] = $this->request->post['lastname'];}
			if (isset($this->request->post['email'])){$this->session->data['guest']['email'] = $this->request->post['email'];}
			if (isset($this->request->post['telephone'])){$this->session->data['guest']['telephone'] = $this->request->post['telephone'];}

			if (isset($this->request->post['custom_field']['account'])) {
				$this->session->data['guest']['custom_field'] = $this->request->post['custom_field']['account'];
			} else {
				$this->session->data['guest']['custom_field'] = array();
			}

			if (isset($this->request->post['firstname'])){$this->session->data['payment_address']['firstname'] = $this->request->post['firstname'];}
			if (isset($this->request->post['lastname'])){$this->session->data['payment_address']['lastname'] = $this->request->post['lastname'];}
			if (isset($this->request->post['company'])){$this->session->data['payment_address']['company'] = $this->request->post['company'];}
			if (isset($this->request->post['address_1'])){$this->session->data['payment_address']['address_1'] = $this->request->post['address_1'];}
			if (isset($this->request->post['address_2'])){$this->session->data['payment_address']['address_2'] = $this->request->post['address_2'];}
			if (isset($this->request->post['postcode'])){$this->session->data['payment_address']['postcode'] = $this->request->post['postcode'];}
			if (isset($this->request->post['city'])){$this->session->data['payment_address']['city'] = $this->request->post['city'];}
			if (isset($this->request->post['light_country_id'])){$this->session->data['payment_address']['country_id'] = $this->request->post['light_country_id'];}
			if (isset($this->request->post['light_zone_id'])){$this->session->data['payment_address']['zone_id'] = $this->request->post['light_zone_id'];}

			$this->load->model('localisation/country');
			
			if (isset($this->request->post['light_country_id'])) {
				$country_info = $this->model_localisation_country->getCountry($this->request->post['light_country_id']);
			} else {
				$country_info = false;
			}
			
			if ($country_info) {
				$this->session->data['payment_address']['country'] = $country_info['name'];
				$this->session->data['payment_address']['iso_code_2'] = $country_info['iso_code_2'];
				$this->session->data['payment_address']['iso_code_3'] = $country_info['iso_code_3'];
				$this->session->data['payment_address']['address_format'] = $country_info['address_format'];
			} else {
				$this->session->data['payment_address']['country'] = '';
				$this->session->data['payment_address']['iso_code_2'] = '';
				$this->session->data['payment_address']['iso_code_3'] = '';
				$this->session->data['payment_address']['address_format'] = '';
			}

			if (isset($this->request->post['custom_field']['address'])) {
				$this->session->data['payment_address']['custom_field'] = $this->request->post['custom_field']['address'];
			} else {
				$this->session->data['payment_address']['custom_field'] = array();
			}

			$this->load->model('localisation/zone');
			
			if (isset($this->request->post['light_zone_id'])) {
				$zone_info = $this->model_localisation_zone->getZone($this->request->post['light_zone_id']);
			} else {
				$zone_info = false;
			}
			
			if ($zone_info) {
				$this->session->data['payment_address']['zone'] = $zone_info['name'];
				$this->session->data['payment_address']['zone_code'] = $zone_info['code'];
			} else {
				$this->session->data['payment_address']['zone'] = '';
				$this->session->data['payment_address']['zone_code'] = '';
			}
			
			

			if (!empty($this->request->post['shipping_address'])) {
				$this->session->data['guest']['shipping_address'] = $this->request->post['shipping_address'];
			} else {
				$this->session->data['guest']['shipping_address'] = false;
			}
			
			

			if ($this->session->data['guest']['shipping_address']) {
				
				$settings = $this->model_extension_module_lightcheckout->getBaseSettings();
				
				if (isset($settings['country_id']) and $settings['country_id'] and (!isset($this->session->data['shipping_address']['country_id']) or !$this->session->data['shipping_address']['country_id'])) {
					$this->session->data['shipping_address']['country_id'] = $settings['country_id'];
				} else {
					$this->session->data['shipping_address']['country_id'] = $this->config->get('config_country_id');
				}
				if (isset($settings['zone_id']) and $settings['zone_id'] and (!isset($this->session->data['shipping_address']['zone_id']) or !$this->session->data['shipping_address']['zone_id'])) {
					$this->session->data['shipping_address']['zone_id'] = $settings['zone_id'];
				} else {
					$this->session->data['shipping_address']['zone_id'] = $this->config->get('config_zone_id');
				}
				
				if (isset($this->request->post['firstname'])){$this->session->data['shipping_address']['firstname'] = $this->request->post['firstname'];}
				if (isset($this->request->post['lastname'])){$this->session->data['shipping_address']['lastname'] = $this->request->post['lastname'];}
				if (isset($this->request->post['company'])){$this->session->data['shipping_address']['company'] = $this->request->post['company'];}
				if (isset($this->request->post['address_1'])){$this->session->data['shipping_address']['address_1'] = $this->request->post['address_1'];}
				if (isset($this->request->post['address_2'])){$this->session->data['shipping_address']['address_2'] = $this->request->post['address_2'];}
				if (isset($this->request->post['postcode'])){$this->session->data['shipping_address']['postcode'] = $this->request->post['postcode'];}
				if (isset($this->request->post['city'])){$this->session->data['shipping_address']['city'] = $this->request->post['city'];}
				if (isset($this->request->post['light_country_id'])){$this->session->data['shipping_address']['country_id'] = $this->request->post['light_country_id'];}
				if (isset($this->request->post['light_zone_id'])){$this->session->data['shipping_address']['zone_id'] = $this->request->post['light_zone_id'];}

				if ($country_info) {
					$this->session->data['shipping_address']['country'] = $country_info['name'];
					$this->session->data['shipping_address']['iso_code_2'] = $country_info['iso_code_2'];
					$this->session->data['shipping_address']['iso_code_3'] = $country_info['iso_code_3'];
					$this->session->data['shipping_address']['address_format'] = $country_info['address_format'];
				} else {
					$this->session->data['shipping_address']['country'] = '';
					$this->session->data['shipping_address']['iso_code_2'] = '';
					$this->session->data['shipping_address']['iso_code_3'] = '';
					$this->session->data['shipping_address']['address_format'] = '';
				}

				if ($zone_info) {
					$this->session->data['shipping_address']['zone'] = $zone_info['name'];
					$this->session->data['shipping_address']['zone_code'] = $zone_info['code'];
				} else {
					$this->session->data['shipping_address']['zone'] = '';
					$this->session->data['shipping_address']['zone_code'] = '';
				}

				if (isset($this->request->post['custom_field']['address'])) {
					$this->session->data['shipping_address']['custom_field'] = $this->request->post['custom_field']['address'];
				} else {
					$this->session->data['shipping_address']['custom_field'] = array();
				}
			}
			
			$this->load->model('extension/module/lightcheckout');
			$status = $this->model_extension_module_lightcheckout->getBaseStatus();
			
			if (!isset($status['shipping_method'])) {
				unset($this->session->data['shipping_address']);
			}
			
		}
		
		if (!isset($this->request->post['shipping_address'])) {
			$json['no_shipping_address'] = true;
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
