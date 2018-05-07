
{include file="title.tpl" }
{include file="header.tpl" }
<head>
<script>
    function back(param){
      go("train6-order.php");
    }
  
    function post(type){
      var data = { 
        action: '{$type}' ,
        src: 'orders' ,
        id: "{$usr['id']}" ,
        c_id: $('#c_id').val(),
        p_id:  $('#p_id').val() ,
        status:  $('#status').val()
      }
      sendAjax("train6-ajax.php" , data , finish );
    }

    function finish(res){
      var data = JSON.parse(res) ;
      errorCode(data["code"]) ;
      // back();
    }
</script>
</head>
<body>

<div class="container">
  <h2>訂單資訊</h2>
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
        <td>產品</td>
        <td>
            <input id="p_id" type="text" value="{$usr['p_id']}" >
        </td>
      </tr>
      <tr>
        <td>顧客</td>
        <td>
            <input id="c_id" type="text" value="{$usr['c_id']}" >
        </td>
      </tr>   
      <tr>
        <td>狀態</td>
        <td>
            <input id="status" type="text" value="{$usr['status']}" >
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



