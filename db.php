<?php
    $servername = 'localhost';
    $username = 'root';
    $userpassword = '';
    $dbname = 'emailmessage';

    $conn = mysqli_connect($servername, $username, $userpassword, $dbname);

    if(!$conn){
        die('connection failed');
    }
?>