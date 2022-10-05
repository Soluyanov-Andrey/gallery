<?php

class ReadSaveHashFile 
{

    const URL_IMAGES_YES = 'Такое изображение уже есть.';
    const URL_IMAGES_NO = 'Такого изображения в Hash еще нет.';
    const URL_IMAGES_5_PERCENT = 'Изображение различимо менне чем на 5%';
    const IMAGES_HASH_SAVE = 'Сохранили Hash файла';
    /**
     *
     *
     * @param array $data массив с выбраными url изображений.
     */

    public static function seveFalesImagis($urlSmollImg)
    {
            
           
            $imgHash = ImgHash::createHashFromFile($urlSmollImg);
            
            

            $resultMessage = ReadSaveHashFile ::comparisonHash($imgHash);

        
            if ($resultMessage['result']) {
                
                // rename($urlSmollImg, $newFilename);
                return ReadSaveHashFile::seveFalesHash($imgHash,  $imgHash );

            }
            
            return $resultMessage;
        
    }

    /**
     * Проверяем есть ли в записанном файле кэш, подобное изображение.
     * @param string $hashFromFile кэш изображения
     * @param array arrayHashRedFiles массив содержащий кэши изображений хранящийся в файле.
     */

    private function comparisonHash($hashFromFile)
    {

        $names = file(URL_CASH_FILE);

        foreach ($names as $name) {

            $isNearEqual = ImgHash::compareImageHashes($hashFromFile, $name, 0.05);

            $name = preg_replace("/[\t\r\n]+/", '', $name);

            // Такое изображение уже есть в кэш
            if ($hashFromFile == $name) {

                return MessageSystem::sendMessage(false, self::URL_IMAGES_YES, '');
            };
            // Изображение различимо менне чем на 5%
            if ($isNearEqual == true) {

                return MessageSystem::sendMessage(false, self::URL_IMAGES_5_PERCENT, '');
            };

            //$isEqual = ($hash1 == $name);

            //echo "Хэши изображений равны?:" . ($isEqual ? "Да" : "Нет");
            //echo "Хэши изображений равны с точностью до 5%?:" . ($isNearEqual ? "Да" : "Нет");

        }
        return MessageSystem::sendMessage(true, self::URL_IMAGES_NO);

    }

    //Записываем кэш изображения в файл.
    private function seveFalesHash($hashFromFile , $newFilename)
    {

        $fp = fopen(URL_CASH_FILE, "a");
        fwrite($fp, "\r\n" . $hashFromFile);
        fclose($fp);

        return MessageSystem::sendMessage(true, self::IMAGES_HASH_SAVE, $newFilename);
    }

}
