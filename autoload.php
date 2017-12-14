<?php
//$interfaces = glob(__DIR__ ."./class/{*.php}", GLOB_BRACE);
//
//foreach ($interfaces as $key => $interface)
//{
//    include_once($interface);
//}

//function __autoload($class) {
//    if (file_exists('/class'.$class . '.php')) {
//        include($class . '.php');
//        echo $class.'php';
//    } else {
//        throw new Exception('Unable to load class named $class');
//    }
//}
class autoload {
    static public function loader($className) {
        $filename = "" . str_replace("\\", "/", $className) . '.php';
        if (file_exists($filename)) {
            include($filename);
            if (class_exists($className)) {
                return TRUE;
            }
        }
        return FALSE;
    }
}
spl_autoload_register('autoload::loader');