<?php

  $con = mysqli_connect('localhost','root','','OWNER');

  if(!$con){
      echo 'Cannot connect To DB';
  }

  session_start();  

  $sql = "SELECT * FROM infos";

  $info = $con->query($sql);

  if(isset($_POST['login'])){
    $n = $_POST['email'];
    $p = $_POST['password'];

    $state = 0;

    foreach($info as $i){
      if(($i['email'] == $n) && ($i['password'] == $p)){
        $state = 1;
        break;
      }else{
        $state = 0;
      }
    }

    if($state == 1){
      $_SESSION['email'] = $n;
      $_SESSION['password'] = $p;
      header('location:index.html');
      echo 'True';
    }else{
      echo 'False';
    }

  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <h1>good</h1>
  </body>
</html>