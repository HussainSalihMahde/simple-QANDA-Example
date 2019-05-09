<?php

$con = mysqli_connect('localhost','root','','OWNER');

if(!$con){
    echo 'Cannot connect To DB';
}

$sql = "SELECT * FROM infos";

$result = $con->query($sql);

if(isset($_POST['regist'])){
  $n = $_POST['name'];
  $e = $_POST['email'];
  $p = $_POST['password'];

  $state = 0;

  foreach($result as $r){
      if($r['name'] != $n || $r['email'] != $e){
         $state = 1;
      }else{
          $state = 0;
          break;
      }
  
  }
  
  if($state == 1){
    $sql_2 = "INSERT INTO infos VALUES(NULL,'$n','$e','$p')";
    if(mysqli_query($con,$sql_2)){
        header('location:login.html');
    }else{
        echo 'An Error Occur, Please Try Again';
    }
  }else{
    echo 'An Error Occur Email Or Name are repeated choose another one, Please Try Again';
  }

}