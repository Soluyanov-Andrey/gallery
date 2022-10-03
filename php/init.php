<?php

define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
define("DOCUMENT_ROOT_PHP", $_SERVER['DOCUMENT_ROOT'] . "php/");

define("URL_CLASS_ALGORITMS", "algorithms/");
define("URL_CLASS_PARSER", "algorithms/parser/");
define("URL_CLASS_TRANSFORMING_STEPS", "algorithms/transformingSteps/");
define("URL_CLASS_FILE_HANDLING", "algorithms/fileHandling/");
define("URL_CLASS_VIEW", "algorithms/view/");
define("URL_CLASS_CONTROLLER", "controller/");

define('URL_FOLDER_INITIAL', DOCUMENT_ROOT . 'images/file_initial/');
define('URL_FOLDER_TMP', DOCUMENT_ROOT . 'images/tmp/');
define('URL_FILE_LOG', DOCUMENT_ROOT_PHP . 'cash_log_file/system.log');
define('URL_CASH_FILE', DOCUMENT_ROOT_PHP . 'cash_log_file/cash.txt');
define('NAME_TEMPORARY_FILE', 'test.');
define('URL_TEMPORARY_FILE', URL_FOLDER_INITIAL. NAME_TEMPORARY_FILE);
define("NAME_SMOLL_IMG","small.jpg");
define("TTF", DOCUMENT_ROOT . 'php/algorithms/transformingSteps/ofont.ru_Chekharda.ttf');
define("FILE_NAME_WATERMARK","watermark.jpg");

