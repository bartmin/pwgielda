<?php
/* Smarty version 3.1.29, created on 2016-06-03 22:39:08
  from "C:\xampp\htdocs\pwgielda\inc\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5751eaec2d6373_51482165',
  'file_dependency' => 
  array (
    '123c2840531f9a8b2065a601c50b5d261dc8e9b1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\index.tpl',
      1 => 1464986317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5751eaec2d6373_51482165 ($_smarty_tpl) {
?>
<h2 class="ui centered header">PWGiełda</h2>

<div class="ui feed">
	<?php
$_from = $_smarty_tpl->tpl_vars['entries']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entry_0_saved_item = isset($_smarty_tpl->tpl_vars['entry']) ? $_smarty_tpl->tpl_vars['entry'] : false;
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
$__foreach_entry_0_saved_local_item = $_smarty_tpl->tpl_vars['entry'];
?>
		<div class="event">
			<div class="label">
				<img class="ui medium right spaced avatar image" src="./img/avatars/<?php echo $_smarty_tpl->tpl_vars['entry']->value['avatar'];?>
" />
			</div>
			<div class="content">
				<div class="summary">
					<a><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->tpl_vars['entry']->value['user_id']];?>
</a>: <?php echo $_smarty_tpl->tpl_vars['entry']->value['title'];?>
 <div class="date"><?php echo date('d-m-Y',$_smarty_tpl->tpl_vars['entry']->value['date']);?>
 o <?php echo date('h-i');?>
</div>
				</div>
				<div class="extra text">
					<?php echo $_smarty_tpl->tpl_vars['entry']->value['content'];?>

				</div>
			</div>
		</div>
	<?php
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_0_saved_local_item;
}
if ($__foreach_entry_0_saved_item) {
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_0_saved_item;
}
?>
</div>

<!--
<h1 class="ui centered header">PWGiełda</h1>
<?php
$_from = $_smarty_tpl->tpl_vars['entries']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entry_1_saved_item = isset($_smarty_tpl->tpl_vars['entry']) ? $_smarty_tpl->tpl_vars['entry'] : false;
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
$__foreach_entry_1_saved_local_item = $_smarty_tpl->tpl_vars['entry'];
?>
<div class="ui segment">
	<a class="ui blue ribbon label">
		<img class="ui medium right spaced avatar image" src="./img/avatars/<?php echo $_smarty_tpl->tpl_vars['entry']->value['avatar'];?>
" />
		<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->tpl_vars['entry']->value['user_id']];?>

	</a>
	<span class="ui header"><?php echo $_smarty_tpl->tpl_vars['entry']->value['title'];?>
</span>
	<p><?php echo date('d-m-Y',$_smarty_tpl->tpl_vars['entry']->value['date']);?>
</p>
	<p></p>
	<p><?php echo $_smarty_tpl->tpl_vars['entry']->value['content'];?>
</p>
</div>
<?php
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_1_saved_local_item;
}
if ($__foreach_entry_1_saved_item) {
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_1_saved_item;
}
?>
--><?php }
}
