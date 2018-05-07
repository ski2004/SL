{include file="title.tpl" }
{include file="header.tpl" }
<head>
<script>
    function back(param){
      go("train6-prod.php");
    }
  
    function post(type){
      var data = { 
        action: '{$type}' ,
        src: 'items' ,
        id: "{$usr['id']}" ,
        name: $('#name').val()
      }
      sendAjax("train6-ajax.php" , data , finish );
    }

    function finish(res){
      var data = JSON.parse(res) ;
      errorCode(data["code"]) ;
      back();
    }
</script>
</head>
<body>

<div class="container">
  <h2>產品資訊</h2>
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


