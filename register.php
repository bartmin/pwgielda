<?php
require('config.php');
require('lib/class.user.php');
require('lib/class.router.php');
require('lib/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = 'inc/';
$user = new User();

if ($user->isLoggedIn()) {
	// zabezpieczenie przed kradzieżą sesji
	$session_id = $user->getSessionId();
	$session_id = $db->real_escape_string($session_id);
	$ip = $_SERVER['REMOTE_ADDR'];

	$check_ip_db = $db->query("SELECT * FROM `krzys` WHERE `session_id` = '$session_id'");
	if (!$check_ip_db || $check_ip_db->num_rows == 0) {
		Router::redirect('logout.php');
		die();
	}

	$check_ip = $check_ip_db->fetch_assoc();

	if ($check_ip['ip'] != $ip)
		die('Ładnie to się tak podszywać pod innych?');

	// jezeli jednak ta sesja jest OK...
	Router::redirect();
	die();
}

if (isset($_POST['register'])) {
	$registered = FALSE;
	
	// zabezpieczenie przed brute-forcowaniem listy użytkowników
	sleep(rand(3,6));
	
	$smarty->assign('error_title','Błąd podczas rejestracji');
	$error_description = array();
	$error = FALSE;
	
	// sprawdzamy czy wszystkie pola są wypełnione i formularz niezmodyfikowany
	$fields = array('login','password','password2','email','email2');
	foreach ($fields as $v) {
		if (!isset($_POST[$v]) || empty($_POST[$v])) {
			$error_description[] = 'Wszystkie pola muszą być wypełnione.';
			$error = TRUE;
			break;
		}
	}
	
	// warunki na równość pól i poprawność emaili
	if ($_POST['password'] !== $_POST['password2']) {
		$error_description[] = 'Podane hasła muszą być identyczne.';
		$error = TRUE;
	}
	if ($_POST['email'] !== $_POST['email2']) {
		$error_description[] = 'Podane adresy email muszą być identyczne.';
		$error = TRUE;
	}
	if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) || !filter_var($_POST['email2'],FILTER_VALIDATE_EMAIL)) {
		$error_description[] = 'Podany adres email nie jest poprawny.';
		$error = TRUE;
	}
	if ($_POST['login'] != strip_tags($_POST['login'])) {
		$error_description[] = 'W loginie nie można używać tagów HTML.';
		$error = TRUE;
	}
	
	// sprawdzamy podany login - czy nie zajęty
	$login_db = $db->real_escape_string($_POST['login']);
	$check_login = $db->query("SELECT * FROM `puchatek` WHERE login='$login_db'");
	if ($check_login->num_rows != 0) {
		$error_description[] = 'Konto o takim loginie już istnieje w bazie.';
		$error = TRUE;
	}
	
	// test na siłę hasła
	
	if (!$error) {
		// solimy i hashujemy
		$salt = bin2hex(openssl_random_pseudo_bytes(16));
		$pass = User::getHash($_POST['password'],$salt);
		
		$login_db = $db->real_escape_string(strip_tags($_POST['login']));
		$pass_db = $db->real_escape_string($pass);
		$salt_db = $db->real_escape_string($salt); // może będę chciał mieć w soli znaki specjalne?
		$email_db = $db->real_escape_string(strip_tags($_POST['email'])); // czy strip_tags konieczne, skoro jest filter_var?
		$date_db = date('j-m-Y');
		
		$register_query = $db->query("INSERT INTO `puchatek` (login,password,salt,email,date_registered) VALUES('$login_db','$pass_db','$salt_db','$email_db','$date_db')");
		
		if ($register_query) {
			$registered = TRUE;
		} else {
			$error_description[] = 'Wystąpił błąd podczas rejestracji. Spróbuj ponownie.';
		}
	}
}
$db->close();

$login = (isset($_POST['login'])) ? $_POST['login'] : '';
$smarty->assign('login',$login);
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$smarty->assign('email',$email);
$email2 = (isset($_POST['email2'])) ? $_POST['email2'] : '';
$smarty->assign('email2',$email2);

// WIDOK
$smarty->display('header.tpl');
?>
<div class="ui grid">
<div class="row">
<div class="centered nine wide column">
<?php
if (isset($registered) && !$registered) {
	$smarty->assign('error_description',$error_description);
	$smarty->display('error_message.tpl');
} else if (isset($registered) && $registered) {
	$smarty->assign('success_title','Pomyślna rejestracja');
	$smarty->assign('success_description','Rejestracja przebiegła pomyślnie. Możesz się teraz <a href="./">zalogować</a>.');
	$smarty->display('success_message.tpl');
}

$smarty->display('register.tpl');
?>
</div>
</div>

</div>
<?php
$smarty->display('footer.tpl');

?>