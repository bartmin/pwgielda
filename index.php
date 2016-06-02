<?php
require('config.php');
require('lib/class.user.php');
require('lib/class.router.php');
require('lib/Smarty.class.php');

$user = new User();
$smarty = new Smarty();
$smarty->template_dir = 'inc/';

$entries_db = $db->query("SELECT * FROM `klapouchy` ORDER BY `date` DESC");
$users_db = $db->query("SELECT `id`,`login` FROM `puchatek`");
$entries = $entries_db->fetch_all(MYSQLI_ASSOC);
$users_tmp = $users_db->fetch_all(MYSQLI_ASSOC);
$users = array();

foreach ($users_tmp as $k=>$a) {
	$users[$a['id']] = $a['login'];
}

$smarty->display('header.tpl');
?>
<div class="ui grid">
<div class="row">
<div class="centered nine wide column">
<?php
if (!$user->isLoggedIn())
	$smarty->assign('user_profile',FALSE);
else
	$smarty->assign('user_profile',TRUE);
$smarty->assign('users',$users);
$smarty->assign('entries',$entries);
$smarty->display('index.tpl');
?>
</div>
<div class="centered right floated three wide column">
<?php
if (!$user->isLoggedIn())
	$smarty->display('login.tpl');
else {
	$smarty->assign('username',$user->getUsername());
	$smarty->display('user_panel.tpl');
}
?>
</div>
</div>
</div>
<?php
$smarty->display('footer.tpl');
?>