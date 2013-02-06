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
					$config = $sm->getServiceLocator()->get('Config');
					if (isset($config['webanalytics']['piwik'])) {
						return new PiwikAnalytics($config['webanalytics']['piwik']);
					} else {
						return new PiwikAnalytics();
					}
				},
				'googleAnalytics' => function($sm) {
					$config = $sm->getServiceLocator()->get('Config');
					if (isset($config['webanalytics']['google'])) {
						return new GoogleAnalytics($config['webanalytics']['google']);
					} else {
						return new GoogleAnalytics();
					}
				},
			),
		);
	}	
}