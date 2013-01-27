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

class GoogleAnalytics extends AnalyticsHelper 
{
	private $trackingCode = '<! -- GoogleAnalytics --> 
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push([\'_setAccount\', \':id:\']);
_gaq.push([\'_trackPageview\']);
(function() {
var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<!-- End GoogleAnalytics Tracking Code -->';
	
	private function getParsedTrackingCode()
	{
		$key = array(
				':id:',
		);
		$replacement = array(
				$this->getConfigKey('id'),
		);
	
		return str_replace($key, $replacement, $this->trackingCode);
	}
	
	public function getTrackingCode()
	{
		if ($this->isEnabled() === true) return $this->getParsedTrackingCode();
		else return '<!-- GoogleAnalytics is disabled -->';
	}
}