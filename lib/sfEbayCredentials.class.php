<?php
class sfEbayCredentials
{
	private $AppId;
	private $DevId;
	private $AuthCert;

	public function __construct($appId, $devId, $certId)
	{
		$this->AppId = new SoapVar($appId, XSD_STRING, null, null, null, 'urn:ebay:apis:eBLBaseComponents');
		$this->DevId = new SoapVar($devId, XSD_STRING, null, null, null, 'urn:ebay:apis:eBLBaseComponents');
		$this->AuthCert = new SOAPVar($certId, XSD_STRING, null, null, null, 'urn:ebay:apis:eBLBaseComponents');
	}
}