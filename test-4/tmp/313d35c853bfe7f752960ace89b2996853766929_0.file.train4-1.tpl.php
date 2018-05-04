<?php
/* Smarty version 3.1.32, created on 2018-05-04 07:50:52
  from 'C:\wamp64\www\test\SL\test-4\views\train4-1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5aec10dca4a787_21321269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '313d35c853bfe7f752960ace89b2996853766929' => 
    array (
      0 => 'C:\\wamp64\\www\\test\\SL\\test-4\\views\\train4-1.tpl',
      1 => 1525418676,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5aec10dca4a787_21321269 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<head>
  <?php echo '<script'; ?>
>
    function url(param){
      console.log(param)
      let url = (!!param)? 'train4-2.php?uid='+param  : 'train4-2.php'  ;
      window.location = url;
    }

 

    function del(uid){
      var data = { 
        action: 'del' ,
        id: uid ,
      }
      sendAjax('POST' , data , finish );
    }

    function finish(res){
      var data = JSON.parse(res) ;
      errorCode(data["code"]) ;
    }
  <?php echo '</script'; ?>
>
</head>
<body>

<div class="container">
  <h2>檔案存取,資料加密</h2>
  
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usr']->value, 'data', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
        
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value[0];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value[1];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value[2];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value[3];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value[4];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value[5];?>
</td>
        <td>
            <button type="button" class="btn btn-default btn-sm" onclick="url('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
')" >修改</button>
            <button type="button" class="btn btn-default btn-sm" onclick="del('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
')">刪除</button>
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
