<?php include_once "../connection.php";
    session_start();
    $empquary="SELECT COUNT(*) AS totalemp FROM employee_details";
    $emp_result=mysqli_query($connection,$empquary);
    $emp_data=mysqli_fetch_assoc($emp_result);
    $emp_count=$emp_data['totalemp'] - 1;

?>
<?php
    if(isset($_POST['submit'])){
        $emp_id = $_POST['emp_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $contact= $_POST['contact_number'];
        $email = $_POST['email'];
        $address = $_POST['city'];
        $birthday = $_POST['birthday'];
        $marital_status = $_POST['marital_status'];
        $addemp_query = "insert into employee_details values('$emp_id','$first_name','$last_name','$gender','$contact','$email','$address','$birthday','$marital_status');";

        $job_id = $_POST['job_id'];
        $sup_id = $_POST['sup_id'];
        $status_id = $_POST['status_id'];
        $branch_id = $_POST['branch_id'];
        $pay_grade = $_POST['pay_grade'];
        $dept_name = $_POST['dept_name'];
        $employment_query = "insert into employment values('$emp_id','$job_id','$status_id','$branch_id','$pay_grade','$dept_name');";
        $sup_query = "insert into supervisor values('$emp_id','$sup_id');";

        $emg_no = $_POST['emg_con_no'];
        $emg_name = $_POST['emg_con_name'];
        $emg_query = "insert into emergency_contact values('$emp_id','$emg_no','$emg_name');";
        
        $bank_name = $_POST['bank_name'];
        $acc_no = $_POST['account_no'];
        $bank_query = "insert into bank_details values('$emp_id','$acc_no','$bank_name');";

        $get_leaves_query = "SELECT leave_type, no_of_leaves FROM default_leaves WHERE pay_grade_id='$pay_grade';";
        $result_set = mysqli_query($connection,$get_leaves_query);
        while($row = mysqli_fetch_assoc($result_set)){
            switch($row['leave_type']){
                case "annual":
                    $annual = $row['no_of_leaves'];
                    break;
                case "casual":
                    $casual = $row['no_of_leaves'];
                    break;
                case "maternity":
                    if($gender=='male'){
                        $maternity = 0;
                    }else{
                        $maternity = $row['no_of_leaves'];
                    }
                    break;
                case "no-pay":
                    $nopay = $row['no_of_leaves'];
                    break;
                }
        }
        $set_annual_leaves = "insert into remain_leaves values('$emp_id','annual','$annual');";
        $set_casual_leaves = "insert into remain_leaves values('$emp_id','casual','$casual');";
        $set_maternity_leaves = "insert into remain_leaves values('$emp_id','maternity','$maternity');";
        $set_no_pay_leaves = "insert into remain_leaves values('$emp_id','no-pay','$nopay');";
        
        mysqli_autocommit($connection,FALSE);
        $emp_added ="";
        mysqli_query($connection, $addemp_query);
        mysqli_query($connection, $employment_query);
        mysqli_query($connection, $sup_query);
        mysqli_query($connection, $emg_query);
        mysqli_query($connection, $bank_query);
        mysqli_query($connection, $set_annual_leaves); 
        mysqli_query($connection, $set_casual_leaves); 
        mysqli_query($connection, $set_maternity_leaves); 
        mysqli_query($connection, $set_no_pay_leaves);                 
                
        if (!mysqli_commit($connection)) {
            $emp_added = "Commit transaction failed";
            echo '<script type ="text/JavaScript">';  
            echo "alert('$emp_added')";  
            echo '</script>';
            exit();
        }else{
            $emp_added = "Employee added successfully !";
            echo '<script type ="text/JavaScript">';  
            echo "alert('$emp_added')";  
            echo '</script>';
        }
        
        header("location: ./addEmployee.php");
       
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7dd60dd937.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="bigbox">
        <div class="main-container d-flex leftside ">
            <div class = "sidebar" id="side_nav">
                <div class="header-box px-2 pt-3 pb-4">
                    <h1 class="fs-4"><span class="gb-white text-white rounded shadow px-2 me-2"><i class="fa-sharp fa-solid fa-sun"></i></span><span class="text-white">BPNL</span></h1>
                    <button class="btn d-md-none d-block close-btn px-1 py-0"><i class="far fa-stream"></i></button>
                </div>
                <div>
                    <ul class="list-unstyled px-2">
                        <li class=""><a href ="hr_manager.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-home"></i>Dashboard</li>
                        <li class=""><a href ="hr_profile.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i>Profile</li>
                        <li class=""><a href ="hr_employers.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-users"></i>Employers</li>
                        <li class="active"><a href ="hr_create_or_add.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user-plus"></i>Add employee</li>
                        <li class=""><a href ="hr_salary.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-money-bill-wave"></i>Salary</li>
                        <li class=""><a href ="hr_leave.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-file-medical-alt"></i>Leave</li>
                    </ul>
                    <ul class="list-unstyle px-2">
                        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="rightside">
        <?php require_once("../navibar.php") ?>
        <form action="addEmployee.php" method="post">
                
            <table style="color:black; margin:4%; padding: 5%; width:90%; height:100%;">
                <h3 style="color:#808080; padding-top:20px; text-align:center;">Personal Details</h3>
                <tr>
                    <td>Employee ID</td>
                    <td><input type="text" value= <?php echo $emp_count +1; ?> name="emp_id" id="1" readonly></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" placeholder="Employee First Name" name="first_name" id=""></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" placeholder="Employee Last Name" name="last_name" id=""></td>
                </tr>  
                <tr>
                    <td>Gender</td>
                    <td>
                    <input type="radio" id="" name="gender" value="male">
                    <label>male</label>
                    <input type="radio" id="" name="gender" value="female">
                    <label>female</label>
                    <input type="radio" id="" name="gender" value="other">
                    <label>other</label>
                    </td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><input type="tel" placeholder="xxxxxxxxxx" id="" name="contact_number" pattern="[0-9]{10}"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" placeholder="@" id="" name="email"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" placeholder="" id="" name="city"></td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td><input type="date" id="" name="birthday"></td>
                </tr>
                <tr>
                    <td>Marital Status</td>
                    <td>
                    <input type="radio" id="" name="marital_status" value="single">
                    <label>Single</label>
                    <input type="radio" id="" name="marital_status" value="married">
                    <label>Married</label>
                    <input type="radio" id="" name="marital_status" value="other">
                    <label>Other</label>
                    </td>
                </tr>
            </table>

            <h3 style="color:#808080; text-align:center; ">Emergency Details</h3>
            <table style="color:black; margin:4%; padding: 5%; width:90%; height:100%;">

                    <tr>
                        <td>Emergency Contact</td>
                        <td><input type="tel" placeholder="xxxxxxxxxx" id="" name="emg_con_no" pattern="[0-9]{10}"></td>
                    </tr>
                    <tr>
                        <td>Emergency Contact Name</td>
                        <td><input type="text" placeholder="" name="emg_con_name" id=""></td>
                    </tr>
            </table>

            <h3 style="color:#808080; text-align:center; padding-top:20px">Employment</h3>
            <table style="color:black; margin:4%; padding: 5%; width:90%; height:100%;">
                    <tr>
                        <td>Job</td>
                        <td><select name="job_id">
                            <option value="2">Accountant</option>
                            <option value="3">Software Engineer</option>
                            <option value="4">QA Engineer</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td><select name="dept_name">
                            <option value="HR Department">HR Department</option>
                            <option value="Marketing Department">Marketing Department</option>
                            <option value="Business Department">Business Department</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Supervisor Employee ID</td>
                        <td><input type="text" name="sup_id" value ="null" id=""></td>
                    </tr>
                    <tr>
                        <td>Employment Status</td>
                        <td><select name="status_id">
                            <option value="1">Intern - Part time</option>
                            <option value="2">Intern - Full time</option>
                            <option value="3">Contract - Part time</option>
                            <option value="4">Contract - Full time</option>
                            <option value="5">Permanent</option>
                            <option value="6">Freelance</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Branch</td>
                        <td><select name="branch_id">
                            <option value="1">Sri Lanka</option>
                            <option value="2">Bangaladesh</option>
                            <option value="3">Parkistan</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Pay Grade</td>
                        <td><select name="pay_grade">
                            <option value="1">Level 01</option>
                            <option value="2">Lavel 02</option>
                            <option value="3">Level 03</option>
                            <option value="4">Level 04</option>
                        </select></td>
                    </tr>

            </table>
            <h3 style="color:#808080; text-align:center; padding-top:20px">Bank Details</h3>

            <table style="color:black; margin:4%; padding: 5%; width:90%; height:100%;">
                    <tr>
                        <td>Bank Name</td>
                        <td><input type="text" id="" name="bank_name" ></td>
                    </tr>
                    <tr>
                        <td>Account Number</td>
                        <td><input type="text" name="account_no" id=""></td>
                    </tr>
                    <tr><td></td><td style="padding-top: 20px; text-align:center;"><input type="submit" value="Add" name="submit" ></td></tr>
                
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