<?php
/**
 * WebanalyticsModule (http://achtachtel.de/projects/zf2_webanalytics_helper)
 *
 * @author Marcel Brand <marcel.brand@achtachtel.de>
 * @copyright Copyright 2013 Marcel Brand
 * @license GPLv3 http://gnu.org/licenses/gpl.html
 * @package WebanalyticsModule
 */

namespace WebanalyticsModule\Helper;

use Zend\View\Helper\AbstractHelper;

class AnalyticsHelper extends AbstractHelper
{
	protected $config;
	
	public function __construct($config = false)
	{
		$this->config = $config;
	}
	
	public function __invoke()
	{
        return $this;
	}
	
	public function isEnabled()
	{
		return $this->getConfigKey('enabled');
	}
	
	public function getConfigKey($key)
	{
		if (isset($this->config[$key])) return $this->config[$key];
		else return null;
	}
	
	public function getTrackingCode()
	{
		return false;
	}
}