<?php session_start(); ?>
<?php include_once "../connection.php";
    $var= $_SESSION['user_name'];
    $sql ="select emp_id from user where user_name='$var'";
    $result = mysqli_query($connection,$sql); 
    $data= mysqli_fetch_assoc($result);
    $ans = $data['emp_id'];






    if(isset($_GET['id'])){
        $leave_id=$_GET['id'];
        //echo $leave_id;
        //echo "<br>";
        $sql1="UPDATE leave_req SET leave_status='Approved' WHERE leave_id='$leave_id'";
        mysqli_query($connection,$sql1);
        $sql2="select emp_id,leave_type,leave_count from leave_req where leave_id='$leave_id'";
        $result2 = mysqli_query($connection,$sql2);
        $data2= mysqli_fetch_assoc($result2);
        $emp_id=$data2['emp_id'];
        $leave_type=$data2['leave_type'];
        $leave_count=$data2['leave_count'];

        //echo $emp_id;
        //echo "<br>";
        //echo $leave_type;
        //echo "<br>";
        //echo $leave_count;
        //echo "<br>";


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
        
        $subject="Leave Approved";
        $body="Dear "."$first_name ,"."\n"."Your leave request for "."$leave_date "."has been approved.";
        //echo $body;
        $sendmail=mail($email,$subject,$body);
        // email end

        

        $sql3="select remain_leaves from remain_leaves where emp_id='$emp_id' and leave_type='$leave_type'";
        $result3 = mysqli_query($connection,$sql3);
        $data3= mysqli_fetch_assoc($result3);
        $remain_leaves=$data3['remain_leaves'];

        //echo $remain_leaves;
        //echo "<br>";
    

        $updatedrem_leave= $remain_leaves-$leave_count;
        //echo $updatedrem_leave;
        //echo "<br>";

        $sql4="update remain_leaves set remain_leaves='$updatedrem_leave' where emp_id='$emp_id' and leave_type='$leave_type'";
        mysqli_query($connection,$sql4);
        header('location: leaveapprove.php');
    }
?>