<?php session_start(); ?>
<?php include_once "../connection.php"; ?>

<?php
    $emp_id="";
    $first_name = "";
    $last_name = "";
    $gender = "";
    $contact= "";
    $email = "";
    $address = "";
    $birthday = "";
    $marital_status ="";
    $job_id = "";
    $status_id = "";
    $branch_id = "";
    $pay_grade = "";
    $dept_name = "";
    $bank_name = "";
    $acc_no = "";
    $emg_no = "";
    $emg_name = "";
    $sup_id = "";

    if(isset($_GET['id'])){
        $emp_id = $_GET['id'];

        $query_emp_details = "SELECT * FROM employee_details WHERE employee_details.emp_id ='$emp_id';";
        $result_set1 = mysqli_query($connection,$query_emp_details);
        $record1 = mysqli_fetch_assoc($result_set1);
        
        $first_name = $record1['first_name'];
        $last_name = $record1['last_name'];
        $gender = $record1['gender'];
        $contact= $record1['contact_number'];
        $email = $record1['email'];
        $address = $record1['city'];
        $birthday = $record1['birthday'];
        $marital_status = $record1['marital_status'];

        $query_employment = "SELECT * FROM employment WHERE employment.emp_id ='$emp_id';";
        $result_set2 = mysqli_query($connection,$query_employment);
        $record2 = mysqli_fetch_assoc($result_set2);       
        $job_id = $record2['job_id'];
        $status_id = $record2['status_id'];
        $branch_id = $record2['branch_id'];
        $pay_grade = $record2['pay_grade_id'];
        $dept_name = $record2['dept_name'];

        $query_emergency = "SELECT * FROM emergency_contact WHERE emergency_contact.emp_id ='$emp_id';";
        $result_set3 = mysqli_query($connection,$query_emergency);
        $record3 = mysqli_fetch_assoc($result_set3);
        $emg_no = $record3['emg_con_no'];
        $emg_name = $record3['emg_con_name'];

        $query_bank_details = "SELECT * FROM bank_details WHERE bank_details.emp_id ='$emp_id';";
        $result_set4 = mysqli_query($connection,$query_bank_details);
        $record4 = mysqli_fetch_assoc($result_set4);
        $bank_name = $record4['bank_name'];
        $acc_no = $record4['account_no'];

        $query_supervisor = "SELECT * FROM supervisor WHERE supervisor.emp_id ='$emp_id';";
        $result_set5 = mysqli_query($connection,$query_supervisor);
        $record5 = mysqli_fetch_assoc($result_set5); 
        $sup_id = $record5['sup_id'];
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
                        <li class="active"><a href ="hr_employers.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-users"></i>Employers</li>
                        <li class=""><a href ="hr_create_or_add.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user-plus"></i>Add employee</li>
                        <li class=""><a href ="hr_salary.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-money-bill-wave"></i>Salary</li>
                        <li class=""><a href ="hr_empleave.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-file-medical-alt"></i>Leave</li>
                    </ul>
                    <ul class="list-unstyle px-2">
                        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="rightside">
    <?php require_once("../navibar.php") ?>
        <form action="updateEmployee2.php" method="post">
            <table style="color:black; margin:4%; padding: 5%; width:90%; height:100%;">
                    <h3 style="color:#808080; padding-top:20px; text-align:center;">Personal Details</h3>
                        <tr>
                            <td>Employee ID</td>
                            <td><input type="text" value= <?php echo $emp_id; ?> name="emp_id" id="1" readonly></td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td><input type="text" value= <?php echo $first_name; ?> name="first_name" id=""></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><input type="text" value= <?php echo $last_name; ?> name="last_name" id=""></td>
                        </tr>  
                        <tr>
                            <td>Gender</td>
                            <td>
                            <input type="radio" id="" name="gender" value="male" <?php if ($gender == 'male') echo "checked='checked'";?>>
                            <label>male</label>
                            <input type="radio" id="" name="gender" value="female" <?php if ($gender == 'female') echo "checked='checked'";?>>
                            <label>female</label>
                            <input type="radio" id="" name="gender" value="other" <?php if ($gender == 'other') echo "checked='checked'";?>>
                            <label>other</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td><input type="tel" value= <?php echo $contact; ?> id="" name="contact_number" pattern="[0-9]{10}"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" value= <?php echo $email; ?> id="" name="email"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" value= <?php echo $address; ?> id="" name="city"></td>
                        </tr>
                        <tr>
                            <td>Birthday</td>
                            <td><input type="date"  value=<?php echo $birthday; ?> id="" name="birthday"></td>
                        </tr>
                        <tr>
                            <td>Marital Status</td>
                            <td>
                            <input type="radio" id="" name="marital_status" value="single" <?php if ($marital_status == 'single') echo "checked='checked'";?>>
                            <label>Single</label>
                            <input type="radio" id="" name="marital_status" value="married" <?php if ($marital_status == 'married') echo "checked='checked'";?>>
                            <label>Married</label>
                            <input type="radio" id="" name="marital_status" value="other" <?php if ($marital_status == 'other') echo "checked='checked'";?>>
                            <label>Other</label>
                            </td>
                        </tr>
            </table>
                

            <table style="color:black; margin:4%; padding: 5%; width:90%; height:100%;">
                    <h3 style="color:#808080; text-align:center; ">Emergency Details</h3>                        <tr>
                            <td>Emergency Contact</td>
                            <td><input type="tel" value= <?php echo $emg_no; ?> id="" name="emg_con_no" pattern="[0-9]{10}"></td>
                        </tr>
                        <tr>
                            <td>Emergency Contact Name</td>
                            <td><input type="text" value= <?php echo $emg_name; ?> name="emg_con_name" id=""></td>
                        </tr>
            </table>

            <table style="color:black; margin:4%; padding: 5%; width:90%; height:100%;">
                    <h3 style="color:#808080; text-align:center; padding-top:20px">Employment</h3>
                        <tr>
                            <td>Job</td>
                            <td><select name="job_id" value= <?php echo $job_id; ?>>
                                <option value="2" <?php if ($job_id == 2) echo "selected='selected'";?>>Accountant</option>
                                <option value="3" <?php if ($job_id == 3) echo "selected='selected'";?>>Software Engineer</option>
                                <option value="4" <?php if ($job_id == 4) echo "selected='selected'";?>>QA Engineer</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td><select name="dept_name">
                                <option value="HR Department" <?php if ($dept_name == "HR Department") echo "selected='selected'";?>>HR Department</option>
                                <option value="Marketing Department" <?php if ($dept_name == "Marketing Department") echo "selected='selected'";?>>Marketing Department</option>
                                <option value="Business Department"<?php if ($dept_name == "Business Department") echo "selected='selected'";?>>Business Department</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Supervisor Employee ID</td>
                            <td><input type="text" name="sup_id" value=<?php echo $sup_id; ?>></td>
                        </tr>
                        <tr>
                            <td>Employment Status</td>
                            <td><select name="status_id">
                                <option value="1" <?php if ($status_id == 1) echo "selected='selected'";?>>Intern - Part time</option>
                                <option value="2" <?php if ($status_id == 2) echo "selected='selected'";?>>Intern - Full time</option>
                                <option value="3" <?php if ($status_id == 3) echo "selected='selected'";?>>Contract - Part time</option>
                                <option value="4" <?php if ($status_id == 4) echo "selected='selected'";?>>Contract - Full time</option>
                                <option value="5" <?php if ($status_id == 5) echo "selected='selected'";?>>Permanent</option>
                                <option value="6" <?php if ($status_id == 6) echo "selected='selected'";?>>Freelance</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Branch</td>
                            <td><select name="branch_id" >
                                <option value="1" <?php if ($branch_id == 1) echo "selected='selected'";?>>Sri Lanka</option>
                                <option value="2" <?php if ($branch_id == 2) echo "selected='selected'";?>>Bangaladesh</option>
                                <option value="3" <?php if ($branch_id == 3) echo "selected='selected'";?>>Parkistan</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Pay Grade</td>
                            <td><select name="pay_grade">
                                <option value="1" <?php if ($pay_grade == 1) echo "selected='selected'";?>>Level 01</option>
                                <option value="2" <?php if ($pay_grade == 2) echo "selected='selected'";?>>Lavel 02</option>
                                <option value="3" <?php if ($pay_grade == 3) echo "selected='selected'";?>>Level 03</option>
                                <option value="4" <?php if ($pay_grade == 4) echo "selected='selected'";?>>Level 04</option>
                            </select></td>
                        </tr>
            </table>
        
            <table style="color:black; margin:4%; padding: 5%; width:90%; height:100%;">
                    <h3 style="color:#808080; text-align:center; padding-top:20px">Bank Details</h3>
                        <tr>
                            <td>Bank Name</td>
                            <td><input type="text" value= <?php echo $bank_name; ?> id="" name="bank_name" ></td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td><input type="text" value= <?php echo $acc_no; ?> name="account_no" id=""></td>
                        </tr>
                        <tr><td></td><td style="padding-top: 20px; text-align:center;"><input type="submit" value="Update" name="submit" ></td></tr>
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