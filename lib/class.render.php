<?php
class Render {
	private $prefix = 'inc/';
	
	function showLoginForm() {
		include($this->prefix.'login.tpl');
	}
	
	function showRegistrationForm() {
		include($this->prefix.'register.tpl');
	}
	
	function showHeader() {
		include($this->prefix.'header.tpl');
	}
	
	function showFooter() {
		include($this->prefix.'footer.tpl');
	}
	
	function showUserPanel() {
		include($this->prefix.'user_panel.tpl');
	}
	
	function showPasswordChangeForm() {
		include($this->prefix.'change_password.tpl');
	}
	
}
?>