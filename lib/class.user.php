<?php

class User {
	
	function __construct() {
		session_start();
	}
	
	function login($user_id,$username) {
		$_SESSION['user_id']  = $user_id;
		$_SESSION['username'] = $username;
		$this->logged = true;
	}
	
	function logout() {
		session_regenerate_id(TRUE);
		session_destroy();
	}
	
	function checkSessionCohesion() { // sprawdz spojnosc sesji
		global $db;
		
		$session_id = $this->getSessionId();
		$session_id = $db->real_escape_string($session_id);
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$check_ip_db = $db->query("SELECT * FROM `krzys` WHERE `session_id` = '$session_id'");
		if (!$check_ip_db)
			return FALSE;
		
		$check_ip = $check_ip_db->fetch_assoc();
		
		if ($check_ip['ip'] != $ip)
			return FALSE;
		else
			return TRUE;
	}
	
	function isLoggedIn() {
		if (isset($_SESSION['user_id'])) {
			return $this->checkSessionCohesion();
		} else {
			return FALSE;
		}
	}
	
	function getSessionId() {
		return session_id();
	}
	
	function getId() {
		return $_SESSION['user_id'];
	}
	
	function getUsername() {
		return $_SESSION['username'];
	}
	
	static function getHash($password, $salt) {
		$pass = $salt.$password.$salt;
		for ($i = 1; $i < 9999; $i++) {
			$pass = sha1($salt.$pass.$salt);
		}
		
		return $pass;
	}
	
	function getAvatarRandomName() {
		return sha1($this->getUsername().microtime());
	}
	
	function getNewEmailActivationCode() {
		return sha1(microtime().bin2hex(openssl_random_pseudo_bytes(16)));
	}
}
?>