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
        $url1="infogra.ru/wp-content/uploads/2022/07/1800-810x519.jpeg";
        $this->test1($url,150,200);
        $this->test1($url1,150,200);
        
    }
    private  function test1($url,$whith, $higth)
    {
        
        var_dump(GetImages::get_files($url,$whith, $higth));
    }
    private  function test2($url)
    {
        
       
    }
    private  function test3($url)
    {
       ;
    }

    private  function test4($url)
    {
        
        
    }
    private  function test5($url)
    {
        
        
    }
}