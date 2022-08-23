<?php
/**
 * 
 * Ключевой контролер, откуда запускаем тесты.
 *
 */


class TestController
{
    function __construct()
    {

        new GetImages_test();
        //new Parser_test();
      

        
    }
   
  

}

