<?php
/**
 * sfEbayAuth
 *
 * @package sfEbayPlugin
 * @author Jonathan H. Wage
 */
class sfEbayAuth
{
	protected $_eBayAuthToken,
	          $_Credentials;

  /**
   * __construct
   *
   * @param string $_token 
   * @param string $_appId 
   * @param string $_devId 
   * @param string $_certId 
   * @return void
   */
	public function __construct($_token, $_appId, $_devId, $_certId)
	{
		$credentials = new sfEbayCredentials($_appId, $_devId, $_certId);
		$this->_eBayAuthToken = new SoapVar($_token, XSD_STRING,	null, null, null, 'urn:ebay:apis:eBLBaseComponents');
		$this->_Credentials = new SoapVar($credentials, SOAP_ENC_OBJECT, null, null, null, 'urn:ebay:apis:eBLBaseComponents');
	}
}