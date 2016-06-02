<?php
class Router {
    // przykladowe uzycie:
    // Router::redirect('index.php','arg1=1&arg2=costam');
    static function redirect($filename = '', $arguments = '') {
        $arguments = ($arguments == '') ? '' : '?'.$arguments;
        header('Location: ./'.$filename.$arguments);
    }

    static function link($filename = '', $arguments = '') {
        $arguments = ($arguments == '') ? '' : '?'.$arguments;
        return './'.$filename.$arguments;
    }
}
?>