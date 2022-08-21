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
   
  

}

