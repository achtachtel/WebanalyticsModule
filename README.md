#Webanalytics helper for ZF2

## How to use
Simply drop this module in the vender folder of your Zendframework application and enable it in the 'application.config.php'.

Copy the webanalytics.local.config.php to your local autoload config and edit it to your needs. **(Don't save this file within your SCM)**

Insert these two lines anywhere in your layout.
    
    <?php echo $this->googleAnalytics()->getTrackingCode(); ?>
    <?php echo $this->piwikAnalytics()->getTrackingCode(); ?>

## More Information
Visit <http://achtachtel.de/projects/webanalytics_module/>