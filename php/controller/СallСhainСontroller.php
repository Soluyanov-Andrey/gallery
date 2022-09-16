<?php

/**
 *  В этом классе реализуем методы которые вызываются в цепочке.
 *  getImage()->SeveFile()->usageReadSaveHashFile() ........
 *
 */


class СallСhainСontroller
{
    //
    private $saveSaitUrl;
    private $saveMessage;
    private $saveExtension;
    private $saveNewFile;

    
    public function usageGetImage($value, $saitUrl, $width, $higth){

        $this->saveMessage =  GetImages::getImagesUrl($value, $saitUrl, $width, $higth);
        $this->saveSaitUrl = $this->saveMessage['data'];
        return $this;
    }
   
    public function usageSeveFile(){

        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $saitUrl = $this->saveSaitUrl;
       
        if($message['result']){

                 $this->saveMessage = SaveFile::seveFalesImagis($saitUrl); 
                 $this->saveExtension = $this->saveMessage['data'];
                 $this->saveNewFile = URL_FOLDER_INITIAL . NAME_TEMPORARY_FILE . $this->saveExtension;
        }
        
        return $this;
    }

    public function usageImageResize(){

        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $saitUrl = $this->saveSaitUrl;
        $saveNewFile = $this->saveNewFile;

        if($message['result']){

            ImageResize::resize($saveNewFile);
           
                
        }
        
        return $this;
    }

    public function usageReadSaveHashFile(){
        
        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $extension = $this->saveExtension;
       

        if($message['result']){

            $this->saveMessage = ReadSaveHashFile::seveFalesImagis($extension); 
            $this->saveNewFile = $this->saveMessage['data'];
           
        }

        return $this;
    }
   
    public function usagePredominantColor(){
        
        $b = new PredominantColor();
        $kol=$b->Get_Img('/var/www/html/images/file_initial/82862f7e5c23841b91dff939f5c8bc03.jpg');
        
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