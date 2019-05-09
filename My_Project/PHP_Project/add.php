<?php
    session_start();
    $con = mysqli_connect('localhost','root','','OWNER');

    if(!$con){
        echo 'ERROR Occur on DB';
    }

    $e = $_SESSION['email'];

    $sql = "SELECT * FROM infos WHERE email = '$e'";

    $result = $con->query($sql);

    $id;

    foreach ($result as $r) {
        $id = $r['id'];
    }

    if(isset($_POST['insert'])){
        $q = $_POST['ques'];
        $s = $_POST['ans'];

        //echo $q.$s;
        
        $sql_2 = "INSERT INTO question (id,infos_id,quest,answer,score) VALUES(NULL,'$id','$q','$s',0)";

        if($con->query($sql_2) === TRUE){
            header('location:myprofile.php');
        }else{
            echo 'An Error Occur, Please Try Again';
        }
        //echo $id.$q.$s.'0';
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="css/style.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <style>
            .cont{
                width:500px; 
                border:1px solid azure;
                border-radius:30px;
                margin-top:150px;
            }
        </style>
    </head>
    <body class="bg-dark">
        <div class="container py-3 cont bg-light text-light form">
                <form action="add.php" method="POST">
                    <h1 style="color:rgb(63, 225, 58);">Add Data</h1>
                        <div class="form-group">
                            <label for="email">The Question : </label>
                            <input type="text" name="ques" id="email" class="form-control" placeholder="Enter Your Question" style="color:rgb(9, 146, 9);">
                        </div>
                        <div class="form-group">
                            <label for="answer">The Answer : </label>
                            <input type="text" name="ans" id="answer" class="form-control" placeholder="Your Answer" style="color:rgb(9, 146, 9);">
                        </div>
                        <input type="submit" name="insert" value="Add" class="btn btn-success">
                </form>   
            </div>
    </body>
</html>