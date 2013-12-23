<?php

namespace Orvyl\Paypal;
use Config;
use \Session;

class Paypal {

	public static function init()
	{
		$clientId = Config::get('paypal::client-id');
		$secret = Config::get('paypal::secret');

		$cmd = exec('curl https://api.sandbox.paypal.com/v1/oauth2/token \
					 -H "Accept: application/json" \
					 -H "Accept-Language: en_US" \
					 -u "'.$clientId.':'.$secret.'" \
					 -d "grant_type=client_credentials"'
				);

		return json_decode($cmd);
	}

	public static function getData($creds = array())
	{
		if($creds['payment_method'] == 'credit')
		{
			return '{
				"intent": "sale",
				"payer": {
					"payment_method": "credit_card",
					"funding_instruments": [
					{
						"credit_card": {
							"number": "'.$creds['cardnumber'].'",
							"type": "'.$creds['cardtype'].'",
							"expire_month": '.$creds['expmonth'].',
							"expire_year": '.$creds['expyear'].',
							"cvv2": '.$creds['cvv'].',
							"first_name": "'.$creds['cardholderfname'].'",
							"last_name": "'.$creds['cardholderlname'].'"
						}
					}
				]},
				"transactions": [
				{
					"amount": {
					"total": "'.$creds['total'].'",
					"currency": "AUD"
				},
				"description": "'.$creds['description'].'"
				}]
			}';
		}
		
		return '{
			  "intent":"sale",
			  "redirect_urls":{
			    "return_url":"'.$creds['return_url'].'",
			    "cancel_url":"'.$creds['cancel_url'].'"
			  },
			  "payer":{
			    "payment_method":"paypal"
			  },
			  "transactions":[
			    {
			      "amount":{
			        "total":"'.$creds['total'].'",
			        "currency":"AUD"
			      },
			      "description":"'.$creds['description'].'"
			    }
			  ]
			}';
	}

	public static function createPayment($creds)
	{
		$paypalCred = self::init();

		$data = self::getData($creds);
		$accessToken = $paypalCred->access_token;

		$cmd = 'curl -v https://api.sandbox.paypal.com/v1/payments/payment \
						-H "Content-Type:application/json" \
						-H "Authorization:Bearer '.$accessToken.'" \
						-d \''.$data.'\'';

		Session::put('authtoken',$accessToken);

		$exec_res = exec($cmd);
		return json_decode($exec_res);
	}

	public static function acceptCreditCard($creds)
	{
		$creds['payment_method'] = 'credit';
		$res = self::createPayment($creds);

		if(isset($res->state) && $res->state == 'pending')
			return array('result'=>true,'data'=>$res);

		return array('result'=>false);
	}

	public static function acceptPaypal($creds)
	{
		$creds['payment_method'] = 'paypal';
		$res = self::createPayment($creds);

		if(isset($res->state) && $res->state == 'created')
		{
			$links = $res->links;
			return array('result'=>true,'approve_link'=>$links[1]->href, 'id'=>$res->id);
		}

		return array('result'=>false);
	}

	public function executePaypalPayment($payer_id, $accessToken)
	{

		$data = '{ "payer_id":"'.$payer_id.'" }';

		$cmd = 'curl -v https://api.sandbox.paypal.com/v1/payments/payment/'.Session::get('paypalPaymentID').'/execute/ \
						-H "Content-Type:application/json" \
						-H "Authorization:Bearer '.Session::get('authtoken').'" \
						-d \''.$data.'\'';

		$res = json_decode(exec($cmd));

		if(isset($res->state) && $res->state == 'pending')
			return array('result'=>true,'data'=>$res);

		return array('result'=>false);

	}
	
}

/*
| https://developer.paypal.com/webapps/developer/docs/api/#payments
*/