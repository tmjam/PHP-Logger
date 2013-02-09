<?php
/* ******************************************
    Document   : Configuration
    Created on : February 7, 2013, 7:57 PM
    Author     : Tauseef Jamadar
    Description:
        Purpose of the class is to store all configuration parameters.
*********************************************/

class config {

        /********Database Settings**************/

    public static $DATABASE_USER = "root";
    public static $DATABASE_PASSWORD = "root";
    public static $DATABASE_NAME = "logger";
    public static $DATABASE_HOST = "localhost";

        /********General Settings**************/

    public static $LOG_FILENAME = "Debug.log";
    public static $EMAIL_FROM = "not_reply_tjlance@mail.edu";
    public static $EMAIL_FROM_NAME = "Tauseef Jamadar";
    public static $ADMIN_EMAIL = "tauseef.jamadar@yahoo.com";
    public static $SITE_ADMIN = "Admin";
    public static $DateFormat = "Y-m-d G:i:s";
    public static $FILEPATH = "Logs";
	
}

?>
