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
        
        define("DOCUMENT_ROOT",$_SERVER['DOCUMENT_ROOT']."php/");

        define("URL_CLASS_ALGORITMS","algorithms/");
        define("URL_CLASS_PARSER","algorithms/parser/");
        define("URL_CLASS_CONTROLLER","controller/");
        define("TEST_CLASS_CONTROLLER","developer_scripts/");
        
        spl_autoload_register('EngineController::AutoLoad');

        new CoreController();
        
    }

    private static function AutoLoad($className) {
       
        $algorithms = DOCUMENT_ROOT.URL_CLASS_ALGORITMS.$className.'.php';
        $controller = DOCUMENT_ROOT.URL_CLASS_CONTROLLER.$className.'.php';
        $parser = DOCUMENT_ROOT.URL_CLASS_PARSER.$className.'.php';
        $test = DOCUMENT_ROOT.TEST_CLASS_CONTROLLER.$className.'.php';

         (is_file($algorithms)) ? require_once($algorithms): false;
         (is_file($controller)) ? require_once($controller): false;
         (is_file($parser)) ? require_once($parser): false;
         (is_file($test)) ? require_once($test): false;
    }

}

$object = new EngineController;

