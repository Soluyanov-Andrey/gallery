<?php


class MessageSystem
{ 
    
   

    public function sendMessage($result, $message, $data = null)
    {
        $result = array(
            "result" => $result,   // true.false
            "message" => $message, // text
            "data" => $data
            
        );  
        
        MessageSystem::seveLogFiles($result["message"].'----'.$result["data"]);
        var_dump($result);
        return $result;
    }


    private function seveLogFiles($Message)
    {

        $fp = fopen(URL_FILE_LOG, "a");
        fwrite($fp, "\r\n" . $Message);
        fclose($fp);

    }
}

?>

