<?php
require('config.php');
require('lib/class.router.php');
require('lib/class.user.php');
require('lib/Smarty.class.php');

$user = new User();
if (!$user->isLoggedIn()) {
	Router::redirect('register.php');
	die();
}
$smarty = new Smarty();
$smarty->template_dir = 'inc/';

$user_id = $user->getId();
$data = $db->query("SELECT * FROM `puchatek` WHERE `id` = '$user_id'");
$data = $data->fetch_assoc();
$changed = FALSE;

if (isset($_POST['change'])) {
	// anty csrf
	$csrf = (isset($_POST['csrf'])) ? $_POST['csrf'] : '';
	if (!$user->checkCsrfToken($csrf))
		die('Zabezpieczenie anty-CSRF wykryło próbę nieautoryzowanego żądania.');
	else
		$user->setNewCsrfToken();

	$password = $_POST['password'];
	$new_password = $_POST['new_password'];
	$new_password2 = $_POST['new_password2'];
	$errors = array();
	$success = array();
	
	if ($new_password != $new_password2){
		$errors[] = 'Podane hasła muszą być identyczne.';
	}
	
	if ($user::getHash($password,$data['salt']) != $data['password'])
		$errors[] = 'Aktualne hasło różni się od podanego.';
	
	if (empty($errors)) {
		$salt = bin2hex(openssl_random_pseudo_bytes(16));
		$password = $user::getHash($new_password,$salt);
		$id = $user->getId();
		$result = $db->query("UPDATE `puchatek` SET `password` = '$password', `salt` = '$salt' WHERE `id` = '$id'");

		if ($result) {
			$success[] =  'Hasło zostało pomyślnie zmienione.';
			$changed = TRUE;
		} else {
			$errors[] = 'Błąd podczas zmiany hasła.';
		}
	}
} else if (isset($_POST['edit'])) {
	// anty csrf
	$csrf = (isset($_POST['csrf'])) ? $_POST['csrf'] : '';
	if (!$user->checkCsrfToken($csrf))
		die('Zabezpieczenie anty-CSRF wykryło próbę nieautoryzowanego żądania.');
	else
		$user->setNewCsrfToken();

	$errors = array();
	$success = array();
	$email = $data['email'];
	$about_me = (isset($_POST['about_me'])) ? $_POST['about_me'] : '';
	$avatar = (isset($_FILES['avatar'])) ? $_FILES['avatar'] : '';
	
	// Walidacja poprawności emaila
	if (isset($_POST['email'])) {
		if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
			$errors[] = 'Podany adres e-mail jest nieprawidłowy.';
		else
			$email = $_POST['email'];
	}
	
	if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
		$splFileInfo = new SplFileInfo($avatar['name']);
		$extension = strtolower($splFileInfo->getExtension());
		$size = $avatar['size'];
		
		if (in_array($extension,array('png','gif','jpg'))) {
			$filetype = mime_content_type($avatar['tmp_name']);
			
			if (in_array($filetype,array('image/gif','image/png','image/jpeg'))) {
				if ($size > 512000) {
					$errors[] = 'Maksymalny rozmiar pliku to 500kB.';
				}
			} else {
				$errors[] = 'Dopuszczalne typy plików to PNG, GIF i JPG.';
			}
		} else {
			$errors[] = 'Dopuszczalne typy plików to PNG, GIF i JPG.';
		}
	}
	
	if (empty($errors)) {
		// o mnie
		if (!empty($about_me) && $about_me != $data['about_me']) {
			$about_me = $db->real_escape_string(strip_tags($about_me));
			if (!$db->query("UPDATE `puchatek` SET `about_me` = '$about_me' WHERE `id` = '$user_id'"))
				$errors[] = 'Nie udało się zmienić opisu "O mnie"';
			else
				$success[] = 'Zapisano zmiany pola "O mnie"';
		}
		
		// email
		if (!empty($email) && $data['email'] != $_POST['email']) {
			$new_email = $db->real_escape_string($email);
			$old_email = $data['email'];
			$code = $user->getNewEmailActivationCode();

			// usun poprzednie prosby o zmiane adresu email
			$db->query("DELETE FROM `tygrysek` WHERE `old_email` = '$old_email'");
			$email_change_request = $db->query("INSERT INTO `tygrysek` VALUES(NULL, '$old_email','$new_email','$code')");
			$query_id = $db->insert_id;
			
			if ($email_change_request) {
				$smarty->assign('activation_code',$code);
				
				if (!mail($old_email,'Prośba o zmianę hasła',"<a href=\"http://localhost/pwgielda/confirm_email.php?email=$old_email&code=$code\">Zmień hasło</a>")) {
					$errors[] = 'Nie udało się wysłać wiadomości z prośbą o potwierdzenie zmiany adresu email. Spróbuj jeszcze raz.';
					
					$db->query("DELETE FROM `tygrysek` WHERE `id` = '$query_id'");
				} else {
					$success[] = 'Wiadomość z prośbą o potwierdzenie nowego adresu email została wysłana na aktualny adres. Sprawdź pocztę i potwierdź zmiany.';
				}
			}
		}
		
		// avatar
		if (!empty($avatar)) {
			if (is_uploaded_file($avatar['tmp_name'])) {
				$new_avatar = $user->getAvatarRandomName().'.'.$extension;
				if (move_uploaded_file($avatar['tmp_name'],'./img/avatars/'.$new_avatar)) {
					$db->query("UPDATE `puchatek` SET `avatar` = '$new_avatar' WHERE `id` = '$user_id'");
					unlink('./img/avatars/'.$data['avatar']);
					$success[] = 'Pomyślnie zmieniono avatar';
				} else {
					
				}
			}
		}
			
	}
}

// gdyby się coś w trakcie zmieniło...
$data = $db->query("SELECT * FROM `puchatek` WHERE `id` = '$user_id'");
$data = $data->fetch_assoc();
?>

<?php
// WIDOK
$smarty->display('header.tpl');
?>
<div class="ui grid">
<div class="row">
<div class="centered nine wide column">
<?php
if (isset($errors) && !empty($errors)) {
	$smarty->assign('error_title','Wystąpiły błędy przy aktualizacji profilu');
	$smarty->assign('error_description',$errors);
	$smarty->display('error_message.tpl');
} else if (isset($success) && !empty($success)) {
	$smarty->assign('success_title','Sukces');
	$smarty->assign('success_description',$success);
	$smarty->display('success_message.tpl');
}

if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		case 'password' :
			$smarty->assign('class','change_password');
			$smarty->display('change_password.tpl');
			break;
		case 'profile'	:
			$csrf = $user->getCsrfToken();

			$smarty->assign('csrf',$csrf);
			$smarty->assign('class','edit_profile');
			$smarty->assign('about_me',$data['about_me']);
			$smarty->assign('avatar',$data['avatar']);
			$smarty->assign('email',$data['email']);
			$smarty->display('edit_profile.tpl');
			break;
	}
}
?>
</div>
<div class="centered right floated three wide column">
<?php
if ($user->isLoggedIn()) {
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