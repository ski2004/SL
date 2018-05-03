<?php
/* Smarty version 3.1.32, created on 2018-05-03 09:33:44
  from 'C:\wamp64\www\test\SL\test-5\views\train5-2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5aead778913a95_39859242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96b6aabc142a460199622e89bdf77c4952f7cb04' => 
    array (
      0 => 'C:\\wamp64\\www\\test\\SL\\test-5\\views\\train5-2.tpl',
      1 => 1525340021,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5aead778913a95_39859242 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<head>
<?php echo '<script'; ?>
>
    function back(param){
      let url =  'train5-1.php'  ;
      window.location = url;
    }
<?php echo '</script'; ?>
>
</head>
<body>

<div class="container">
  <h2>通訊錄 DB 版本</h2>
  <form action="train5-3.php" method="POST" >
  <table class="table">
    <thead>
      <tr>
        <th colspan="2" >
            <h2><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</h2>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>姓名</td>
        <td>
            <input name="name" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value['name'];?>
" >
        </td>
      </tr>
      <tr>
        <td>身分證</td>
        <td>
            <input name="identity" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value['identity'];?>
" >
        </td>
      </tr>
      <tr>
        <td>生日</td>
        <td>
            <input name="birth" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value['birth'];?>
" >
        </td>
      </tr>
      <tr>
        <td>電話</td>
        <td>
            <input name="tel" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value['tel'];?>
" >
        </td>
      </tr>
      <tr>
        <td>郵遞區號</td>
        <td>
            <input name="post_code" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value['post_code'];?>
" >
        </td>
      </tr>           
      <tr>
        <td>住址</td>
        <td>
            <input name="address" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value['address'];?>
" >
        </td>
      </tr>               
    </tbody>
    <tfoot>
      <tr>
        <th colspan="2" >
            <input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value['id'];?>
" >
            <button type="submit" class="btn btn-default btn-sm"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</button>
            <button type="button" class="btn btn-default btn-sm" onclick="back()" >取消</button>
        </th>
      </tr>
    </tfoot>
  </table>
  </form>
</div>

</body>



<?php }
}
