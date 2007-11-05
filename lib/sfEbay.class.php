<?php
/**
 * sfEbay
 *
 * @package sfEbayPlugin
 * @author Jonathan H. Wage
 */
class sfEbay extends BasesfEbay
{
  /**
   * _locations
   *
   * @var string
   */
  protected $_locations    =   array('production'  => 'https://api.ebay.com/wsapi',
                                     'sandbox'     => 'https://api.sandbox.ebay.com/wsapi');
  
  /**
   * __construct
   *
   * @param string $_token 
   * @param string $_devId 
   * @param string $_appId 
   * @param string $_certId 
   * @return void
   */
	public function __construct($_token, $_devId, $_appId, $_certId)
	{
		parent::__construct($_token, $_devId, $_appId, $_certId);
	}
}