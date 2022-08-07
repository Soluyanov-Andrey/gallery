<?php

/**
 *
 * Проверяем изображения на правильность абсалютного пути
 * и подходит ли оно по указанным размерам
 */

//------------------------Класс испольует следующие константы
define("NAME_IMG","images.");                   // имя файла временного изображения
define("DIR_TEMP", "/var/www/html/php/developer_scripts/1/");           // путь к папке где храним временные файлы
session_start();
$_SESSION['url']="https//ru.freepik.com/popular-photos";
$_SESSION['width']=150;
$_SESSION['higth']=200;
class GetImages
{
    public static function request_Images($url) {

    

        return(self::check_files($url,1,$url));

    }

    /*
     *  Рекурсивная функция с возможность во 2 switch добавлять различные test-ы
     *  с попыткой исправить некорректные url
     */

    private static function check_files($url,$flag,$url_initial){


        switch (GetImages::get_files($url)) {
            //файл есть и подходит
            case 1:

                GetImages::seve_fales($url);

                //Massages::create_msg($url,"");
                //Massages::create_msg("Фаил скопирован","");
                echo $url,"/n";
                echo("Фаил скопирован \n");
                return true;
                break;
            //файл есть и не подходит
            case 2:


                //Massages::create_msg($url,"");
                //Massages::create_msg("Не подходит размер","");

                echo $url,"/n";
                echo("Не подходит размер \n");

                return false;
                break;
            //файла нет пробуем исправить url
            case 3:
                if($flag!=4) {
                    //Massages::create_msg($url,"");
                   // Massages::create_msg("С Url что то не так запускаем test" . $flag,"");
                    echo $url,"/n";
                    echo "С Url что то не так запускаем test \n",$flag;


                }
               switch ($flag) {

                   case 1:
                       //echo("1");
                       $flag=$flag+1;
                       //выполняем тесты
                       $new_url = GetImages::test1($url_initial);
                       return(self::check_files($new_url,$flag,$url_initial));
                    break;

                   case 2:
                       $flag=$flag+1;
                       $new_url = GetImages::test2($url_initial);
                       return(self::check_files($new_url,$flag,$url_initial));
                    break;
                   case 3:
                       $flag=$flag+1;
                       $new_url = GetImages::test3($url_initial);
                       return(self::check_files($new_url,$flag,$url_initial));
                       break;
                   case 4:

                       //Massages::create_msg($url_initial,"");
                       //Massages::create_msg("URl исправить не удалсь".$flag,"");

                       echo $url_initial," \n";
                       echo("URl исправить не удалсь \n");

                       return false;
                       break;
               }

            break;


        }

    }

    private static function get_files($url){


        $gl_width=$_SESSION['width'];
        $gl_higth=$_SESSION['higth'];
        $fl=0;
        //"@" означает, что стандартная ошибка не выдается а генерируется false
        $size=@getimagesize($url);
        //"высота".$size[1]);
        //"ширина".$size[0]);

        if($size[1]>=$gl_higth && $size[0]>=$gl_width){

            $fl=1;
        }

        //-----------------------------------------------------
        if ($size && $fl==1) {
            //фаил есть и подходит по размеру

           return 1;
        }

        if ($size && $fl==0) {
            //фаил есть но не подходит по размеру


            return 2;
        }

        if (!$size) {
            //фаила нет


            return 3;
        }
    }
    private static function seve_fales($url){
        global $gl_name_img;
        $path_parts = pathinfo($url);


        //echo $path_parts['basename'], "\n";
        //echo $path_parts['extension'], "\n";

        if (!copy($url, DIR_TEMP.NAME_IMG.$path_parts['extension'])) {
            echo($url."-");
            echo(DIR_TEMP.NAME_IMG.$path_parts['extension']);
            // Massages::create_msg($url,"");
            // Massages::create_msg("При копировании файла что то пошло не так","");

        }
        echo($url."-----");
        echo(DIR_TEMP.NAME_IMG.$path_parts['extension']."-----");
        $gl_name_img=DIR_TEMP.NAME_IMG.$path_parts['extension'];

    }

    /*
    * Тест 1 возвращает новый URl
    * имеет исходный url -$gl_url например http://test.ru/test/12/3.php
    * выбранные url -$url например test_img/1.jpg
    * результат http://test.ru/test/12/test_img/1.jpg
    */

    private static function test1($url){
        $gl_url=$_SESSION['url'];

        $path_parts = pathinfo($gl_url);

        $a=parse_url($url);


        if(!isset($a["host"])){

            //если в url нет ../ то делаем
            if (strpos($url, '../') === false) {

                //если в url первая  "/" то соеденяем по
                if(substr($url, 0, 1)=="/"){
                    return $path_parts['dirname'].$url;
                }else{
                    return $path_parts['dirname']."/".$url;
                }

            }
        };
       return $url;

    }

     /*
     * Тест 2 Тест 2 возвращает новый URl
     * имеет исходный url -$gl_url например http://test.ru/test/12/3.php
     * выбранные url -$url например ../../test_img/1.jpg
     * результат http://test.ru/test_img/1.jpg
     */

    private static function test2($url){
        $gl_url=$_SESSION['url'];
        $path_parts = pathinfo($gl_url);

        $a=parse_url($url);

        //Проверяем первичное условие есть ли в url имя и является ли адрес относительным ../
        function conditions($url)
        {
            if (!isset($a["host"])) {

                //если в url нет ../ то делаем

                if (substr_count($url, '../') != 0) {

                    return true;
                }
            }
        };
        //рекурсивная функция из Url http://rnk.ru/test/55/6 отсикает $quantity '/' с конца
        //$quantity=1 вернет http://rnk.ru/test/55
        //$quantity=2 вернет http://rnk.ru/test
        function trim_down($url,$quantity)
        {
            $a= strripos($url,'/');
            $url_n= substr($url,0,$a);
            $quantity=$quantity-1;


            if($quantity>0){ return trim_down($url_n,$quantity);};
            if($quantity==0){ return $url_n;};
        };

        if(conditions($url)){
             $quantity = substr_count($url, '../');


             $str_1=trim_down($gl_url,$quantity+1);

             //удаляем все '../' в строке вида '../../img.jpg'
             $str_2 = str_replace("../", "", $url, $count);


             return ($str_1.'/'.$str_2);

        }
         return $url;

    }
    private static function test3($url){
        $gl_url=$_SESSION['url'];
        $a=parse_url($gl_url);
        $url_n=$a["scheme"]."://".$a["host"];

        //если в url первая  "/" то соеденяем по
        if(substr($url, 0, 1)=="/"){
            return $url_n.$url;
        }else{
            return $url_n."/".$url;
        }


    }

}
GetImages::request_Images("https://img.freepik.com/premium-photo/medical-workers-healthcare-covid-19-and-vaccination-concept_1258-19616.jpg");