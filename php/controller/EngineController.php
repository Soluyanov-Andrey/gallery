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
 define("URL_CLASS_TRANSFORMING_STEPS","algorithms/transformingSteps/");
 define("URL_CLASS_SAVE_FAIL","algorithms/fileHandling/");
 define("URL_CLASS_VIEW","algorithms/view/");

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
        $transformingSteps = DOCUMENT_ROOT_PHP.URL_CLASS_TRANSFORMING_STEPS.$className.'.php';
        $fileHandling = DOCUMENT_ROOT_PHP.URL_CLASS_SAVE_FAIL.$className.'.php';
        $view = DOCUMENT_ROOT_PHP.URL_CLASS_VIEW.$className.'.php';

         (is_file($algorithms)) ? require_once($algorithms): false;
         (is_file($controller)) ? require_once($controller): false;
         (is_file($parser)) ? require_once($parser): false;
         (is_file($transformingSteps)) ? require_once($transformingSteps): false;
         (is_file($fileHandling)) ? require_once($fileHandling): false;
         (is_file($view)) ? require_once($view): false;
    }

}

$object = new EngineController;

