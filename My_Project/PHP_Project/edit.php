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
    $q;
    $s;

    if(!empty($_POST["upd"])){
        $q = $_POST["upd"];

        $sql_3 = "SELECT * FROM question WHERE quest = '$q'"; 

        $result_3 = $con->query($sql_3);

        foreach ($result_3 as $r) {
            $s = $r['answer'];
        }
    }



    //$sql_2 = "SELECT "

    if(isset($_POST['update'])){
        $question = $_POST['q'];
        $solve = $_POST['a'];

        echo $solve;
        
        $sql_2 = "UPDATE question SET quest = '$question',answer = '$solve' Where infos_id = '$id'";

        if(mysqli_query($con,$sql_2)){
            header('location:myprofile.php');
        }else{
            echo 'An Error Occur, Please Try Again';
        }
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
        <div class="container py-3 cont bg-light form" style="color:rgb(51,51,51);">
                <form action="edit.php" method="POST">
                    <h1 style="color:rgb(63, 225, 58);">Edit Data</h1>
                        <div class="form-group">
                            <label for="email">The Question : </label>
                            <input type="text" name="q" id="email" class="form-control" placeholder="Enter Your Question" value='<?php echo $q;?>' style="color:rgb(9, 146, 9);">
                        </div>
                        <div class="form-group">
                            <label>The Answer : </label>
                            <!-- <input type="text" name="a" id="answer" class="form-control" placeholder="Your Answer" value='<?php echo $s;?>' style="color:rgb(9, 146, 9);"> -->
                            <textarea name="a" id="answer" class="form-control" cols="56" rows="10" style="color:rgb(9, 146, 9);"><?php echo $s;?></textarea>
                        </div>
                        <input type="submit" name="update" value="Update" class="btn btn-success">
                </form>   
            </div>
    </body>
</html>