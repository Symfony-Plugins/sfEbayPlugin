<?php
class BasesfEbay extends SoapClient
{
  private $wsdl         =   null;
	private $token        =   null;
	private $devId        =   null;
	private $appId        =   null;
	private $certId       =   null;
	private $environment  =   'production';
  protected $locations    =   array('production'  => null,
                                    'sandbox'     => null);
  
	public function __construct($wsdl, $token, $devId, $appId, $certId)
	{	
		$this->wsdl = $wsdl;
		$this->token = $token;
		$this->devId = $devId;
		$this->appId = $appId;
		$this->certId = $certId;
		
		parent::__construct($this->wsdl, array('trace' => 1));
	}
	
	public function getEnvironment()
	{
	  return $this->environment;
	}
	
	public function setEnvironment($environment)
	{
	  $this->environment = $environment;
	}
	
	public function getLocation()
	{
	  return $this->locations[$this->getEnvironment()];
	}

 	public function __call($function, $params)
 	{
 	  $eBayAuth = new sfEbayAuth($this->token, $this->appId, $this->devId, $this->certId);
		$headerBody = new SoapVar($eBayAuth, SOAP_ENC_OBJECT);
		$headers = array(new SoapHeader('urn:ebay:apis:eBLBaseComponents', 'RequesterCredentials', $headerBody));
		
		$params[0]['Version'] = (isset($params[0]['Version']) && $params[0]['Version']) ? $params[0]['Version']:530; 
		$params[0]['SiteId'] = (isset($params[0]['SiteId']) && $params[0]['SiteId']) ? $params[0]['SiteId']:0;
		
		$queryString = http_build_query(array('callname' => $function, 'siteid' => $params[0]['SiteId'], 'version' => $params[0]['Version'], 'appid' => $this->appId, 'Routing' => 'default'));
	 	$location = $this->getLocation() . "?" . $queryString;
	 	
 		$result = $this->__soapCall($function, $params, array('location' => $location), $headers);
 	  
 	  return $result;
 	}
}