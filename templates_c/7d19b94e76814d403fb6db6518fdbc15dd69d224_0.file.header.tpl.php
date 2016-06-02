<?php
/* Smarty version 3.1.29, created on 2016-05-30 23:13:30
  from "C:\xampp\htdocs\pwgielda\inc\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574cacfa8e0310_85671458',
  'file_dependency' => 
  array (
    '7d19b94e76814d403fb6db6518fdbc15dd69d224' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\header.tpl',
      1 => 1464642809,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574cacfa8e0310_85671458 ($_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PWGiełda</title>
	<link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
	<?php echo '<script'; ?>
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="semantic/semantic.min.js"><?php echo '</script'; ?>
>
</head>
<body>

<div class="ui blue inverted menu">
  <div class="header item">
    MENU
  </div>
  <a class="item" href="./">
    Strona główna
  </a>
  <a class="item" href="./my_content.php?action=add">
    Dodaj ogłoszenie
  </a>
</div><?php }
}
