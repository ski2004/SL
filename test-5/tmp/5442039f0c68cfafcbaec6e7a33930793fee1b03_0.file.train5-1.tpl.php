<?php
/* Smarty version 3.1.32, created on 2018-05-03 09:39:33
  from 'C:\wamp64\www\test\SL\test-5\views\train5-1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5aead8d5bcadc0_72748397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5442039f0c68cfafcbaec6e7a33930793fee1b03' => 
    array (
      0 => 'C:\\wamp64\\www\\test\\SL\\test-5\\views\\train5-1.tpl',
      1 => 1525340371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5aead8d5bcadc0_72748397 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<head>
  <?php echo '<script'; ?>
>
    function url(param){
      let url = (!!param)? 'train5-2.php?'+param  : 'train5-2.php'  ;
      window.location = url;
    }
  <?php echo '</script'; ?>
>
</head>
<body>

<div class="container">
  <h2>通訊錄 DB 版本</h2>
  
  <table class="table">
    <thead>
      <tr>
        <th>姓名</th>
        <th>身分證</th>
        <th>生日</th>
        <th>電話</th>
        <th>郵遞區號</th>
        <th>住址</th>
        <th>
            <button type="button" class="btn btn-default btn-sm" onclick="url()" >新增</button>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usr']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
        
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['identity'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['birth'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['tel'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['post_code'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
</td>
        <td>
            <button type="button" class="btn btn-default btn-sm" onclick="url('uid=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
')" >修改</button>
            <button type="button" class="btn btn-default btn-sm">刪除</button>
        </td>
      </tr>      
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
    </tbody>
  </table>
</div>

</body>



<?php }
}
