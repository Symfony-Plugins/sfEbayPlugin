<?php
class sfEbay extends BasesfEbay
{
  protected $locations    =   array('production'  => 'https://api.ebay.com/wsapi',
                                    'sandbox'     => 'https://api.sandbox.ebay.com/wsapi');

	public function __construct($token, $devId, $appId, $certId)
	{
		parent::__construct('http://developer.ebay.com/webservices/latest/eBaySvc.wsdl', $token, $devId, $appId, $certId);
	}
}