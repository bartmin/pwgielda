<?php
/* Smarty version 3.1.29, created on 2016-06-03 21:46:00
  from "C:\xampp\htdocs\pwgielda\inc\edit_form.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5751de78aef361_42235576',
  'file_dependency' => 
  array (
    '952bbc4c361e8385c99c4c0fa8d0c1c77dadd152' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\edit_form.tpl',
      1 => 1464983154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5751de78aef361_42235576 ($_smarty_tpl) {
?>
<form action="./my_content.php" method="post" class="ui form">
    <h3 class="ui header">Dodaj ogłoszenie</h3>

    <div class="required field">
        <label for="title">Tytuł:</label>
        <input type="text" name="title" id="title" required value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
">
    </div>

    <div class="required field">
        <label for="content">Treść:</label>
        <textarea name="content" id="content" required><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</textarea>
    </div>

    <input type="hidden" name="csrf" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
    <input type="hidden" name="post_id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
    <input type="submit" name="edit" value="Dodaj" class="ui button">
</form><?php }
}
