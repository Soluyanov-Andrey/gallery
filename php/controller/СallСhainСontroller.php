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
    // private $saveExtension;
    private $saveTestFileExtension;

    
    public function usageGetImage($value, $saitUrl, $width, $higth){

        $this->saveMessage =  GetImages::getImagesUrl($value, $saitUrl, $width, $higth);
        $this->saveImageUrl = $this->saveMessage['data'];
        echo($this->saveImageUrl);
        return $this;
    }
   
    public function usageSaveFile(){

        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $saveImageUrl = $this->saveImageUrl;
       
        if($message['result']){

                 $this->saveMessage = SaveFile::seveFalesImagis($saveImageUrl); 
                 $this->saveTestFileExtension = URL_FOLDER_TMP . NAME_TEMPORARY_FILE . $this->saveMessage ;
                var_dump($this->saveTestFileExtension);
        }
        
        return $this;
    }

    public function usageImageResize(){

        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $saveImageUrl = $this->saveImageUrl;

        if($message['result']){

            ImageResize::resize($saveImageUrl);
           
                
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
        $smollImg = URL_FOLDER_TMP.NAME_SMOLL_IMG;
        
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