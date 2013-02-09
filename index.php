<?
    include_once 'lib/class.logger.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here

        echo 'logging';
        $logger = new TLogger(config);
        
        $logger->logDebug("testing logging");
        $logger->logError("Log caught an error");
        
        ?>
    </body>
</html>
