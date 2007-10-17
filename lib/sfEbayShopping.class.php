<?php
class sfEbayShopping extends BasesfEbay
{
  protected $locations    =   array('production'  => 'https://api.ebay.com/shopping',
                                    'sandbox'     => 'https://api.sandbox.ebay.com/shopping');

	public function __construct($token, $devId, $appId, $certId)
	{
		parent::__construct('http://developer.ebay.com/webservices/latest/ShoppingService.wsdl', $token, $devId, $appId, $certId);
	}
}