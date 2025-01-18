<?php session_start(); ?>
<?php include_once "../connection.php"; ?>
<?php
    if(isset($_POST['submit'])){
        $nemp_id = $_POST['emp_id'];
        $nfirst_name = $_POST['first_name'];
        $nlast_name = $_POST['last_name'];
        $ngender = $_POST['gender'];
        $ncontact= $_POST['contact_number'];
        $nemail = $_POST['email'];
        $naddress = $_POST['city'];
        $nbirthday = $_POST['birthday'];
        $nmarital_status = $_POST['marital_status'];
        $addemp_query = "UPDATE employee_details SET first_name='$nfirst_name', last_name= '$nlast_name', gender = '$ngender', contact_number = '$ncontact', email = '$nemail', city = '$naddress', birthday = '$nbirthday', marital_status = '$nmarital_status' WHERE employee_details.emp_id = '$nemp_id';";

        $njob_id = $_POST['job_id'];
        $nsup_id = $_POST['sup_id'];
        $nstatus_id = $_POST['status_id'];
        $nbranch_id = $_POST['branch_id'];
        $npay_grade = $_POST['pay_grade'];
        $ndept_name = $_POST['dept_name'];
        $employment_query = "UPDATE employment SET job_id = '$njob_id', `status_id` = '$nstatus_id', `branch_id` = '$nbranch_id', `dept_name` = '$ndept_name' WHERE `employment`.`emp_id` = '$nemp_id';";
        $sup_query = "UPDATE `supervisor` SET `sup_id` = '$nsup_id' WHERE `supervisor`.`emp_id` = '$nemp_id';";

        $nemg_no = $_POST['emg_con_no'];
        $nemg_name = $_POST['emg_con_name'];
        $emg_query = "UPDATE `emergency_contact` SET `emg_con_no` = '$nemg_no', `emg_con_name` = '$nemg_name' WHERE `emergency_contact`.`emp_id` = '$nemp_id';";
        
        $nbank_name = $_POST['bank_name'];
        $nacc_no = $_POST['account_no'];
        $bank_query = "UPDATE `bank_details` SET `account_no` = '$nacc_no', `bank_name` = '$nbank_name' WHERE `bank_details`.`emp_id` = '$nemp_id';";


        mysqli_autocommit($connection,FALSE);
        $emp_added ="";
        mysqli_query($connection, $addemp_query);
        mysqli_query($connection, $employment_query);
        mysqli_query($connection, $sup_query);
        mysqli_query($connection, $emg_query);
        mysqli_query($connection, $bank_query);
              
                
        if (!mysqli_commit($connection)) {
            $emp_added = "Commit transaction failed";
            echo '<script type ="text/JavaScript">';  
            echo "alert('$emp_added')";  
            echo '</script>';
            exit();
        }else{
            $emp_added = "Employee updated successfully !";
            echo '<script type ="text/JavaScript">';  
            echo "alert('$emp_added')";  
            echo '</script>';
        }
        header("location: hr_employers.php");
    }
?>