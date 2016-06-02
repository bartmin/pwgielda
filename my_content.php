<?php
require('config.php');
require('lib/class.user.php');
require('lib/class.router.php');
require('lib/Smarty.class.php');

$user = new User();
$smarty = new Smarty();
$smarty->template_dir = 'inc/';


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
	
	if (!empty($title) && !empty($content)) {
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
	
}


$entries_db = $db->query("SELECT * FROM `klapouchy` WHERE `user_id` = '".$user->getId()."' ORDER BY `date` DESC");
$entries = $entries_db->fetch_all(MYSQLI_ASSOC);

foreach ($entries as $k=>$v) {
	$entries[$k]['edit_link'] = Router::link('my_content.php','action=edit&id='.$v['id']);
	$entries[$k]['remove_link'] = Router::link('my_content.php','action=delete&id='.$v['id']);
}


// WIDOK
$smarty->display('header.tpl');
?>
<div class="ui grid">
<div class="row">
<div class="centered nine wide column">
	<?php 
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
			case 'add' :
				$smarty->display('add_form.tpl');
				break;
			case 'edit':
				$id = $db->real_escape_string($_GET['id']);
				$entry_db = $db->query("SELECT * FROM `klapouchy` WHERE `id` = '$id'");
				$entry = $entry_db->fetch_assoc();

				$smarty->assign('title',$entry['title']);
				$smarty->assign('content',$entry['content']);
				$smarty->display('edit_form.tpl');
				break;
			case 'delete':
				$id = $db->real_escape_string($_GET['id']);
				$user_id = $user->getId();
				// teraz zabezpieczmy sie przez SQL injection i usuwaniem postow innych userow
				$delete_db = $db->query("DELETE FROM `klapouchy` WHERE `id` = '$id' AND `user_id` = '$user_id'");

				if ($db->affected_rows > 0) {
					$smarty->assign('success_title','Sukces');
					$smarty->assign('success_description',array('Wpis został usunięty. Odśwież stronę, aby zobaczyć zmiany.'));
					$smarty->display('success_message.tpl');
				}

				$smarty->assign('entries',$entries);
				$smarty->display('my_content.tpl');

				break;
			default:
				$smarty->assign('entries',$entries);
				$smarty->display('my_content.tpl');
				break;
		}
	} else {
		$smarty->assign('entries',$entries);
		$smarty->display('my_content.tpl');
	}
	?>
</div>
<div class="centered right floated three wide column">
<?php
if (!$user->isLoggedIn())
	$smarty->display('login.tpl');
else {
	$smarty->assign('username',$user->getUsername());
	$smarty->assign('class','my_content');
	$smarty->display('user_panel.tpl');
}
?>
</div>
</div>

</div>
<?php
$smarty->display('footer.tpl');
?>