<?php
require('lib/class.user.php');
require('lib/class.router.php');

$user = new User();
$user->logout();

Router::redirect();
?>