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
    private $saveNewFile;

    public function usageGetImage($value, $saitUrl, $width, $higth){

        $this->saveMessage =  GetImages::getImagesUrl($value, $saitUrl, $width, $higth);

        return $this;
    }
    
    public function usageSeveFile(){

        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
       
       
        if($message['result']){

                 $this->saveMessage = SaveFile::seveFalesImagis($message['data']); 
                 $this->saveExtension = $this->saveMessage['data'];

        }
        
        return $this;
    }

    public function usageReadSaveHashFile(){
        
        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $extension = $this->saveExtension;
       

        if($message['result']){

            $this->saveMessage = ReadSaveHashFile::seveFalesImagis($extension); 
            $this->saveNewFile = $this->$saveMessage['data'];
            var_dump( $this->saveMessage);
        }

        return $this;
    }
    public function usageImageResize(){

        $message = $this->saveMessage;
        $extension = $this->saveExtension;
        
        if($message['result']){

            
    
        }

        
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