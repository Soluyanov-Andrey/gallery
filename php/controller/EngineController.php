<?php
/**
 * 
 * Ключевой контролер, откуда начинается запуск.
 *
 */

// Cоздаем ауто лоадер классов.
class EngineController
{
    function __construct()
    {
         
        define("URL_CLASS_ALGORITMS","algorithms/");
        define("URL_CLASS_PARSER","algorithms/parser/");
        define("URL_CLASS_CONTROLLER","controller/");
        
        spl_autoload_register('EngineController::AutoLoad');

        new CoreController();
        
    }

    private static function AutoLoad($className) {
       
        $algorithms = URL_CLASS_ALGORITMS.$className.'.php';
        $controller = URL_CLASS_CONTROLLER.$className.'.php';
        $parser = URL_CLASS_PARSER.$className.'.php';

         (is_file($algorithms)) ? require_once($algorithms): false;
         (is_file($controller)) ? require_once($controller): false;
         (is_file($parser)) ? require_once($parser): false;
        
    }

}

$object = new EngineController;

