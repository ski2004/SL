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
    function sendAjax(method , data , success){
        $.ajax({
            method: method ,
            url: "train4-3.php",
            data: data,
            success:success ,
            error: function(){
            }
        });
    }

    function errorCode(code){
      console.log(code)
      switch(Number(code)){
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
          alert('成功');
          window.location = 'train4-1.php';
      }
    }
  </script>
</head>




