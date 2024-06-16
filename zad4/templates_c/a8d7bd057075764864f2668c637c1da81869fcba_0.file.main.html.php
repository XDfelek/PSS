<?php
/* Smarty version 4.5.2, created on 2024-04-12 01:07:51
  from 'C:\xampp\htdocs\kalkulator-szablon\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_66186d47532dc1_08828506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8d7bd057075764864f2668c637c1da81869fcba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalkulator-szablon\\templates\\main.html',
      1 => 1712876476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66186d47532dc1_08828506 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>Kalkulator Kredytowy</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <link rel="stylesheet" href=
          "<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css">
  </head>
  <body class="landing is-preload">
    <div id="page-wrapper">
      <!-- Header -->
      <header id="header" class="alt">
        <h1><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
">Alpha</a> by HTML5 UP</h1>
        <nav id="nav">
          <ul>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
">Home</a></li>
          </ul>
        </nav>
      </header>

      <!-- Banner -->
      <section id="banner">
        <h2>Kalkulator Kredytowy</h2>
      </section>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_203005283766186d47532733_17744610', 'content');
?>


      <footer id="footer">
		<ul class="copyright">
			<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
		</ul>
	 </footer>

</body>
</html>
<?php }
/* {block 'content'} */
class Block_203005283766186d47532733_17744610 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_203005283766186d47532733_17744610',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
