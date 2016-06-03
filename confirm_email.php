<?php
require('config.php');
require('lib/class.router.php');
require('lib/Smarty.class.php');

if (!isset($_GET['code']) || !isset($_GET['email'])) {
    Router::redirect();
} else {
    $code = (!empty($_GET['code'])) ? $_GET['code'] : '';
    $code = $db->real_escape_string($code);
    $email = (filter_var($_GET['email'],FILTER_VALIDATE_EMAIL) && !empty($_GET['email'])) ? $_GET['email'] : '';
    $email = $db->real_escape_string($email);

    if (!empty($code) && !empty($email)) {
        $code_db = $db->query("SELECT * FROM `tygrysek` WHERE `old_email` = '$email' AND `code` = '$code'");

        if ($code_db->num_rows != 0) {
            $result = $code_db->fetch_assoc();
            $new_email = $result['new_email'];
            $new_email = $db->real_escape_string($new_email);
            $old_email = $result['old_email'];
            $old_email = $db->real_escape_string($old_email);

            $db->query("UPDATE `puchatek` SET `email` = '$new_email' WHERE `email` = '$old_email'");
            $tmp = $db->query("DELETE FROM `tygrysek` WHERE `old_email` = '$email' AND `code` = '$code'");

            if ($tmp)
                die('Adres email został zmieniony.'.Router::js_redirect());
        } else {
            die('Nieprawidłowy adres email i/lub kod aktywacyjny.'.Router::js_redirect());
        }
    } else {
        echo 'a';
        die('Nieprawidłowy adres email i/lub kod aktywacyjny.'.Router::js_redirect());
    }
}