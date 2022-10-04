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
    private $saveNewNameMD5;
    private $saveColor;

    public function usageGetImage($value, $saitUrl, $width, $higth)
    {

        $this->saveMessage = GetImages::getImagesUrl($value, $saitUrl, $width, $higth);
        $this->saveImageUrl = $this->saveMessage['data'];

        return $this;
    }

    public function usageSaveFile()
    {

        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $saveImageUrl = $this->saveImageUrl;

        if ($message['result']) {

            $this->saveMessage = SaveFile::seveFalesImagis($saveImageUrl);
            $this->saveTestFileExtension = URL_FOLDER_TMP . NAME_TEMPORARY_FILE . $this->saveMessage;

        }

        return $this;
    }

    public function usageImageResize()
    {

        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $saveImageUrl = $this->saveImageUrl;

        if ($message['result']) {

            ImageResize::resize($saveImageUrl);

        }

        return $this;
    }

    public function usageReadSaveHashFile()
    {

        //-------------------Идентификаторы для сокращения------------------
        $message = $this->saveMessage;
        $smollImg = URL_FOLDER_TMP . NAME_SMOLL_IMG;

        if ($message['result']) {

            $this->saveMessage = ReadSaveHashFile::seveFalesImagis($smollImg);
            $this->saveNewNameMD5 = $this->saveMessage['data'];

        }

        return $this;
    }

    public function usagePredominantColor()
    {
        //-------------------Идентификаторы для сокращения------------------
        $smollImg = URL_FOLDER_TMP . NAME_SMOLL_IMG;
        $message = $this->saveMessage;

        if ($message['result']) {

            $this->saveMessage = PredominantColor::Get_Img($smollImg);
            $this->saveColor = $this->saveMessage['data'];

        }

        return $this;
    }

    public function usageWatermark()
    {
        //-------------------Идентификаторы для сокращения------------------
        $color = $this->saveColor;
        $message = $this->saveMessage;

        if ($message['result']) {

            WaterMark::to_draw($color);
        }
        return $this;
    }

    public function usageWorkFileDirectory()
    {

        return $this;
    }

}
