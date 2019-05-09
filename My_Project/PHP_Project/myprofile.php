<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ask To Answered</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/p5.min.js"></script>
    <style>
        body {
            overflow: hidden;
        }
        
        i {
            border: 1px solid white;
            border-radius: 50px;
            padding: 10px;
            color: rgb(70, 67, 67);
            background-color: white;
        }
        
        .com_name {
            width: 320px;
            height: 30px;
            border-radius: 10px;
            border: 1px solid white;
            outline: none;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            font-size: 20px;
            text-indent: 10px;
        }
        
        .com_btn {
            height: 40px;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        
        .cont {
            height: 700px;
            overflow: auto;
        }
        
        .bab {
            margin-top: -100px;
            transition: margin 1s;
        }
        
        #sup {
            transition: margin 1s;
        }

        td{
            min-width:120px;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand py-3" href="index.html">
                <i>Q&A</i>
            </a>

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <form action="logout.php" method="POST">
                        <p class="nav-link my-1 bg-dark">
                            <input type="submit" class="btn btn-dark" value="logout">
                        </p>
                    </form>
                </li>

                <li class="nav-item">
                    <div id="con" style="margin-left:50px; margin-top:10px;"></div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid py-3 cont bg-light">
        <h4 class="dark-text">
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
                  echo 'Your Name : '.$r['name'].'</br>';

                  $id = $r['id'];
              }
            ?>
        </h4>
        <div class="justify-center my-5">
            <?php
                $sql_2 = "SELECT * FROM question WHERE infos_id = '$id'";

                $result_2 = $con->query($sql_2);
                echo "<h4>Your Data : </h4>";
                echo "<table border='1' class='table table-striped table-dark' style='width:1000px;'>";
                echo '<tr>';
                echo '<td>Question</td>';
                echo '<td>Answer</td>';
                echo '<td>Delete</td>';
                echo '<td>Edit</td>';
                echo '</tr>';


                foreach ($result_2 as $r) {
                    $p = $r['quest'];
                    echo '<tr>';
                    echo '<td>'.$r['quest'].'</td>';
                    echo '<td>'.$r['answer'].'</td>';  
                    echo "<td><form method='POST' action='myprofile.php'><input type='submit' name='del' class='btn btn-danger' value='$p'/></form></td>";
                    echo "<td><form method='POST' action='edit.php'><input type='Checkbox' name='upd' class='btn' value='$p'/>&nbsp;&nbsp;<input type='submit' name='ch' class='btn btn-danger' value='Edit'/></form></td>";
                    echo '</tr>';
                }

                echo "</table>";

                if(isset($_POST['del'])){
                    $d = $_POST['del'];
                    $sql_3 = "DELETE FROM question WHERE infos_id = '$id' AND quest = '$d'";

                    if(mysqli_query($con,$sql_3)){
                        header('location:myprofile.php');
                    }else{
                        echo 'Error Occur, Please Try Again';
                    }
                }
            ?>
            <form action="add.php" method="POST">
                <input type="submit" name="add" value="Add" class="btn btn-dark">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="sketch.js"></script>
</body>

</html>