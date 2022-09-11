<?php
define('URL_FILE_LOG', DOCUMENT_ROOT_PHP . 'algorithms/system/system.log');

class MessageSystem
{ 
    
   

    public function returns($result, $message, $data = null)
    {
        $result = array(
            "result" => $result,   // true.false
            "message" => $message, // text
            "data" => $data
            
        );  
        
        MessageSystem::seve_log_files($result["message"].'</br>'.$result["data"].'</br>--------------------');
        return $result;
    }

    public function massages($var)
    {
        echo $var;
    }

    public function massages1($var)
    {
        echo "$var";
    }

    private function seve_log_files($Message)
    {

        $fp = fopen(URL_FILE_LOG, "a");
        fwrite($fp, "\r\n" . $Message);
        fclose($fp);

    }
}

?>

