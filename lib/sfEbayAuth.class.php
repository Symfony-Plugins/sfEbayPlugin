<?php
class sfEbayAuth
{
	private $eBayAuthToken;
	private $Credentials;

	public function __construct($token, $appId, $devId, $certId)
	{
		$credentials = new sfEbayCredentials($appId, $devId, $certId);
		$this->eBayAuthToken = new SoapVar($token, XSD_STRING,	null, null, null, 'urn:ebay:apis:eBLBaseComponents');
		$this->Credentials = new SoapVar($credentials, SOAP_ENC_OBJECT, null, null, null, 'urn:ebay:apis:eBLBaseComponents');
	}
}