<?php
/* Smarty version 3.1.32, created on 2018-05-03 09:58:42
  from 'C:\wamp64\www\test\SL\test-5\train5-1.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5aeadd52e54a46_24914125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd93b3baca19808f1c078d040ab5560755fe121d' => 
    array (
      0 => 'C:\\wamp64\\www\\test\\SL\\test-5\\train5-1.php',
      1 => 1525338997,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aeadd52e54a46_24914125 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
  
  ';?>require_once('./main.php') ;
  
  $action = new Action();

  class Action {
    public $db;
    public $tpl;
    public $type;
    public $error;
    public function __construct()
    {
      $this->db = new MySql();
      $this->tpl = new Smarty(); 
      $this->tpl->template_dir = "views" ;
      $this->tpl->compile_dir = "tmp" ;
      $this->verify();
    
      $usr = $this->db->get("customer") ;
      $this->tpl->assign("usr" , $usr); 
      $this->tpl->display("train5-1.tpl");
    }

    public function verify(){

    }


  }
<?php }
}
