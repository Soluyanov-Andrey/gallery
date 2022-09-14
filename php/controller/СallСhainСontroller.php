<?php

/**
 *  В этом классе реализуем методы которые вызываются в цепочке.
 *  getImage()->SeveFile()->usageReadSaveHashFile() ........
 *
 */


class СallСhainСontroller
{
    //
    private $saveMessage;
    private $saveExtension;


    public function usageGetImage($value, $saitUrl, $width, $higth){

        $this->saveMessage =  GetImages::getImagesUrl($value, $saitUrl, $width, $higth);

        return $this;
    }
    
    public function usageSeveFile(){

        $message = $this->saveMessage;
       
       
        if($message['result']){

                $pathParts = pathinfo($message['data']);
                
                 $this->saveMessage = SaveFile::seveFalesImagis($message['data'], $pathParts['extension']); 
                 $this->saveExtension = $pathParts['extension'];

        }
        
        return $this;
    }

    public function usageReadSaveHashFile(){
        
        $message = $this->saveMessage;
        $extension = $this->saveExtension;
       
        if($message['result']){

            $this->$saveMessage = ReadSaveHashFile::seveFalesImagis($extension); 
    
        }

        return $this;
    }
    public function usageImageResize($a){
        echo("4");
        return $this;
    }
    public function usagePredominantColor(){
        echo("5");
        return $this;
    }
    public function usageWatermark(){
        echo("6");
        return $this;
    }
    public function usageDistributionsDirectory(){
        echo("7");
        return $this;
    }

}