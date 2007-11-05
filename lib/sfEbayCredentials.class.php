<?php
/**
 * sfEbay
 *
 * @package sfEbayPlugin
 * @author Jonathan H. Wage
 */
class sfEbayCredentials
{
	protected $_AppId,
	          $_DevId,
	          $_AuthCert;

  /**
   * __construct
   *
   * @param string $_appId 
   * @param string $_devId 
   * @param string $_certId 
   * @return void
   */
	public function __construct($_appId, $_devId, $_certId)
	{
		$this->_AppId = new SoapVar($_appId, XSD_STRING, null, null, null, 'urn:ebay:apis:eBLBaseComponents');
		$this->_DevId = new SoapVar($_devId, XSD_STRING, null, null, null, 'urn:ebay:apis:eBLBaseComponents');
		$this->_AuthCert = new SOAPVar($_certId, XSD_STRING, null, null, null, 'urn:ebay:apis:eBLBaseComponents');
	}
}