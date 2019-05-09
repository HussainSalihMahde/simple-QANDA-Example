<?php

  $con = mysqli_connect('localhost','root','','OWNER');

  if(!$con){
    echo 'Error Cannot Connect To DB';
  }

$con = mysqli_connect('localhost','root','','OWNER');

if(!$con){
    echo 'Cannot connect To DB';
}

$sql = "SELECT * FROM question";

$result = $con->query($sql);

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";
$sol = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($result as $name) {
    if (stristr($q, substr($name['quest'], 0, $len))) {
      if ($hint === "") {
        $hint = $name['quest'];
        $sol = $name['answer'];  
      } else {
        $n = $name['quest'];
        $s = $name['answer'];
        $hint .= " , ".$n;
        $sol .= " ! ".$s; 
      }
    }
  }
}

// $sql = "SELECT * FROM question where quest = '$hint'";

// $result_2 = $con->query($sql_2);

// Output "no suggestion" if no hint was found or output correct values 
$searchString = ',';
if(strpos($hint, $searchString) !== true){
  // echo $hint === "" ? "No Questions" : $hint.' ! '.$sol;
  echo $hint === "" ? "No Questions" : $hint.' ! '.$sol;
}else{
  echo $hint;
}
?>