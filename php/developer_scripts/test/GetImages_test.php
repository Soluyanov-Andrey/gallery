<?php
/**
 * 
 * Тестируем GetImages
 *
 */


class GetImages_test extends GetImages
{
    function __construct()
    {
       
        $url="https://infogra.ru/wp-content/uploads/2022/08/1StqFPBICfdW_YmcUH1s-YA-810x540.jpeg";
        
       
       //данные для corrective_step_1
        $url3= 'http://test.ru/test/12/3.php';
        $url4= 'test_img/1.jpg';
        
        //данные для corrective_step_2
        $url5= 'http://test.ru/test/12/3.php';
        $url6= '../../test_img/1.jpg';

        //данные для corrective_step_3
        $url1="/template/img/left-logo.png";
        $url2="https://zastavok.net/?ysclid=l764sqvgt028704337";


        $this->test1($url,150,200);

        
        $this->test2($url4,$url3);
        //вернет http://test.ru/test/12/test_img/1.jpg

        $this->test3($url6,$url5);
        //вернет http://test.ru/test_img/1.jpg

        $this->test4($url1,$url2);
        //вернет https://zastavok.net/template/img/left-logo.png
        $this->test5($url1,70,80);
    }
    private  function test1($url,$whith, $higth)
    {
        
        var_dump(GetImages::get_files($url,$whith, $higth));
    }
    private  function test2($url,$gl_url)
    {
        var_dump(GetImages::corrective_step_1($url, $gl_url));
        
       
    }
    private  function test3($url,$gl_url)
    {
        var_dump(GetImages::corrective_step_2($url, $gl_url));
    }

    private  function test4($url, $gl_url)
    {
        
        var_dump(GetImages::corrective_step_3($url, $gl_url));
    }
    private  function test5($url,$whith, $higth)
    {
        var_dump(GetImages::get_images_url($url,$whith, $higth));
        
    }
}