<?php

    include_once "db.php";
    session_start();

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $insert = "SELECT * FROM users WHERE verified = 1 AND username = '$username'";
        $insert_run = mysqli_query($conn, $insert);

        if(mysqli_num_rows($insert_run)>0){
            $fetch = mysqli_fetch_array($insert_run);
            $_SESSION['id'] = $fetch['id'];
            echo '<script>alert("login successfull ")</script>';
            echo '<script>location.href="welcome.php"</script>';

        }else{
            echo '<script>alert("Please verify your email account!")</script>';
            echo '<script>location.href="login.php"</script>';
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .mainContainer{
            display:table;
            margin:100px auto 0;
            padding:10px;
            border:1px solid #ddd;
            width:100%;
            max-width:500px;
        }
    </style>
  </head>
  <body>
    <div class="mainContainer">
        <form action=""  method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
           
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login Here</button>
        <h5>Don't have a login? <a href="register.php">register here</a></h5>
        </form>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>