
{include file="title.tpl" }
{include file="header.tpl" }
<head>
  <script>
    function url(url){
      window.location = url;
    }

    function del(uid){
      var data = { 
        action: 'del' ,
        src:'store' ,
        id: uid ,
      }
      sendAjax("train6-ajax.php" , data , finish );
    }

    function finish(res){
      var data = JSON.parse(res) ;
      errorCode(data["code"]) ;
      reload();
    }
  </script>
</head>
<body>

<div class="container">
  <h2>我的店家</h2>
  
  <table class="table">
    <thead>
      <tr>
        <th>###</th>
        <th>名稱</th>
        <th>帳號</th>
        <th>密碼</th>
        <th>
            <button type="button" class="btn btn-default btn-sm" onclick="url('train6-store-add.php')" >新增</button>
        </th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$usr item=data}
        
      <tr>
        <td>{$data['id']}</td>
        <td>{$data['name']}</td>
        <td>{$data['account']}</td>
        <td>{$data['password']}</td>
        <td>
            <button type="button" class="btn btn-default btn-sm" onclick="url('train6-store-add.php?uid={$data['id']}')" >修改</button>
            <button type="button" class="btn btn-default btn-sm" onclick="url('train6-prod.php')" >產品</button>
            <button type="button" class="btn btn-default btn-sm" onclick="url('train6-order.php')" >訂購</button>
            <button type="button" class="btn btn-default btn-sm" onclick="del({$data['id']})">停用</button>
        </td>
      </tr>      
      {/foreach}
    
    </tbody>
  </table>
</div>

</body>



