<?php
/* Smarty version 3.1.32, created on 2018-05-04 05:44:45
  from 'C:\wamp64\www\test\SL\test-5\views\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5aebf34dc5c484_49438214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1933f37682f9528a634781c7e86c46b48cbc2653' => 
    array (
      0 => 'C:\\wamp64\\www\\test\\SL\\test-5\\views\\header.tpl',
      1 => 1525412684,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aebf34dc5c484_49438214 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
    function sendAjax(method , data , success){
        $.ajax({
            method: method ,
            url: "train5-3.php",
            data: data,
            success:success ,
            error: function(){
            }
        });
    }

    function errorCode(code){
      console.log(code)
      switch(Number(code)){
        case 1001:
          alert('資料未異動,請檢查');
        break;
        case 1002:
          alert('請求失敗');
          // window.location = 'train5-1.php';
        break;    
        case 1003:
          alert('身分證長度錯誤');
        break;               
        case 1004:
          alert('第一個字須為大寫');
        break;               
        case 1005:
          alert('第二個字開始為數字');
        break;     
        case 1006:
          alert('身分證錯誤');
        break; 
        case 1007:
          alert('身分證重複');
        break;                                        
        default:
          alert('成功');
          window.location = 'train5-1.php';
      }
    }
  <?php echo '</script'; ?>
>
</head>




<?php }
}
