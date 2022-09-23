<?php

/**
 *  В этом классе реализуем методы которые вызываются в цепочке.
 *  getImage()->usageImageResize()->usageImageResize()->usageReadSaveHashFile() ........
 *
 */


class СallСhainСontroller
{

    private $saveImageUrl;
    private $saveMessage;
    private $saveExtension;
    private $saveNewFile;

    
    public function usageGetImage($value, $saitUrl, $width, $higth){

        $this->saveMessage =  GetImages::getImagesUrl($value, $saitUrl, $width, $higth);
        $this->saveImageUrl = $this->saveMessage['data'];
        echo($this->saveImageUrl);
        return $this;
    }
   
    public function usageSaveFile(){

        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $saitUrl = $this->saveImageUrl;
       
        if($message['result']){

                 $message = SaveFile::seveFalesImagis($saitUrl); 
                 $this->saveExtension = $message['data'];
                 $this->saveNewFile = URL_FOLDER_TMP . NAME_TEMPORARY_FILE . $this->saveExtension;
        }
        
        return $this;
    }

    public function usageImageResize(){

        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $saveNewFile = $this->saveNewFile;

        if($message['result']){

            ImageResize::resize($saveNewFile);
           
                
        }
        
        return $this;
    }

    public function usageReadSaveHashFile(){
        
        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $smollImg = URL_FOLDER_TMP.NAME_SMOLL_IMG;

        if($message['result']){

            $this->saveMessage = ReadSaveHashFile::seveFalesImagis($smollImg); 
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

    public function usageWorkFileDirectory(){
        
        
        return $this;
    }

   

}