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
        
        spl_autoload_register('EngineController::AutoLoad');
        //Если запускаются тесты, то CoreController() не срабатывает
        if(!TEST_MODE){new CoreController();};
      
    }

    private static function AutoLoad($className) {
        
        $algorithms = DOCUMENT_ROOT.URL_CLASS_ALGORITMS.$className.'.php';
        $controller = DOCUMENT_ROOT.URL_CLASS_CONTROLLER.$className.'.php';
        $parser = DOCUMENT_ROOT.URL_CLASS_PARSER.$className.'.php';
        $developer_controller = DOCUMENT_ROOT.DEVELOPER_CLASS_CONTROLLER.$className.'.php';
        $test = DOCUMENT_ROOT.TEST.$className.'.php';
        
         (is_file($algorithms)) ? require_once($algorithms): false;
         (is_file($controller)) ? require_once($controller): false;
         (is_file($parser)) ? require_once($parser): false;
         (is_file($developer_controller)) ? require_once($developer_controller): false;
         (is_file($test)) ? require_once($test): false;
    }

}

$object = new EngineController;

