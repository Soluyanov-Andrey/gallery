<?php
/**
 * 
 * Ключевой контролер, откуда начинается запуск.
 *
 */
 define("URL_CLASS_ALGORITMS","algorithms/");
 define("DOCUMENT_ROOT",$_SERVER['DOCUMENT_ROOT']);
 define("DOCUMENT_ROOT_PHP",$_SERVER['DOCUMENT_ROOT']."php/");
 define("URL_CLASS_ALGORITMS","algorithms/");
 define("URL_CLASS_PARSER","algorithms/parser/");
 define("URL_CLASS_CONTROLLER","controller/");
 define("URL_CLASS_TRANSFORMING_STEPS","algorithms/transforming_steps/");
 

// Cоздаем ауто лоадер классов.
class EngineController
{
    function __construct()
    {
        
        spl_autoload_register('EngineController::AutoLoad');
        //Если запускаются тесты, то CoreController() не срабатывает
        if(!TEST_MODE){new CoreController();};
      
    }

    private static function AutoLoad($className) {
        
        $algorithms = DOCUMENT_ROOT_PHP.URL_CLASS_ALGORITMS.$className.'.php';
        $controller = DOCUMENT_ROOT_PHP.URL_CLASS_CONTROLLER.$className.'.php';
        $parser = DOCUMENT_ROOT_PHP.URL_CLASS_PARSER.$className.'.php';
        $transforming_steps = DOCUMENT_ROOT_PHP.URL_CLASS_TRANSFORMING_STEPS.$className.'.php';
        
         (is_file($algorithms)) ? require_once($algorithms): false;
         (is_file($controller)) ? require_once($controller): false;
         (is_file($parser)) ? require_once($parser): false;
         (is_file($transforming_steps)) ? require_once($transforming_steps): false;
    }

}

$object = new EngineController;

