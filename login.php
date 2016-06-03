<?php
require('config.php');
require('lib/class.user.php');
require('lib/class.router.php');
require('lib/Smarty.class.php');

$user = new User();
$smarty = new Smarty();
$smarty->template_dir = 'inc/';

if (!isset($_POST['login']) || !isset($_POST['password'])) {
	Router::redirect();
	die();
}

if ($user->isLoggedIn()) {
	Router::redirect('register.php');
	die();
}

// godzinna blokada na logowanie
$ip = $db->real_escape_string($_SERVER['REMOTE_ADDR']);
$unblock = $db->query("SELECT `trials`,`unblock_date` FROM `prosiaczek` WHERE `ip` = '$ip'");
if ($unblock) {
	$unblock = $unblock->fetch_all(MYSQLI_ASSOC);
	$unblock = (empty($unblock)) ? array('unblock_date'=>NULL) : $unblock[0];
	if ($unblock['unblock_date'] != NULL && $unblock['unblock_date'] > time())
		die('Wykryto próbę ataku brute-force. Została założona czasowa blokada na logowanie.');
	else if ($unblock['unblock_date'] != NULL && $unblock['unblock_date'] < time())
		$db->query("DELETE FROM `prosiaczek` WHERE `ip` = '$ip'");
}

// opóźniamy bruteforcerów
sleep(rand(3,5));

// sprawdźmy, czy istnieje taki użytkownik
$login_db = $db->real_escape_string($_POST['login']);
$check_login = $db->query("SELECT * FROM `puchatek` WHERE login='$login_db'");
if ($check_login->num_rows === 1) {
	$data = $check_login->fetch_assoc();
	$pass_hash = $data['password'];
	$salt = $data['salt'];
	
	//hashujemy
	$pass = $user::getHash($_POST['password'],$salt);
	
	if ($pass_hash === $pass) {
		$user->login($data['id'],$data['login']);
		$ip = $db->real_escape_string($_SERVER['REMOTE_ADDR']);
		// zerujemy licznik nieudanych prób logowań. gdyby ktos chcial wykorzystac to
		// do bruteforcowania zakladajac sobie konto i zerujac ilosc prob, zawsze
		// jest ograniczony jeszcze sleep'em
		$db->query("DELETE FROM `prosiaczek` WHERE `ip` = '$ip'");
		
		// ustawiamy zabezpieczenie na kradniecie sesji; przy okazji od razu usunmy
		// pozostawione wczesniej sesje z tabeli (nie ma opcji 'Nie wylogowuj mnie'), bo user
		// mogl po prostu nie kliknac 'Wyloguj', lecz zamknac okno
		$db->query("DELETE FROM `krzys` WHERE `ip` = '$ip'");
		$session_id = $user->getSessionId();
		$session_id = $db->real_escape_string($session_id);

		// ustaw nowy token CSRF
		$csrf = $user->setNewCsrfToken();
		$csrf = $db->real_escape_string($csrf);
		$db->query("INSERT INTO `krzys` VALUES(NULL,'$session_id','$ip','$csrf')");

		Router::redirect();
	} else {
		$ip = $db->real_escape_string($_SERVER['REMOTE_ADDR']);
		$trials_db = $db->query("SELECT `trials` FROM `prosiaczek` WHERE `ip` = '$ip'");
		$trials = $trials_db->fetch_row();
		
		$trials = $trials[0] + 1;
		
		if ($trials > 10)
			$unblock = time() + 60;
		else
			$unblock = NULL;
		
		if ($trials_db->num_rows == 0)
			$db->query("INSERT INTO `prosiaczek` VALUES(NULL,'$login_db','$ip','$trials','$unblock')");
		else if ($trials_db->num_rows > 0) {
			$db->query("UPDATE `prosiaczek` SET `trials` = '$trials', `unblock_date` = '$unblock' WHERE `ip` = '$ip' AND `login` = '$login_db'");
		}
		
		$message = '<p>Podano błędny login i/lub hasło.</p>';
	}
} else {
	$message = '<p>Podano błędny login i/lub hasło.</p>';
}

$smarty->display('header.tpl');
?>
	<div class="ui grid">
		<div class="ui four wide centered column">
<?php
if (isset($message)) {
	$smarty->assign('error_description',$message);
	$smarty->assign('error_title','Błąd podczas logowania');
	$smarty->display('error_message.tpl');
}

$smarty->display('login.tpl');
?>
	</div>
</div>
<?php
$smarty->display('footer.tpl');
?>