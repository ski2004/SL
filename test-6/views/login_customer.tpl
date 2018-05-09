{include file="title.tpl" }
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<style>
  .form-signin {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
  }
  form > *{
    margin: 15px 5px 15px 5px;
  }
</style>

<div class="container">

  <form class="form-signin">
    <h2 class="form-signin-heading">Customer sign in</h2>

    <input type="input" id="account" class="form-control"  placeholder="帳號" required>
    
    <input type="password" id="password" class="form-control" placeholder="密碼" >
    <button class="btn btn-lg btn-primary btn-block" type="button" onclick="login()" >登入</button>
  </form>

</div>


<script>
  function login() {
    var data = {
      account: $('#account').val(),
      password: $('#password').val(),
    }
    sendAjax("train6-login.php" , data, finish);
  }

  function finish(res) {
    var data = JSON.parse(res);
    errorCode(data["code"]);
    // Authorization = data["token"] ;
    if(data["code"]===200) {
      sessionStorage.setItem("token",data["token"]);
      sessionStorage.setItem("type","store");
      sessionStorage.setItem("account",$('#account').val());
      go("./train6-prod.php?store="+data["uid"]);
    }
  }
    
   
  $( "#password").keyup(function(e) {
    if(e.keyCode == 13){
      login();
    }
  });
  </script>