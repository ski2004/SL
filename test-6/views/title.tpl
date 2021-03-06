<!DOCTYPE html>
<html lang="en">

<head>
  <title>Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>

    function sendAjax(url, data, success, method = "POST") {
      Authorization = sessionStorage.getItem("token") ;
      $.ajax({
        method: method,
        url: url,
        data: data,
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Authorization", Authorization );
        },
        success: success,
        error: function () {

        }
      });
    }

    function Logout(){
      var url = 'login_store.php' ;
      switch(sessionStorage.getItem("type")){
        case ('customer'):
        url = 'login_customer.php' ;
        break;
        case ('sales'):
        url = 'login_admin.php' ;
        break;
      }
      sessionStorage.removeItem("token");
      sessionStorage.removeItem("account");
      window.location = url;
    }

    function reload(){
      location.reload();
    }

    function go(url) {
      window.location = url;
    }

    function errorCode(code) {

      switch (Number(code)) {
        case 200:
          alert('成功');
          break;
        case 201:
          break;          
        case 403:
          alert('登入逾時，請重新登入');
          Logout();
        break;
        case 999:
          alert('登入異常,請關閉瀏覽器重登');
          break;        
        case 1000:
          alert('帳密有錯');
          break;
        case 1001:
          alert('資料未異動,請檢查');
          break;
        case 1002:
          alert('請求失敗');
          // window.location = 'train5-1.php';
          break;
        case 1003:
          alert('身分證長度錯誤');
          break;
        case 1004:
          alert('第一個字須為大寫');
          break;
        case 1005:
          alert('第二個字開始為數字');
          break;
        case 1006:
          alert('身分證錯誤');
          break;
        case 1007:
          alert('身分證重複');
          break;
        default:


      }
    }
  </script>
</head>