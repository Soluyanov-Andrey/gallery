<?php
class MessageSystem
{ 
    
   

    public function returns($result, $message, $data = null)
    {
        $result = array(
            "result" => $result,   // true.false
            "message" => $message, // text
            "data" => $data
            
        );  
        
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
}

?>

