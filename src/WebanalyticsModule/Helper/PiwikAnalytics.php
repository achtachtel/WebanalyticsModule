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

class PiwikAnalytics extends AnalyticsHelper
{
	private $trackingCode = '<!-- Piwik --> 
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://:piwik_domain:/" : "http://:piwik_domain:/");
document.write(unescape("%3Cscript src=\'" + pkBaseURL + "piwik.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", :id:);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://:piwik_domain:/piwik.php?idsite=:id:" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->';
	
	private function getParsedTrackingCode()
	{
		$key = array(
			':id:',
			':piwik_domain:'
		);
		$replacement = array(
			$this->getConfigKey('id'), 
			$this->getConfigKey('piwik_domain')
		);
		
		return str_replace($key, $replacement, $this->trackingCode);
	}
	
	public function getTrackingCode()
	{
		if ($this->isEnabled() === true ) return $this->getParsedTrackingCode();
		else return '<!-- Piwik is disabled -->';
	}
}