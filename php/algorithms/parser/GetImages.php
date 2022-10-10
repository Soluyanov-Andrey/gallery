<?php
/**
 *  Найденные изображения при проходе Parser могут содержать сокращенные варианты url например ../image.jpg
 *  И скачать ../image.jpg через http не возможно. В данном классе производтся попытка исправить такие url.
 *  И в сообщении MessageSystem::sendMessage возвращается рабочий url.
 */
class GetImages 
{
    const FILES_YES = 'Рисунок есть и подходит по размеру';
    const FILES_SIZE_NO = 'Рисунок есть но не подходит по размеру';
    const FILES_NO = 'Рисунка  нет';
    const CORRECTION_NO = 'Коррекция Url результата не дала.';
    const CORRECTION_YES = 'Коррекция Url  результы дала.';
    const CORRECTIVE_STEP_0 = 'Первая проверка';
    const CORRECTIVE_STEP_1 = 'correctiveStep_1';
    const CORRECTIVE_STEP_2 = 'correctiveStep_2';
    const CORRECTIVE_STEP_3 = 'correctiveStep_3';

    public function getImagesUrl($urlImages_url, $saitUrl, $width, $higth)
    {
        
        $obr = self::getFilesExamination($urlImages_url, self::CORRECTIVE_STEP_0);
       
        if (!$obr['result']) {

            $result_url = GetImages::correctiveStep_1($urlImages_url, $saitUrl);
            $result = GetImages::getFilesExamination($result_url, "correctiveStep_1");
            
            if ($result['result']) {
                
                $obr = self::filesSizeExamination($result_url, $width, $higth);
                return $obr;
            };

            $result_url = GetImages::correctiveStep_2($urlImages_url, $saitUrl);
            $result = GetImages::getFilesExamination($result_url, "correctiveStep_2");
            
            if ($result['result']) {
                
                $obr = self::filesSizeExamination($result_url, $width, $higth);
                return $obr;
            };

            $result_url = GetImages::correctiveStep_3($urlImages_url, $saitUrl); 
            $result = GetImages::getFilesExamination($result_url, "correctiveStep_3");
           
            if ($result['result']) {
                
                $obr = self::filesSizeExamination($result_url, $width, $higth);
                return $obr;
            };

            return $obr;

        }

        $obr = self::filesSizeExamination($urlImages_url, $width, $higth);

        return $obr;

        

    }

    private function getFilesExamination($url,$method_name){

        $file = @getImagesize($url);
        MessageSystem::sendMessage(false, "------var-----",  $result_url);
        if (!$file) {
            return MessageSystem::sendMessage(false, self::CORRECTION_NO . "-" . $method_name, $url);
        }

        return MessageSystem::sendMessage(true, self::CORRECTION_YES . "-" . $method_name, $url);
    }

    private function filesSizeExamination($url, $width, $higth){
        

        $size = @getImagesize($url);
        
        //"высота".$size[1]);
        //"ширина".$size[0]);
    
        if ($size[1] >= $higth && $size[0] >= $width) {

            return MessageSystem::sendMessage(true, self::FILES_YES, $url);
        }
        
            return MessageSystem::sendMessage(false, self::FILES_SIZE_NO, $url);
        


    }

    /*
     * corrective_step1 возвращает новый URl
     * имеет исходный url -$saitUrl например http://test.ru/test/12/3.php
     * выбранные url -$url например test_img/1.jpg
     * результат http://test.ru/test/12/test_img/1.jpg
     */
    protected function correctiveStep_1($url, $saitUrl)
    {

        $path_parts = pathinfo($saitUrl);

        $a = parse_url($url);

        if (!isset($a["host"])) {

            //если в url нет ../ то делаем
            if (strpos($url, '../') === false) {

                //если в url первая  "/" то соеденяем по
                if (substr($url, 0, 1) == "/") {
                    return $path_parts['dirname'] . $url;
                } else {
                    return $path_parts['dirname'] . "/" . $url;
                }

            }
        };
       
        return $url;

    }

    /*
     * corrective_step2 возвращает новый URl
     * имеет исходный url -$saitUrl например http://test.ru/test/12/3.php
     * выбранные url -$url например ../../test_img/1.jpg
     * результат http://test.ru/test_img/1.jpg
     */

    protected function correctiveStep_2(string $url, $saitUrl)
    {

        $path_parts = pathinfo($saitUrl);

        $a = parse_url($url);

        //Проверяем первичное условие есть ли в url имя и является ли адрес относительным ../
        if (!function_exists('conditions')) {

            function conditions($url)
            {
                if (!isset($a["host"])) {

                    //если в url нет ../ то делаем

                    if (substr_count($url, '../') != 0) {

                        return true;
                    }
                }
            };

        }
        //рекурсивная функция из Url http://rnk.ru/test/55/6 отсикает $quantity '/' с конца
        //$quantity=1 вернет http://rnk.ru/test/55
        //$quantity=2 вернет http://rnk.ru/test
        if (!function_exists('trim_down')) {
            function trim_down($url, $quantity)
            {
                $a = strripos($url, '/');
                $url_n = substr($url, 0, $a);
                $quantity = $quantity - 1;

                if ($quantity > 0) {return trim_down($url_n, $quantity);};
                if ($quantity == 0) {return $url_n;};
            };
        }
        if (conditions($url)) {
            $quantity = substr_count($url, '../');

            $str_1 = trim_down($saitUrl, $quantity + 1);

            //удаляем все '../' в строке вида '../../img.jpg'
            $str_2 = str_replace("../", "", $url, $count);

            return ($str_1 . '/' . $str_2);

        }
        
        return $url;
    }
    /*
     * corrective_step3  возвращает новый URl картинки
     * $url="/template/img/left-logo.png";
     * $saitUrl="https://zastavok.net/?ysclid=l764sqvgt028704337";
     * вернет https://zastavok.net/template/img/left-logo.png
     */
    protected function correctiveStep_3($url, $saitUrl)
    {
    
        $a = parse_url($saitUrl);
        $url_n = $a["scheme"] . "://" . $a["host"];

        //если в url первая  "/" то соеденяем по
        if (substr($url, 0, 1) == "/") {
            
            return $url_n . $url;
        } else {
            return $url_n . "/" . $url;
        }

    }

}
