<?php
/* Smarty version 3.1.32, created on 2018-05-04 07:48:53
  from 'C:\wamp64\www\test\SL\test-4\views\train4-2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5aec1065621b10_08493847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '388b2851468ccc82a48b923032717e5aa8da1846' => 
    array (
      0 => 'C:\\wamp64\\www\\test\\SL\\test-4\\views\\train4-2.tpl',
      1 => 1525419976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5aec1065621b10_08493847 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<head>
<?php echo '<script'; ?>
>
    function back(param){
      let url =  'train4-1.php'  ;
      window.location = url;
    }
  
    function post(type){
      var data = { 
        action: '<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
' ,
        id: "<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" ,
        name: $('#name').val(),
        identity:  $('#identity').val() ,
        birth:  $('#birth').val(),
        tel:  $('#tel').val(),
        post_code:  $('#post_code').val(),
        address:  $('#address').val()
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
  <h2>通訊錄 DB 版本</h2>
  <form>
  <table class="table">
    <thead>
      <tr>
        <th colspan="2" >
            <h2><?php echo $_smarty_tpl->tpl_vars['typeName']->value;?>
</h2>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>姓名</td>
        <td>
            <input id="name" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value[0];?>
" >
        </td>
      </tr>
      <tr>
        <td>身分證</td>
        <td>
            <input id="identity" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value[1];?>
" >
        </td>
      </tr>
      <tr>
        <td>生日</td>
        <td>
            <input id="birth" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value[2];?>
" >
        </td>
      </tr>
      <tr>
        <td>電話</td>
        <td>
            <input id="tel" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value[3];?>
" >
        </td>
      </tr>
      <tr>
        <td>郵遞區號</td>
        <td>
            <input id="post_code" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value[4];?>
" >
        </td>
      </tr>           
      <tr>
        <td>住址</td>
        <td>
            <input id="address" type="text" value="<?php echo $_smarty_tpl->tpl_vars['usr']->value[5];?>
" >
        </td>
      </tr>               
    </tbody>
    <tfoot>
      <tr>
        <th colspan="2" >
            <button type="button" class="btn btn-default btn-sm" onclick="post()"><?php echo $_smarty_tpl->tpl_vars['typeName']->value;?>
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
