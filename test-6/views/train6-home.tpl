
{include file="title.tpl" }
{include file="header.tpl" }
<head>
  <script>
    $(document).ready(function(){
      if(sessionStorage.getItem("type")!== "sales") Logout();
      list();
    });

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

    function showView(res){
      var data = JSON.parse(res) ;
      errorCode(data["code"]) ;
      let view = new Array();
      for(var i in data["content"]){
        str = "<tr>" ;
        str += "<td>"+data["content"][i]['id']+"</td>" ;
        str += "<td>"+data["content"][i]['name']+"</td>" ;
        str += "<td>"+data["content"][i]['account']+"</td>" ;
        str += "<td>"+data["content"][i]['password']+"</td>" ;
        str += "<td>"+data["content"][i]['total']+"</td>" ;
        str += "<td>";
        str += "<button type='button' class='btn btn-default btn-sm' onclick=\'url(\"train6-store-add.php?uid="+data["content"][i]["id"]+"\")\' >修改</button>" ;
        str += "&nbsp;  <button type='button' class='btn btn-default btn-sm' onclick=\'url(\"train6-prod.php?store="+data["content"][i]["id"]+"\")\' >產品</button>" ;
        // str += "&nbsp;  <button type='button' class='btn btn-default btn-sm' onclick=\'url(\"train6-order.php?store="+data["content"][i]["id"]+"\")\' >訂單</button>" ;
        str += "&nbsp;  <button type='button' class='btn btn-default btn-sm' onclick=\'del(\""+data["content"][i]["id"]+"\")\' >刪除</button>" ;
        str += "</td>";
        str += "</tr>" ;
        view.push(str);
      }

      $("#list").html(view.join("") );

    }

    function list(){
      var data = { 
        action: 'getStoreOrder' ,
        src:'store' ,
        top_id: 'uid' ,
      }
      sendAjax("train6-ajax.php" , data , showView );      
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
        <th>累計銷售*10%</th>
        <th>
            <button type="button" class="btn btn-default btn-sm" onclick="url('train6-store-add.php')" >新增</button>
        </th>
      </tr>
    </thead>
    <tbody id="list">
      
    </tbody>
  </table>
</div>

</body>



