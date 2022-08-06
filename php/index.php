<?php
/**
 * 
 * Ключевой контролер, откуда начинается запуск.
 *
 */

include("init.php");

//Cоздаем ауто лоадер классов.Ищет в папке algorithms и в папке controller.
class CoreController
{
    function __construct()
    {
         
        define("URL_CLASS_ALGORITMS","algorithms/");
        define("URL_CLASS_CONTROLLER","controller/");

        spl_autoload_register('CoreController::AutoLoad');
        
        new engineController();
        
    }

    private static function AutoLoad($className) {
       
        $controllerDir = '';
        $modelDir = 'algorithms/';
        if (strpos($className, 'Controller') !== false) {
            $myclass = URL_CLASS_CONTROLLER . $className . '.php';
        } else {

            $myclass = URL_CLASS_ALGORITMS . $className . '.php';
           
        };
        if (!is_file($myclass)) return false;
       
        require_once($myclass);
    }

}

$object = new CoreController;