<?php
class ParentAlgorithms
{ 
    
   

    public function returns($result, $message, $data)
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

