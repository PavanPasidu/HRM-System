<?php session_start();?>
<?php include_once "../connection.php";  

if(isset($_GET['id'])){
    $delete_id = $_GET['id'];
    $bank_del_query= "DELETE FROM bank_details WHERE bank_details.emp_id='$delete_id';";
    $emg_del_query= "DELETE FROM emergency_contact WHERE emergency_contact.emp_id ='$delete_id';";
    $sup_del_query= "DELETE FROM supervisor WHERE supervisor.emp_id = '$delete_id';";
    $employment_del_query ="DELETE FROM employment WHERE employment.emp_id ='$delete_id';";
    $delLeaves_query="DELETE FROM remain_leaves WHERE remain_leaves.emp_id ='$delete_id';";
    $delLeave_req_query="DELETE FROM leave_req WHERE `leave_req`.`leave_id` = '$delete_id';";
    $del_payroll_query="DELETE FROM payroll WHERE `payroll`.`payment_id` = '$delete_id';";
    $delemp_query="DELETE FROM employee_details WHERE employee_details.emp_id ='$delete_id';";

    mysqli_autocommit($connection,FALSE);
    $emp_added ="";
    mysqli_query($connection, $bank_del_query); 
    mysqli_query($connection, $emg_del_query);
    mysqli_query($connection, $sup_del_query);
    mysqli_query($connection, $sup_del_query);
    mysqli_query($connection, $employment_del_query);
    mysqli_query($connection, $delLeaves_query);
    mysqli_query($connection, $delLeave_req_query);
    mysqli_query($connection, $del_payroll_query);
    mysqli_query($connection, $delemp_query);
    

    if (!mysqli_commit($connection)) {
        $emp_deleted = "Commit transaction failed";
        echo '<script type ="text/JavaScript">';  
        echo "alert('$emp_deleted')";  
        echo '</script>';
        exit();
        header("location: ./employeeTable.php");
    }
    header("location: ./employeeTable.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="../../css/empdash1.css">
    <link rel="stylesheet" href="../../css/emp_table.css">
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
                            <li class="active"><a href ="" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-users"></i>Employers</li>
                            <li class=""><a href ="emp_salary.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-money-bill-wave"></i>Salary</li>
                            <li class=""><a href ="empleave.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-file-medical-alt"></i>Leave</li>
                        </ul>
                        <ul class="list-unstyle px-2">
                            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"></a></li>
                        </ul>
                    </div>
        </div>
    </div>
    <div class="rightside">
        <?php require_once("../navibar.php"); ?>
        <div>
            <h3 id="emphead">Employees</h3>
        </div>
        <?php
            $empquary1="SELECT ed.emp_id, ed.first_name, ed.last_name, j.job_title, e.dept_name FROM employment e RIGHT OUTER JOIN employee_details ed ON ed.emp_id = e.emp_id LEFT OUTER JOIN job j ON e.job_id = j.job_id WHERE ed.emp_id != 0;";
            $emp_result1=mysqli_query($connection,$empquary1);

            echo "
            <table id='empt' >
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Job</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>";

                while($row = mysqli_fetch_assoc($emp_result1))
                {
                echo "
                <tr>
                    <td>".$row['emp_id']."</td>
                    <td>".$row['first_name']." </td>
                    <td>".$row['last_name']." </td>
                    <td>".$row['job_title']."</td>
                    <td>".$row['dept_name']."</td>
                </tr>
                ";
                }
                echo "
                </tbody>
            </table>";
        ?>
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