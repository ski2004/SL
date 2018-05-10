{include file="title.tpl" }
{include file="header.tpl" }
<head>
  <script>
    $(document).ready(function(){
      // list();
    });
    
    function url(url) {
      window.location = url;
    }

    function showView(res){
      var data = JSON.parse(res) ;
      errorCode(data["code"]) ;

      status = ["???" , "已下單"] ;

      let view = new Array();
      for(var i in data["content"]){
        str = "<tr>" ;
        str += "<td>"+data["content"][i]['id']+"</td>" ;
        str += "<td>"+data["content"][i]['p_id']+"</td>" ;
        str += "<td>"+data["content"][i]['c_id']+"</td>" ;
        str += "<td>"+data["content"][i]['status']+"</td>" ;
        str += "<td>"+data["content"][i]['update_time']+"</td>" ;
        str += "<td>";
        str += "<button type='button' class='btn btn-default btn-sm' onclick=\'url(\"train6-store-add.php?uid="+data["content"][i]["id"]+"\")\' >修改</button>" ;
        
        str += "</td>";
        str += "</tr>" ;
        view.push(str);
      }

      $("#list").html(view.join("") );

    }

    function list(){
      var data = { 
        action: 'get' ,
        src:'orders' ,
        p_id: '{$prod}' ,
      }
      sendAjax("train6-ajax.php" , data , showView );      
    }
  </script>
</head>

<body>

  <div class="container">
    <h2>我的訂單</h2>

    <table class="table">
      <thead>
        <tr>
          <th>###</th>
          <th>產品</th>
          <th>顧客</th>
          <th>最後異動時間</th>
          <th>
            <!-- <button type="button" class="btn btn-default btn-sm" onclick="url('train6-order-add.php?prod={$prod}')">新增</button> -->
          </th>
        </tr>
      </thead>
      <tbody id="list">
        {foreach from=$usr item=data}
        <tr>
          <td>{$data['id']}</td>
          <td>{$data['I_NAME']}</td>
          <td>{$data['C_NAME']}</td>
          <td>{$data['update_time']}</td>
          <td>
          </td>
        </tr>
        {/foreach}
      </tbody>
    </table>
  </div>

</body>