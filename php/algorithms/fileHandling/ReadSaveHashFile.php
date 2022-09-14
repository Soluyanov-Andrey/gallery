<?php



class ReadSaveHashFile 
{

    const IMAGES_YES = 'Такое изображение уже есть.';
    const IMAGES_NO = 'Такого изображения еще нет. Копируем.';
    const IMAGES_5PROC = 'Изображение различимо менне чем на 5%';

    /**
     *
     *
     * @param array $data массив с выбраными url изображений.
     */

    public static function seve_fales_imagis($url)
    {

      
            $rez = ImgHash::createHashFromFile($url);
            $new_filename = md5($rez) . '.';

            $if_rez = SaveFile::comparisonHash($rez);

            $new_name = URL_FILE_HANDLING . $new_filename . $path_parts['extension'];

          
            if ($if_rez['result']) {
                
                rename(URL_FILE_HANDLING . NAME_FILES . $path_parts['extension'], $new_name);
                SaveFile::seve_falesHash($rez);

            }
        
    }

    /**
     * Проверяем есть ли в записанном файле кэш, подобное изображение.
     * @param string $HashFromFile кэш изображения
     * @param array arrayHashRedFiles массив содержащий кэши изображений хранящийся в файле.
     */

    private function comparisonHash($HashFromFile)
    {

        $names = file(URL_CASH_FILE);

        foreach ($names as $name) {

            $isNearEqual = ImgHash::compareImageHashes($HashFromFile, $name, 0.05);

            $name = preg_replace("/[\t\r\n]+/", '', $name);

            // Такое изображение уже есть в кэш
            if ($HashFromFile == $name) {

                return MessageSystem::sendMessage(false, self::IMAGES_YES, '');
            };
            // Изображение различимо менне чем на 5%
            if ($isNearEqual == true) {

                return MessageSystem::sendMessage(false, self::IMAGES_5PROC, '');
            };

            //$isEqual = ($hash1 == $name);

            //echo "Хэши изображений равны?:" . ($isEqual ? "Да" : "Нет");
            //echo "Хэши изображений равны с точностью до 5%?:" . ($isNearEqual ? "Да" : "Нет");

        }
        return MessageSystem::sendMessage(true, self::IMAGES_NO, '');

    }

    //Записываем кэш изображения в файл.
    private function seve_falesHash($HashFromFile)
    {

        $fp = fopen(URL_CASH_FILE, "a");
        fwrite($fp, "\r\n" . $HashFromFile);
        fclose($fp);

    }

}
