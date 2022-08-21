<?php
/**
 * 
 * Тестируем Parser
 *
 */


class Parser_test extends Parser
{
    function __construct()
    {
        //$url="ru.pinterest.com/chernienkok/%D1%81%D0%B0%D0%B9%D1%82%D1%8B-%D1%80%D0%B8%D1%81%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5/";
        //$url="infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
        $url01="http://infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
        $url="http://in56fogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
        
        $this->test1($url);
        $this->test2($url);
        $this->test3($url);
        $this->test4($url01);
        $this->test5($url);
    }
    private  function test1($url)
    {
        
        var_dump(Parser::corrective_step_1($url));
        echo('test1--------------------------------');
    }
    private  function test2($url)
    {
        
        var_dump(Parser::corrective_step_2($url));
        echo('test2--------------------------------');
    }
    private  function test3($url)
    {
        
        var_dump(Parser::corrective_step_3($url));
        echo('test3--------------------------------');
    }

    private  function test4($url)
    {
        
        var_dump(Parser::Search_Img($url));
        echo('test4--------------------------------');
    }
    private  function test5($url)
    {
        
        var_dump(Parser::valid_Url($url));
        echo('test5--------------------------------');
    }
}