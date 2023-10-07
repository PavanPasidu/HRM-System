<?php session_start(); ?>
<?php include_once "../connection.php";
    $var= $_SESSION['user_name'];
    $sql ="select emp_id from user where user_name='$var'";
    $result = mysqli_query($connection,$sql); 
    $data= mysqli_fetch_assoc($result);
    $ans = $data['emp_id'];
    //echo $ans;
?>
<?php
    if(isset($_POST['submit'])){
        $leave_type=$_POST['leave_type'];
        $leave_date=$_POST['leave_date'];
        $leave_count=$_POST['leave_count'];
        $reason=$_POST['reason'];
        //$leave_status=$_POST['leave_status'];
        $reqquery="insert into leave_req values('NULL','$ans','$leave_type','$leave_date','$reason','pending','$leave_count')";
        $requested="";
        if(mysqli_query($connection,$reqquery)){
            $requested="Request done successfully !";
            echo '<script type ="text/JavaScript">';  
            echo "alert('$emp_added')";  
            echo '</script>';
            header("location: ./leaveform.php");
        }
    }
    else{
        //echo "Error";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="../../css/leave_style.css">
    <style>
        table{
            border-collapse: collapse;
            table-layout: auto;
            width: 100%;
            overflow: hidden;
            
        }
        td, th{
            border: solid 1px #dddddd;
            padding: 8px;

        } 
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7dd60dd937.js" crossorigin="anonymous"></script>
</head>
    <body>
        <div class="bigbox">
            <div class="main-container d-flex leftside">
            <div class = "sidebar" id="side_nav">
                <div class="header-box px-2 pt-3 pb-4">
                    <h1 class="fs-4"><span class="gb-white text-white rounded shadow px-2 me-2"><i class="fa-sharp fa-solid fa-sun"></i></span><span class="text-white">BPNL</span></h1>
                    <button class="btn d-md-none d-block close-btn px-1 py-0"><i class="far fa-stream"></i></button>
                </div>
                <div>
                    <ul class="list-unstyled px-2">
                        <li class=""><a href ="employee.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-home"></i>Dashboard</li>
                        <li class=""><a href ="emp_profile.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i>Profile</li>
                        <li class=""><a href ="employers.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-users"></i>Employers</li>
                        <li class=""><a href ="emp_salary.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-money-bill-wave"></i>Salary</li>
                        <li class="active"><a href ="empleave.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-file-medical-alt"></i>Leave</li>
                    </ul>
                    <ul class="list-unstyle px-2">
                        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"></a></li>
                    </ul>
                </div>
            </div>
    </div>
            <div class="rightside">
            <?php require_once("../navibar.php"); ?>
                <form action="leaveform.php" method="post">
                    <h1 style="text-align:center; background-color:powderblue">Request Leave</h1>
                        <table> 
                        <tr>
                            <td>Leave Type</td>
                            <td>
                                <input type="radio" id="" name="leave_type" value="annual">
                                <label>Annual</label>
                                <input type="radio" id="" name="leave_type" value="casual">
                                <label>Casual</label>
                                <input type="radio" id="" name="leave_type" value="maternity">
                                <label>Maternity</label>
                                <input type="radio" id="" name="leave_type" value="no-pay">
                                <label>NO-Pay</label><br>
                            </td>
                        </tr>
                        <tr>
                            <td>Leave Date</td>
                            <td><input type="date" id="leave_date" name="leave_date"></td><br>
                        </tr>
                        <tr>
                            <td>Leave Count</td>
                            <td><input type="number" id="leave_count" name="leave_count"></td><br>
                        </tr>
                        <tr>
                            <td>Reason</td>
                            <td><input type="text" id="reason" name="reason"></td>
                        </tr>
                        
                    <tr><td></td><td><input type="submit" value="submit" name="submit" ></td></tr>
                    </table>

            
                </form>
                <?php require_once("../footer.php") ?>
            </div>  
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <script>
            $(".sidebar ul li").on('click' , function(){
                $(".sidebar ul li.active").removeClass('active');
                $(this).addClass('active');
            })
        </script>
        
    </body>
</html>