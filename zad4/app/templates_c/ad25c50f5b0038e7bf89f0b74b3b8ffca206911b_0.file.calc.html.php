<?php
/* Smarty version 4.5.2, created on 2024-04-12 01:14:21
  from 'C:\xampp\htdocs\kalkulator-szablon\app\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_66186ecde37b82_78653807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad25c50f5b0038e7bf89f0b74b3b8ffca206911b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalkulator-szablon\\app\\calc.html',
      1 => 1712877256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66186ecde37b82_78653807 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_160940595166186ecddd89b1_09442982', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'content'} */
class Block_160940595166186ecddd89b1_09442982 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_160940595166186ecddd89b1_09442982',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<section id="main" class="container">
  <div class="col-12">
    <section class="box">
      <h3>Oblicz swoją ratę</h3>
      <div class="row gtr-uniform gtr-50">
        <div class="col-6 col-12-mobilep">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php">
            <label for="id_kwota">Kwota: </label>
            <input id="id_kwota" type="text" name="kwota" /><br />
            <label for="id_raty">Ilość Lat: </label>
            <input id="id_raty" type="text" name="raty" /><br />
            <label for="id_procent">Oprocentowanie: </label>
            <input id="id_procent" type="text" name="procent" /><br />
            <input type="submit" value="Oblicz" />
          </form>
        </div>
        <div class="col-6 col-12-mobilep">
           
		<?php if ($_smarty_tpl->tpl_vars['mess']->value->isError()) {?> 
			<ol style="margin: 2em auto; padding: 1em auto; border-radius: 5px; background-color: #f88;">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mess']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
			<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ol>
                <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['mess']->value->isInfo()) {?>
                        <ol style="margin: 2em auto; padding: 1em auto; border-radius: 5px; background-color: #8f8;">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mess']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
                        <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ol>
                <?php }?>
          <?php if (((isset($_smarty_tpl->tpl_vars['result']->value)))) {?>
          <div style="margin: 2em auto; padding: 2em auto; border-radius: 5px; background-color: #ff0;">
            Wynik: <?php echo round($_smarty_tpl->tpl_vars['result']->value,2);?>

          </div>
          <?php }?>
        </div>
      </div>
    </section>
  </div>
</section>
<?php
}
}
/* {/block 'content'} */
}
