<?php session_start(); ?>
<?php include_once "../connection.php";
    $var= $_SESSION['user_name'];
    $sql ="select emp_id from user where user_name='$var'";
    $result = mysqli_query($connection,$sql); 
    $data= mysqli_fetch_assoc($result);
    $ans = $data['emp_id'];
    //$to ='lakshitha.20@cse.mrt.ac.lk';
    //$subject='test msg';
    //$body='this is a test msg';

    //$sendmail=mail($to,$subject,$body);

    if(isset($_GET['id'])){
        $leave_id=$_GET['id'];
        //echo $leave_id;
        $sql1="UPDATE leave_req SET leave_status='Rejected' WHERE leave_id='$leave_id'";
        mysqli_query($connection,$sql1);

        // email starts
        $sql6="select leave_date,emp_id from leave_req where leave_id='$leave_id'";
        $result6=mysqli_query($connection,$sql6);
        $data6=mysqli_fetch_assoc($result6);

        $leave_date=$data6['leave_date'];
        $emp_id=$data6['emp_id'];
        //echo $leave_date;
        //echo $emp_id;


        $sql5="select first_name,last_name,email from employee_details where emp_id='$emp_id'";
        $result5=mysqli_query($connection,$sql5);
        $data5=mysqli_fetch_assoc($result5);
        $first_name=$data5['first_name'];
        //echo $first_name;
        $last_name=$data5['last_name'];
        //echo $last_name;
        $email=$data5['email'];
        //echo $email;

        $subject="Leave Rejected";
        $body="Dear "."$first_name ,"."\n"."Your leave request for "."$leave_date "."has been rejected.";
        //echo $body;
        $sendmail=mail($email,$subject,$body);
        // email end
    }
header('location: leaveapprove.php');  
?>

