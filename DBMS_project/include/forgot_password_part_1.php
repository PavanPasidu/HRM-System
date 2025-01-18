<?php require_once("connection.php"); ?>
<?php session_start(); ?>
<?php
    if(isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $query_check_user="SELECT user_name FROM user WHERE user_name='$user_name'";
        $user_result_set=mysqli_query($connection,$query_check_user);
        $user_name_record=mysqli_fetch_assoc($user_result_set);

        $query = "SELECT email FROM employee_details WHERE emp_id in(SELECT emp_id FROM user WHERE user_name='$user_name')";
        $email_result_set=mysqli_query($connection,$query);
        $email_record=mysqli_fetch_assoc($email_result_set);

        $_SESSION['email']=$email_record['email'];
        

         if($user_name_record){
            header("Location: forgot_password_part_2.php");
        }
        else{
            $inval_or_not = "Invalid User Name";
        }
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

        <form action="forgot_password_part_1.php" method="post">
            <p>User Name</p>
            <div><input type="text" placeholder="Enter User Name" name="user_name" id=""></div>
            
            <div class="inval"><?php
            if(isset($_POST['submit'])){
                echo $inval_or_not;
            }
            else{
                echo " .    ";
            }
        ?>  </div>
            <div><input type="submit" value="Next" name="submit"></div>
        </form>

    </div>
    </body>

</html>