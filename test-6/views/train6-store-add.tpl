{include file="header.tpl" }
<head>
<script>
    function back(param){
      go("train6-home.php");
    }
  
    function post(type){
      var data = { 
        action: '{$type}' ,
        id: "{$usr['id']}" ,
        name: $('#name').val(),
        account:  $('#account').val() ,
        password:  $('#password').val()
      }
      sendAjax("train6-ajax" , data , finish );
    }

    function finish(res){
      var data = JSON.parse(res) ;
      errorCode(data["code"]) ;
    }
</script>
</head>
<body>

<div class="container">
  <h2>店家資訊</h2>
  <form>
  <table class="table">
    <thead>
      <tr>
        <th colspan="2" >
            <h2>{$typeName}</h2>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>名稱</td>
        <td>
            <input id="name" type="text" value="{$usr['name']}" >
        </td>
      </tr>
      <tr>
        <td>帳號</td>
        <td>
            <input id="account" type="text" value="{$usr['account']}" >
        </td>
      </tr>
      <tr>
        <td>密碼</td>
        <td>
            <input id="tel" type="password" value="{$usr['password']}" >
        </td>
      </tr>              
    </tbody>
    <tfoot>
      <tr>
        <th colspan="2" >

            <button type="button" class="btn btn-default btn-sm" onclick="post()">{$typeName}</button>
            <button type="button" class="btn btn-default btn-sm" onclick="back()" >取消</button>
        </th>
      </tr>
    </tfoot>
  </table>
  </form>
</div>

</body>



