<?php
    include_once "db.php";
    session_start();
    
    $id = $_SESSION['id']; 
    if(!isset($_SESSION['id'])){
        echo '<script>location.href="register.php"</script>';
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
            <img src="img/images.jpg">
            <label for="exampleInputEmail1" class="form-label">You message has been sent! Please check you email for verification</label>
           
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>