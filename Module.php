<?php
/**
 * WebanalyticsModule (http://achtachtel.de/projects/zf2_webanalytics_helper)
 * 
 * @author Marcel Brand <marcel.brand@achtachtel.de>
 * @copyright Copyright 2013 Marcel Brand
 * @license GPLv3 http://gnu.org/licenses/gpl.html
 * @package WebanalyticsModule
 */

namespace WebanalyticsModule;

use WebanalyticsModule\Helper\PiwikAnalytics;
use WebanalyticsModule\Helper\GoogleAnalytics;

class Module
{
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,		
				),
			),
		);
	}
	
	public function getViewHelperConfig()
	{
		return array(
			'factories' => array(
				'piwikAnalytics' => function($sm) {
					return new PiwikAnalytics(
						$sm->getServiceLocator()->get('Config')['webanalytics']['piwik']
					);
				},
				'googleAnalytics' => function($sm) {
					return new GoogleAnalytics(
						$sm->getServiceLocator()->get('Config')['webanalytics']['google']
					);
				},
			),
		);
	}	
}