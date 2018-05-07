{include file="title.tpl" }
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
      Authorization = data["token"] ;
      if(data["code"]===200) go("./train6-home.php");
    }
</script>
<div class="container">

  <form class="form-signin">
    <h2 class="form-signin-heading">Please sign in</h2>

    <input type="input" id="account" class="form-control" >
    
    <input type="password" id="password" class="form-control" placeholder="Password" required="">
    <button class="btn btn-lg btn-primary btn-block" type="button" onclick="login()" >登入</button>
  </form>

</div>