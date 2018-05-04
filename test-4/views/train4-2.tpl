{include file="header.tpl" }
<head>
<script>
    function back(param){
      let url =  'train4-1.php'  ;
      window.location = url;
    }
  
    function post(type){
      var data = { 
        action: '{$type}' ,
        id: "{$uid}" ,
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
</script>
</head>
<body>

<div class="container">
  <h2>通訊錄 DB 版本</h2>
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
        <td>姓名</td>
        <td>
            <input id="name" type="text" value="{$usr[0]}" >
        </td>
      </tr>
      <tr>
        <td>身分證</td>
        <td>
            <input id="identity" type="text" value="{$usr[1]}" >
        </td>
      </tr>
      <tr>
        <td>生日</td>
        <td>
            <input id="birth" type="text" value="{$usr[2]}" >
        </td>
      </tr>
      <tr>
        <td>電話</td>
        <td>
            <input id="tel" type="text" value="{$usr[3]}" >
        </td>
      </tr>
      <tr>
        <td>郵遞區號</td>
        <td>
            <input id="post_code" type="text" value="{$usr[4]}" >
        </td>
      </tr>           
      <tr>
        <td>住址</td>
        <td>
            <input id="address" type="text" value="{$usr[5]}" >
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



