{include file="header.tpl" }
<head>
  <script>
    function url(param){
      console.log(param)
      let url = (!!param)? 'train5-2.php?uid='+param  : 'train5-2.php'  ;
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
  </script>
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
            <button type="button" class="btn btn-default btn-sm" onclick="url()" >新增</button>
        </th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$usr item=data}
        
      <tr>
        <td>{$data['name']}</td>
        <td>{$data['identity']}</td>
        <td>{$data['birth']}</td>
        <td>{$data['tel']}</td>
        <td>{$data['post_code']}</td>
        <td>{$data['address']}</td>
        <td>
            <button type="button" class="btn btn-default btn-sm" onclick="url({$data['id']})" >修改</button>
            <button type="button" class="btn btn-default btn-sm" onclick="del({$data['id']})">刪除</button>
        </td>
      </tr>      
      {/foreach}
    
    </tbody>
  </table>
</div>

</body>



