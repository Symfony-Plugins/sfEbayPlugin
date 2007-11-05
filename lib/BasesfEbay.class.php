<?php
/**
 * sfEbay
 *
 * @package sfEbayPlugin
 * @author Jonathan H. Wage
 */
class BasesfEbay extends SoapClient
{
  protected $_wsdl         =   null,
	          $_token        =   null,
	          $_devId        =   null,
	          $_appId        =   null,
	          $_certId       =   null,
	          $_environment  =   'production',
            $_locations     =   array('production'  => null,
                                      'sandbox'     => null);
  
  /**
   * __construct
   *
   * @param string $_wsdl 
   * @param string $_token 
   * @param string $_devId 
   * @param string $_appId 
   * @param string $_certId 
   * @return void
   */
	public function __construct($_wsdl, $_token, $_devId, $_appId, $_certId)
	{	
		$this->_wsdl = $_wsdl;
		$this->_token = $_token;
		$this->_devId = $_devId;
		$this->_appId = $_appId;
		$this->_certId = $_certId;
		
		parent::__construct($this->_wsdl, array('trace' => 1));
	}

  /**
   * getEnvironment
   *
   * @return void
   */
	public function getEnvironment()
	{
	  return $this->_environment;
	}

  /**
   * setEnvironment
   *
   * @param string $environment 
   * @return void
   */
	public function setEnvironment($environment)
	{
	  $this->_environment = $environment;
	}

  /**
   * getLocation
   *
   * @return void
   */
	public function getLocation()
	{
	  return $this->_locations[$this->_environment];
	}

  /**
   * __call
   *
   * @param string $function 
   * @param string $params 
   * @return void
   */
 	public function __call($function, $params)
 	{
 	  $eBayAuth = new sfEbayAuth($this->_token, $this->_appId, $this->_devId, $this->_certId);
		$headerBody = new SoapVar($eBayAuth, SOAP_ENC_OBJECT);
		$headers = array(new SoapHeader('urn:ebay:apis:eBLBaseComponents', 'RequesterCredentials', $headerBody));
		
		$params[0]['Version'] = (isset($params[0]['Version']) && $params[0]['Version']) ? $params[0]['Version']:530; 
		$params[0]['SiteId'] = (isset($params[0]['SiteId']) && $params[0]['SiteId']) ? $params[0]['SiteId']:0;
		
		$queryString = http_build_query(array('callname' => $function, 'siteid' => $params[0]['SiteId'], 'version' => $params[0]['Version'], 'appid' => $this->_appId, 'Routing' => 'default'), '', '&');
	 	$location = $this->getLocation() . "?" . $queryString;
	 	
 		$result = $this->__soapCall($function, $params, array('location' => $location), $headers);
 	  
 	  return $result;
 	}
}