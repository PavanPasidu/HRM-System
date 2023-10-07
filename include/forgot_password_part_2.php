<?php require_once("connection.php"); ?>
<?php session_start(); ?>
<?php
    $real_email = $_SESSION['email'];
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        if($real_email == $email){
            header("Location: forgot_password_part_3.php");
        }
        else{
            $inval_or_not = "Invalid Email";
        }
    }
    else{
        $inval_or_not = " .    ";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frogot1_style.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="loginbox">
        <h1>Reset Password</h1>
        <form action="forgot_password_part_2.php?email=<?=$real_email?>" method="post">
            <p>Email</p>
            <div><input type="text" placeholder="Enter Email" name="email" id=""></div>
            <div class="inval"><?php
            if(isset($_POST['submit'])){
                echo $inval_or_not;
            }
            else{
                echo " .    ";
            }
        ?>  </div>
            
            <div><input type="submit" value="Send Verification code" name="submit"></div>
        </form>        
        
    </div>

    </body>
</html>