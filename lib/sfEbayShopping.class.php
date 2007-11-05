<?php
/**
 * sfEbayShopping
 *
 * @package sfEbayPlugin
 * @author Jonathan H. Wage
 */
class sfEbayShopping extends BasesfEbay
{
  protected $_locations    =   array('production'  => 'https://api.ebay.com/shopping',
                                     'sandbox'     => 'https://api.sandbox.ebay.com/shopping');

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