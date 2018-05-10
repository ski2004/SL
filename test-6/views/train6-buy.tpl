{include file="title.tpl" }
{include file="header.tpl" }
<head>
  <script>
    $(document).ready(function(){
      // if(sessionStorage.getItem("type")!== "store") $('#btn-add').hide();
      list();
    });

    function url(url){
      window.location = url;
    }
    var PID = 0 ;

    function showView(res){
      var data = JSON.parse(res) ;
      errorCode(data["code"]) ;
      let view = new Array();
      for(var i in data["content"]){
        str = "<tr>" ;
        str += "<td>"+data["content"][i]['id']+"</td>" ;
        str += "<td>"+data["content"][i]['name']+"</td>" ;
        str += "<td>";
        str += "<button type='button' class='btn btn-default btn-sm' onclick=\'buy(\""+data["content"][i]["id"]+"\")\' >購買</button>" ;
        str += "</td>";
        str += "</tr>" ;
        view.push(str);
      }

      $("#list").html(view.join("") );

    }

    function list(){
      var data = { 
        action: 'get' ,
        src:'items' ,
      }
      sendAjax("train6-ajax.php" , data , showView );      
    }

    function byStore(id){
      PID = id ;
      if(PID=='0') {
        list();
        return ;
      }  

      var data = { 
        action: 'get' ,
        src:'items' ,
        store_id:id ,
      }
      sendAjax("train6-ajax.php" , data , showView );      
    }

    function buy(id){
      var data = { 
        action: 'insert' ,
        src:'orders' ,
        c_id:"uid" ,
        p_id:id ,
      }
      sendAjax("train6-ajax.php" , data , finish );      
    }

    function finish(res){
      var data = JSON.parse(res) ;
      errorCode(data["code"]) ;
      
    }


  </script>
</head>
<body>

<div class="container">
  <h2></h2>
  
  <table class="table">
    <thead>
      <tr>
        <th>###</th>
        <th>名稱</th>
        <th>
          
          <select name="" id="" onchange="byStore(this.value)" >
              <option value="0">全部</option>
              {foreach from=$info key=k item=v }
                <option value="{$v['id']}">{$v['name']}</option>
              {/foreach }
          </select>
        </th>
      </tr>
    </thead>
    <tbody id="list">
      
    </tbody>
  </table>
</div>

</body>



