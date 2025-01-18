<?php require_once("connection.php"); ?>

<?php
    if(isset($_POST['submit'])){
        $emp_id = $_POST['emp_id'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $conf_pass = $_POST['conf_pass'];

        $hashed_password = sha1($password);

        $inval_or_not="";
        $query_check_id = "select * from user where emp_id='$emp_id';";
        $result_id = mysqli_query($connection,$query_check_id);
        $r = mysqli_fetch_assoc($result_id);
        
        if($r !=null){
            $inval_or_not="You Already Have An Account !";
        }else{
            if($password==$conf_pass){
                $query_account = "insert into user values('$user_name','$hashed_password','$emp_id', 'inactive');";
                $result_acc = mysqli_query($connection,$query_account);
                header("Location: Account_wait.php");
            }else{
                $inval_or_not="check your password again";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <title>ABC Company</title>
</head>
<body>
    <div class="signup">
        <h1>Request User Account</h1>
        <form action="signup.php" method="post">
            <p>Employee ID</p>
            <div><input type="text" placeholder="Enter Employee ID" name="emp_id" id=""></div>
            <p>User Name</p>
            <div><input type="text" placeholder="Enter User Name" name="user_name" id=""></div>
            <p>Password</p>
            <div><input type="password" placeholder="Enter Password" name="password" id=""></div>
            <p>Confirm Password</p>
            <div><input type="password" placeholder="Enter Password" name="conf_pass" id=""></div>
            <div class="inval">
                <?php
                if(isset($_POST['submit'])){
                    echo $inval_or_not;
                }
                else{
                    echo "    ";
                }
                ?>
            </div>
            <div><input type="submit" value="Request" name="submit"></div>
        </form>        
        
    </div>

    </body>
</html>