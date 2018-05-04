{include file="header.tpl" }
<head>
  <script>
    function url(param){
      console.log(param)
      let url = (!!param)? 'train4-2.php?uid='+param  : 'train4-2.php'  ;
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
  <h2>檔案存取,資料加密</h2>
  
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
      {foreach from=$usr key=k item=data}
        
      <tr>
        <td>{$data[0]}</td>
        <td>{$data[1]}</td>
        <td>{$data[2]}</td>
        <td>{$data[3]}</td>
        <td>{$data[4]}</td>
        <td>{$data[5]}</td>
        <td>
            <button type="button" class="btn btn-default btn-sm" onclick="url('{$k}')" >修改</button>
            <button type="button" class="btn btn-default btn-sm" onclick="del('{$k}')">刪除</button>
        </td>
      </tr>      
      {/foreach}
    
    </tbody>
  </table>
</div>

</body>



