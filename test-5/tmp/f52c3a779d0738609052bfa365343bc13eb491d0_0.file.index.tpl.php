<?php
/* Smarty version 3.1.32, created on 2018-05-03 03:17:20
  from 'C:\wamp64\www\test\SL\test-5\views\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5aea7f4094e9b5_92537490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f52c3a779d0738609052bfa365343bc13eb491d0' => 
    array (
      0 => 'C:\\wamp64\\www\\test\\SL\\test-5\\views\\index.tpl',
      1 => 1525317439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aea7f4094e9b5_92537490 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
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
            <button type="button" class="btn btn-default btn-sm">新增</button>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>
            <button type="button" class="btn btn-default btn-sm">修改</button>
            <button type="button" class="btn btn-default btn-sm">刪除</button>
        </td>
      </tr>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>
            <button type="button" class="btn btn-default btn-sm">修改</button>
            <button type="button" class="btn btn-default btn-sm">刪除</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>


<?php }
}
