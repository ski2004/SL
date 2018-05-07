{include file="title.tpl" }
{include file="header.tpl" }
<head>
  <script>
    function url(url) {
      window.location = url;
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
          <th>狀態</th>
          <th>最後異動時間</th>
          <th>
            <button type="button" class="btn btn-default btn-sm" onclick="url('train6-order-add.php')">新增</button>
          </th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$usr item=data}
        <tr>
          <td>{$data['id']}</td>
          <td>{$data['p_id']}</td>
          <td>{$data['c_id']}</td>
          <td>{$data['status']}</td>
          <td>{$data['update_time']}</td>
          <td>
            <button type="button" class="btn btn-default btn-sm" onclick="">訂購</button>
          </td>
        </tr>
        {/foreach}
      </tbody>
    </table>
  </div>

</body>