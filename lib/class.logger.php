<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of classlogger
 *
 * @author Tauseef
 */
include('class.config.php');

class classlogger {
    
    //declaring class variables
    private $_Data;
    private $_Message;
    private $log_file;
    private $file_handle;

    public function get_Data(){
        return $this->_Data;
    }
    public function set_Data($data){
        $this->_Data = $data;
    }
    public function get_Message(){
        return $this->_Message;
    }
    public function set_Message($message){
        $this->_Message = $message;
    }
    public function get_log_file(){
        $this->log_file;
    }
    public function set_log_file($logfile){
        $this->log_file = $logfile;
    }


    public function init_logging()
    {
        $this->log_file =config::$FILEPATH.config::$LOG_FILENAME;
        $this->file_handle = fopen( $this->log_file , "a" ) ;

    }
    /**
     * This method writes the data to the file i.e. any exception thrown will be written to the log files
     * @param <type> $Data
     */
    public function writeToFile($Data){
        fwrite( $this->file_handle , $Data );
    }
}
?>
