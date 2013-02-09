<?php

/********************************************
    Document   : 
    Created on : February 7, 2013, 7:56 PM
    Author     : Tauseef Jamadar
    Description:
        Purpose of this class is to allow users 
        to log/debug data into files.
*********************************************/


include('class.config.php');
include_once 'LogType.php';

class TLogger {
    
    //const variables
    const OFF = -1;
    
    //declaring class variables
    private $_data;
    private $_message;
    private $log_file;
    private $file_handle;
    private $_status;
    private $_className;




    /**
     * Getters and setters
     */
    
    public function get_Data(){
        return $this->_data;
    }
    public function set_Data($data){
        $this->_data = $data;
    }
    public function get_Message(){
        return $this->_message;
    }
    public function set_Message($message){
        $this->_message = $message;
    }
    public function get_log_file(){
        $this->log_file;
    }
    public function set_log_file($logfile){
        $this->log_file = $logfile;
    }
    public function get_className()
    {
        return $this->_className;
    }
    public function set_className($className)
    {
        $this->_className = $className;
    }

    
    /**
     * Class constructor
     */
    public function __construct($className) {
        
        $this->_className = $className;
        $this->log_file =config::$FILEPATH.'/'.config::$LOG_FILENAME;
        if(!file_exists(config::$FILEPATH))
        {
            echo 'dir does not exist creating directory :'. config::$FILEPATH;
            mkdir(config::$FILEPATH,0777,true);
        }
        $this->file_handle = fopen( $this->log_file , "a" ) ;
    }
    
    
    /**
     * Class destructor
     */
    public function __destruct()
    {
        if ($this->file_handle) {
            fclose($this->file_handle);
        }
    }

    
    
    /**
     * This method writes the data to the file i.e. any exception thrown will be written to the log files
     * @param <type> $Data
     */
    private function writeToFile($Data){
        //Do not write to log files if Flag is turned off
        if($this->_status != self::OFF )
        {
            fwrite( $this->file_handle , $Data.PHP_EOL);
        }
    }
    
    private function formatMessage($message)
    {
        $timeStamp = new DateTime();
        $timeStamp = "[".$this->_className."]"."[".$this->_status."][".$timeStamp->format('Y-m-d H:i:s')."]";
        $timeStamp .= "\t";
        
        return $timeStamp.$message;
    }
    
    public function logDebug($message)
    {
        $this->_status = LogType::DEBUG;
        $message = $this->formatMessage($message);
        
        $this->writeToFile($message);
    }
    
    public function logError($message)
    {
        $this->_status = LogType::ERROR;
        $message = $this->formatMessage($message);
        
        $this->writeToFile($message);
    }
    
    public function logInfo($message)
    {
        $this->_status = LogType::INFO;
        $message = $this->formatMessage($message);
        
        $this->writeToFile($message);
    }
    
    public function logNotice($message)
    {
        $this->_status = LogType::NOTICE;
        $message = $this->formatMessage($message);
        
        $this->writeToFile($message);
    }
    
    public function logFatalError($message)
    {
        $this->_status = LogType::FATAL;
        $message = $this->formatMessage($message);
        
        $this->writeToFile($message);
    }
    
    public function logWarning($message)
    {
        $this->_status = LogType::WARNING;
        $message = $this->formatMessage($message);
        
        $this->writeToFile($message);
    }
}

?>
