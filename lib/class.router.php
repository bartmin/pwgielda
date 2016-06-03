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

    static function js_redirect($filename = '', $arguments = '',$time = 2000) {
        $code = "<script>setTimeout('location.assign(\"./$filename?$arguments\")',$time);</script>";
        return $code;
    }
}
?>