<?php
/* Smarty version 3.1.29, created on 2016-06-01 11:25:44
  from "C:\xampp\htdocs\pwgielda\inc\user_panel.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574eaa184280e6_11391594',
  'file_dependency' => 
  array (
    '194743bd22e8ab659410d06ce792f881c9d18ac8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\user_panel.tpl',
      1 => 1464773143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574eaa184280e6_11391594 ($_smarty_tpl) {
?>
<div class="ui blue vertical pointing menu">
	<div class="ui center aligned header item"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</div>
	<a class="<?php if ($_smarty_tpl->tpl_vars['class']->value == 'edit_profile') {?>active <?php }?>item" href="./edit_profile.php?action=profile">Edytuj profil</a>
	<a class="<?php if ($_smarty_tpl->tpl_vars['class']->value == 'change_password') {?>active <?php }?>item" href="./edit_profile.php?action=password">Zmień hasło</a>
	<a class="<?php if ($_smarty_tpl->tpl_vars['class']->value == 'my_content') {?>active <?php }?>item" href="./my_content.php">Moje ogłoszenia</a>
	<a class="<?php if ($_smarty_tpl->tpl_vars['class']->value == 'logout') {?>active <?php }?>item" href="./logout.php">Wyloguj</a>
</div><?php }
}
