<?php
/**
 * 
 * Ключевой контролер, откуда начинается запуск.
 *
 */

// Cоздаем ауто лоадер классов.
class TestController
{
    function __construct()
    {

        
        new Parser_test();
    //echo(serialize($b));
    //     var_dump($b);
         //$v= $this->getimages($b);

        
    }
    private  function getimages($array_images)
    {
        new GetImages();
        GetImages::get_images_url($array_images);
    
    }
    private  function parser()
    {
       
        new Parser_test();

        // $url_gl="https://ru.pinterest.com/chernienkok/%D1%81%D0%B0%D0%B9%D1%82%D1%8B-%D1%80%D0%B8%D1%81%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5/";
        // var_dump(Parser::valid_Url($url_gl));
        
        //$url_gl="https://ru.freepik.com/popular-photos";
        // var_dump(Parser::valid_Url($url_gl));

         $url_gl="infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
        
         
         //echo(Parser::valid_Url($url_gl));
        //$url_gl="http://in56fogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
        //var_dump(Parser::valid_Url($url_gl));    
        
        //Parser::Url_Yes_No("http://in56fogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov");
         
         return Parser::valid_Url($url_gl);
    }

}

