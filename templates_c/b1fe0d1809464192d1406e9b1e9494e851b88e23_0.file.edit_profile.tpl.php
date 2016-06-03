<?php
/* Smarty version 3.1.29, created on 2016-06-03 21:50:13
  from "C:\xampp\htdocs\pwgielda\inc\edit_profile.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5751df75af4f59_32696628',
  'file_dependency' => 
  array (
    'b1fe0d1809464192d1406e9b1e9494e851b88e23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\edit_profile.tpl',
      1 => 1464983151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5751df75af4f59_32696628 ($_smarty_tpl) {
?>
<form action="./edit_profile.php?action=profile" method="post" class="ui form" enctype="multipart/form-data">
	<h3 class="ui header">Edytuj profil</h3>
	
	<div class="field"><label for="email">Email:</label><input type="email" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" /></div>
	
	<div class="field">
		<label>O mnie:</label>
		<textarea name="about_me"><?php echo $_smarty_tpl->tpl_vars['about_me']->value;?>
</textarea>
	</div>
	
	<div class="ui grid">
		<div class="six wide column">
			<label>Nowy avatar:</label>
			<input type="file" name="avatar" id="avatar" /></br />
			<div class="ui small label">Awatar może być w formacie JPG, GIF lub PNG.</div>
		</div>
		
		<div class="six wide column">
			<?php if ($_smarty_tpl->tpl_vars['avatar']->value != '') {?><img src="./img/avatars/<?php echo $_smarty_tpl->tpl_vars['avatar']->value;?>
" alt="awatar" /><?php } else { ?><p>Avatar nie został ustawiony.</p><?php }?>
		</div>
	</div>

	<input type="hidden" name="csrf" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="submit" name="edit" value="Zapisz" class="ui button" />
</form><?php }
}
