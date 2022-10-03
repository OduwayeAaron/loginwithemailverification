<?php
include_once "db.php";


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';



require 'vendor/autoload.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $vkey = md5(time(). $username);

    $select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $select_run = mysqli_query($conn, $select);
    if(mysqli_num_rows($select_run)>0){
        $fetch = mysqli_fetch_array($select_run);
        $_SESSION['id'] = $fetch['id'];
        echo '<script>alert("User already exit!")</script>';
        echo '<script>location.href="register.php"</script>';
    }else{
        if($password != $cpassword){
        echo '<script>alert("password do not match!")</script>';
        echo '<script>location.href="register.php"</script>';
        
        }else{
            $insert =" INSERT INTO users (username,password,email,vkey) VALUE ('$username', '$password', '$email', '$vkey')";
            $insert_query = mysqli_query($conn, $insert);

            if($insert_query){
            $sender = 'support@ogadweb.com';
            $senderName = 'OgadTec Limited';
            $recipient =  $email;
            $usernameSmtp = 'support@ogadweb.com';
            $passwordSmtp = 'computer8344#';
            $host = 'ssl://ogadweb.com';
            $port = 465;
            $subject = 'Appointment Form';
            $bodyText =  "Appointment Booking\r\nThis email was sent through the
                goddaycleaners.com get a qoute.";
            $bodyHtml = "<h1>Appointment Form</h1>


            <a href='http://localhost/loginwithemailverification/verified.php?vkey=$vkey'>Click to verify your mail</a>";


                $mail = new PHPMailer(true);

                try {
                    // Specify the SMTP settings.
                    $mail->isSMTP();
                    $mail->setFrom($sender, $senderName);
                    $mail->Username   = $usernameSmtp;
                    $mail->Password   = $passwordSmtp;
                    $mail->Host       = $host;
                    $mail->Port       = $port;
                    $mail->SMTPDebug = 2;
                    $mail->SMTPAuth   = true;
                    $mail->SMTPSecure = 'SSL/TLS';
                    $mail->addCustomHeader('X-SES-CONFIGURATION-SET');
                
                    // Specify the message recipients.
                    $mail->addAddress($recipient);
                    // You can also add CC, BCC, and additional To recipients here.
                
                    // Specify the content of the message.
                    $mail->isHTML(true);
                    $mail->Subject    = $subject;
                    $mail->Body       = $bodyHtml;
                    $mail->AltBody    = $bodyText;
                    $mail->Send();
                    echo '<script>alert("email sent");</script>';
                    echo '<script>location.href= "sentmessage.php"</script>';
                } catch (Exception $e) {
                    echo '<script>alert("An error occurred");</script>';
                    echo '<script>location.href= "register.php"</script>';
                
                } catch (Exception $e) {
                    echo '<script>alert("Email not sent");</script>';
                    echo '<script>location.href= "register.php"</script>';
                
                }
            }


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
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
           
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Repeat Password</label>
            <input name="cpassword" type="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email Address</label>
            <input name="email" type="email" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Register user</button>
        </form>

        <h5>Do you have an account? <a href="login.php">Login here</a></h5>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>