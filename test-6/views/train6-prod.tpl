{include file="title.tpl" }
{include file="header.tpl" }
<head>
  <script>
    function url(url){
      window.location = url;
    }


  </script>
</head>
<body>

<div class="container">
  <h2>我的產品</h2>
  
  <table class="table">
    <thead>
      <tr>
        <th>###</th>
        <th>名稱</th>
        <th>
            <button type="button" class="btn btn-default btn-sm" onclick="url('train6-prod-add.php')" >新增</button>
        </th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$usr item=data}
        
      <tr>
        <td>{$data['id']}</td>
        <td>{$data['name']}</td>
        <td>
            <button type="button" class="btn btn-default btn-sm" onclick="" >修改</button>            
        </td>
      </tr>      
      {/foreach}
    
    </tbody>
  </table>
</div>

</body>



