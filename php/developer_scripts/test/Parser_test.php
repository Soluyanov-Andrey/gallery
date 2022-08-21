<?php
/**
 * 
 * Ключевой контролер, откуда начинается запуск.
 *
 */

// Cоздаем ауто лоадер классов.
class Parser_test extends Parser
{
    function __construct()
    {
        $url="infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
        $url1="http://infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";

        $this->test1($url);
        $this->test2($url);
        $this->test3($url);
        $this->test4($url1);
        
    }
    private  function test1($url)
    {
        
        var_dump(Parser::corrective_step_1($url));
        echo('--------------------------------');
    }
    private  function test2($url)
    {
        
        var_dump(Parser::corrective_step_2($url));
        echo('--------------------------------');
    }
    private  function test3($url)
    {
        
        var_dump(Parser::corrective_step_3($url));
        echo('--------------------------------');
    }

    private  function test4($url)
    {
        
        var_dump(Parser::Search_Img($url));
        echo('--------------------------------');
    }
}