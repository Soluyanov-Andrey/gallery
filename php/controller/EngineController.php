<?php
/**
 * 
 * Ключевой контролер, откуда начинается запуск.
 *
 */
include("php/init.php");


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
        
        $algorithms        = DOCUMENT_ROOT_PHP.URL_CLASS_ALGORITMS.$className.'.php';
        $controller        = DOCUMENT_ROOT_PHP.URL_CLASS_CONTROLLER.$className.'.php';
        $parser            = DOCUMENT_ROOT_PHP.URL_CLASS_PARSER.$className.'.php';
        $transformingSteps = DOCUMENT_ROOT_PHP.URL_CLASS_TRANSFORMING_STEPS.$className.'.php';
        $fileHandling      = DOCUMENT_ROOT_PHP.URL_CLASS_FILE_HANDLING.$className.'.php';
        $view              = DOCUMENT_ROOT_PHP.URL_CLASS_VIEW.$className.'.php';

         (is_file($algorithms)) ? require_once($algorithms): false;
         (is_file($controller)) ? require_once($controller): false;
         (is_file($parser)) ? require_once($parser): false;
         (is_file($transformingSteps)) ? require_once($transformingSteps): false;
         (is_file($fileHandling)) ? require_once($fileHandling): false;
         (is_file($view)) ? require_once($view): false;
    }

}

$object = new EngineController;

