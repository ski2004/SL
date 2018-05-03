{include file="header.tpl" }
<head>
<script>
    function back(param){
      let url =  'train5-1.php'  ;
      window.location = url;
    }
</script>
</head>
<body>

<div class="container">
  <h2>通訊錄 DB 版本</h2>
  <form action="train5-3.php" method="POST" >
  <table class="table">
    <thead>
      <tr>
        <th colspan="2" >
            <h2>{$type}</h2>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>姓名</td>
        <td>
            <input name="name" type="text" value="{$usr['name']}" >
        </td>
      </tr>
      <tr>
        <td>身分證</td>
        <td>
            <input name="identity" type="text" value="{$usr['identity']}" >
        </td>
      </tr>
      <tr>
        <td>生日</td>
        <td>
            <input name="birth" type="text" value="{$usr['birth']}" >
        </td>
      </tr>
      <tr>
        <td>電話</td>
        <td>
            <input name="tel" type="text" value="{$usr['tel']}" >
        </td>
      </tr>
      <tr>
        <td>郵遞區號</td>
        <td>
            <input name="post_code" type="text" value="{$usr['post_code']}" >
        </td>
      </tr>           
      <tr>
        <td>住址</td>
        <td>
            <input name="address" type="text" value="{$usr['address']}" >
        </td>
      </tr>               
    </tbody>
    <tfoot>
      <tr>
        <th colspan="2" >
            <input name="id" type="hidden" value="{$usr['id']}" >
            <button type="submit" class="btn btn-default btn-sm">{$type}</button>
            <button type="button" class="btn btn-default btn-sm" onclick="back()" >取消</button>
        </th>
      </tr>
    </tfoot>
  </table>
  </form>
</div>

</body>



