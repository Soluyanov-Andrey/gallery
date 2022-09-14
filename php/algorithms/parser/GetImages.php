<?php
/**
 *  Найденные изображения при проходе Parser могут содержать сокращенные
 */
class GetImages extends MessageSystem
{
    const FILES_YES = 'Фаил есть и подходит по размеру';
    const FILES_SIZE_NO = 'Фаил есть но не подходит по размеру';
    const FILES_NO = 'Фаила нет';
    const CORRECTION_NO = 'Коррекция результата не дала.';
    const CORRECTION_YES = 'Коррекция результы дала.';

    public function get_images_url($images_url, $url_gl, $width, $higth)
    {
        $obr = self::get_files($images_url, $width, $higth);
       
        if (is_null($obr['result'])) {

            $result_url = GetImages::corrective_step_1($images_url, $url_gl);
            
            $result = GetImages::get_files_repeated($result_url, "corrective_step_1");

            if ($result['result']) {return $result;};

            $result_url = GetImages::corrective_step_2($images_url, $url_gl);
            

            $result = GetImages::get_files_repeated($result_url, "corrective_step_2");
            if ($result['result']) {return $result;};

            $result_url = GetImages::corrective_step_3($images_url, $url_gl); 
            
            $result = GetImages::get_files_repeated($result_url, "corrective_step_3");
            if ($result['result']) {return $result;};

            return $obr;

        }
        if ($obr['result'] == true || $obr['result'] == false) {

            return $obr;

        }

    }
    private function get_files_repeated($url, $method_name)
    {

        $size = @getimagesize($url);

        if (!$size) {
            return MessageSystem::sendMessage(false, self::CORRECTION_NO . "-" . $method_name);
        }

        return MessageSystem::sendMessage(true, self::CORRECTION_YES . "-" . $method_name, $url);

    }

    private function get_files($url, $width, $higth)
    {

        $fl = 0;

        $size = @getimagesize($url);
        //"высота".$size[1]);
        //"ширина".$size[0]);

        if ($size[1] >= $higth && $size[0] >= $width) {

            $fl = 1;
        }

        //-----------------------------------------------------
        if ($size && $fl == 1) {
            //фаил есть и подходит по размеру

            return MessageSystem::sendMessage(true, self::FILES_YES, $url);
        }

        if ($size && $fl == 0) {
            //фаил есть но не подходит по размеру

            return MessageSystem::sendMessage(false, self::FILES_SIZE_NO, $url);
        } 

        if (!$size) {
            //фаила нет

            return MessageSystem::sendMessage(null, self::FILES_NO,$url);
        }
    }

    /*
     * corrective_step1 возвращает новый URl
     * имеет исходный url -$gl_url например http://test.ru/test/12/3.php
     * выбранные url -$url например test_img/1.jpg
     * результат http://test.ru/test/12/test_img/1.jpg
     */
    protected function corrective_step_1($url, $gl_url)
    {

        $path_parts = pathinfo($gl_url);

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
     * имеет исходный url -$gl_url например http://test.ru/test/12/3.php
     * выбранные url -$url например ../../test_img/1.jpg
     * результат http://test.ru/test_img/1.jpg
     */

    protected function corrective_step_2(string $url, $gl_url)
    {

        $path_parts = pathinfo($gl_url);

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

            $str_1 = trim_down($gl_url, $quantity + 1);

            //удаляем все '../' в строке вида '../../img.jpg'
            $str_2 = str_replace("../", "", $url, $count);

            return ($str_1 . '/' . $str_2);

        }
        
        return $url;
    }
    /*
     * corrective_step3  возвращает новый URl картинки
     * $url="/template/img/left-logo.png";
     * $gl_url="https://zastavok.net/?ysclid=l764sqvgt028704337";
     * вернет https://zastavok.net/template/img/left-logo.png
     */
    protected function corrective_step_3($url, $gl_url)
    {
        echo($url);
        echo($gl_url);
        $a = parse_url($gl_url);
        $url_n = $a["scheme"] . "://" . $a["host"];

        //если в url первая  "/" то соеденяем по
        if (substr($url, 0, 1) == "/") {
            
            return $url_n . $url;
        } else {
            return $url_n . "/" . $url;
        }

    }

}
