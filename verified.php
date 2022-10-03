<?php
include_once "db.php";
    if(isset($_GET['vkey'])){
        $vkey = $_GET['vkey'];

        $query = "UPDATE users SET verified = 1 WHERE vkey = '$vkey'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            echo "<script>alert('Thanks for verifying your account');</script>";
            //echo "<script>location.href= 'login.php'</script>";
        }else{
            if($vkey != $_GET['vkey']){
                echo "<script>alert('Check your mail for verification');</script>";
                echo "<script>location.href= 'register.php'</script>";
            }else{
            echo "<script>alert('Check your mail for verification');</script>";
           // echo "<script>location.href= 'login.php'</script>";
        }
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
            <label for="exampleInputEmail1" class="form-label">Thank you for signup with us, you can now login!</label>
            <label for="exampleInputEmail1" class="form-label"><a href="login.php">Please login here</a></label>
            
           
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>