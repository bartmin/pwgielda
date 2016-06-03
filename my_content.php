<?php
require('config.php');
require('lib/class.user.php');
require('lib/class.router.php');
require('lib/Smarty.class.php');

$user = new User();
$smarty = new Smarty();
$smarty->template_dir = 'inc/';

// Musimy mieć przez cały czas możliwość przekierowania usera
$page = '';


if (!$user->isLoggedIn()) {
	Router::redirect('register.php');
	die();
}

$data = $db->query("SELECT * FROM `puchatek` WHERE `login`='".$user->getId()."'");

if (isset($_POST['add'])) {
	$errors = array();
	$success = array();
	
	$title = (isset($_POST['title'])) ? $_POST['title'] : '';
	$content = (isset($_POST['content'])) ? $_POST['content'] : '';
	$csrf = (isset($_POST['csrf'])) ? $_POST['csrf'] : '';
	
	if (!empty($title) && !empty($content) && !empty($csrf)) {
		// zabezpieczenia anty-csrf
		if (!$user->checkCsrfToken($csrf))
			die('Zabezpieczenie anty-CSRF wykryło próbę nieautoryzowanego żądania.'.Router::js_redirect('my_content.php'));
		else
			$user->setNewCsrfToken();

		$title = strip_tags($title);
		$content = strip_tags($content);
		
		$title_db = $db->real_escape_string($title);
		$content_db = $db->real_escape_string($content);
		$user_id = $user->getId();
		$date_db = time();
		
		$result_add = $db->query("INSERT INTO `klapouchy` VALUES (NULL,'$user_id','$title_db','$content_db','$date_db')");
		
		if ($result_add)
			$success[] = 'Pomyślnie dodano nowe ogłoszenie';
		else
			$errors[] = 'Nie udało się dodać ogłoszenia';
	} else {
		$errors[] = 'Oba pola muszą być wypełnione';
	}
	Router::redirect('my_content.php');
} else if (isset($_POST['edit'])) {
	$errors = array();
	$success = array();

	$post_id = (isset($_POST['post_id'])) ? $_POST['post_id'] : '';
	$title = (isset($_POST['title'])) ? $_POST['title'] : '';
	$content = (isset($_POST['content'])) ? $_POST['content'] : '';
	$csrf = (isset($_POST['csrf'])) ? $_POST['csrf'] : '';
	if (!empty($title) && !empty($content) && !empty($csrf) && !empty($post_id)) {
		// zabezpieczenia anty-csrf
		if (!$user->checkCsrfToken($csrf))
			die('Zabezpieczenie anty-CSRF wykryło próbę nieautoryzowanego żądania.'.Router::js_redirect('my_content.php'));
		else
			$user->setNewCsrfToken();

		$title = strip_tags($title);
		$content = strip_tags($content);

		$title_db = $db->real_escape_string($title);
		$content_db = $db->real_escape_string($content);
		$user_id = $user->getId();

		// teraz zabezpieczmy sie przez SQL injection i usuwaniem postow innych userow
		$result_add = $db->query("UPDATE `klapouchy` SET `title` = '$title_db', `content` = '$content_db' WHERE `id` = '$post_id' AND `user_id` = '$user_id'");
		// zmieniamy token CSRF
		$new_csrf = $user->setNewCsrfToken();

		if ($result_add)
			$success[] = 'Pomyślnie dodano nowe ogłoszenie';
		else
			$errors[] = 'Nie udało się dodać ogłoszenia';
	} else {
		$errors[] = 'Oba pola muszą być wypełnione';
	}

	Router::redirect('my_content.php');
}


$entries_db = $db->query("SELECT * FROM `klapouchy` WHERE `user_id` = '".$user->getId()."' ORDER BY `date` DESC");
$entries = $entries_db->fetch_all(MYSQLI_ASSOC);

foreach ($entries as $k=>$v) {
	$entries[$k]['edit_link'] = Router::link('my_content.php','action=edit&id='.$v['id']);
	$entries[$k]['remove_link'] = Router::link('my_content.php','action=delete&id='.$v['id'].'&csrf='.$user->getCsrfToken());
}


// WIDOK
$page .= $smarty->fetch('header.tpl');
$page .= <<<EOT
<div class="ui grid">
<div class="row">
<div class="centered nine wide column">
EOT;

if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		case 'add' :
			$csrf = $user->setNewCsrfToken();

			$smarty->assign('csrf',$csrf);
			$page .= $smarty->fetch('add_form.tpl');
			break;
		case 'edit':
			if (!isset($_GET['id']) || !is_numeric($_GET['id']))
				Router::redirect('my_content.php');

			$id = $db->real_escape_string($_GET['id']);
			$entry_db = $db->query("SELECT * FROM `klapouchy` WHERE `id` = '$id'");
			$entry = $entry_db->fetch_assoc();
			$csrf = $user->setNewCsrfToken();

			$smarty->assign('csrf',$csrf);
			$smarty->assign('id',$id);
			$smarty->assign('title',$entry['title']);
			$smarty->assign('content',$entry['content']);
			$page .= $smarty->fetch('edit_form.tpl');
			break;
		case 'delete':
			if (!isset($_GET['id']) || !is_numeric($_GET['id']))
				Router::redirect('my_content.php');

			$id = $db->real_escape_string($_GET['id']);
			$csrf = (isset($_GET['csrf'])) ? $_GET['csrf'] : '';
			$user_id = $user->getId();
			// sprawdzamy token CSRF
			if ($user->checkCsrfToken($csrf)) {
				// teraz zabezpieczmy sie przez SQL injection i usuwaniem postow innych userow
				$delete_db = $db->query("DELETE FROM `klapouchy` WHERE `id` = '$id' AND `user_id` = '$user_id'");
				// zmieniamy token CSRF
				$new_csrf = $user->setNewCsrfToken();
			} else {
				die('Zabezpieczenie anty-CSRF wykryło próbę nieautoryzowanego żądania.'.Router::js_redirect('my_content.php'));
			}

			if ($db->affected_rows > 0) {
				$smarty->assign('redirect_hack',Router::js_redirect('my_content.php'));
				$smarty->assign('success_title','Sukces');
				$smarty->assign('success_description',array('Wpis został usunięty.'));
				$page .= $smarty->fetch('success_message.tpl');
			}

			$smarty->assign('csrf',$new_csrf);
			$smarty->assign('entries',$entries);
			$page .= $smarty->fetch('my_content.tpl');

			break;
		default:
			$smarty->assign('entries',$entries);
			$page .= $smarty->fetch('my_content.tpl');
			break;
	}
} else {
	$smarty->assign('entries',$entries);
	$page .= $smarty->fetch('my_content.tpl');
}

$page .= <<<EOT
</div>
<div class="centered right floated three wide column">
EOT;

if (!$user->isLoggedIn())
	$page .= $smarty->fetch('login.tpl');
else {
	$smarty->assign('username',$user->getUsername());
	$smarty->assign('class','my_content');
	$page .= $smarty->fetch('user_panel.tpl');
}

$page .= <<<EOT
</div>
</div>
</div>
EOT;

$page .= $smarty->fetch('footer.tpl');

echo $page;
?>