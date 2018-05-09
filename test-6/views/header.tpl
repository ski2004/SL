
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" >
          <b>QAQ</b>
        </a>
      </div>
      <ul class="nav navbar-nav">
        <li class=""><a href="./train6-home.php">店家列表</a></li>
        <!-- <li class=""><a href="./train6-prod.php">產品列表</a></li> -->
        <!-- <li class=""><a href="./train6-order.php">訂單列表</a></li> -->
        <li class=""><a href="" onclick="Logout()"  >登出</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="" id="header-acc" ></a></li>
      </ul>
    </div>
  </nav>
</body>

<script>
  $(document).ready(function(){
    if(sessionStorage.getItem("account")===null){
      Logout();
    }else{
      $("#header-acc").html("  "+sessionStorage.getItem("account")+" 歡迎登入  ");
    }
  });
</script>



