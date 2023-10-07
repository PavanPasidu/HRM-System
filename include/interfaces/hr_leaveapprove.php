<?php session_start(); ?>
<?php include_once "../connection.php";
    $var= $_SESSION['user_name'];
    $sql ="select emp_id from user where user_name='$var'";
    $result = mysqli_query($connection,$sql); 
    $data= mysqli_fetch_assoc($result);
    $ans = $data['emp_id'];
    //echo $ans;

    $sql1="select leave_id,leave_type,leave_date,leave_count,leave_status from leave_req where emp_id='$ans'";
    $result1=mysqli_query($connection,$sql1);
    $data1=mysqli_fetch_all($result1,MYSQLI_ASSOC);
    //$dum=$data1['leave_id'];
    //echo $dum;

    $sql2="select count(*) AS empcount from supervisor where sup_id='$ans'";
    $result2=mysqli_query($connection,$sql2);
    $data2=mysqli_fetch_assoc($result2);
    $count=$data2['empcount'];

    // this is to check the employee is a supervisor or not
    //$sql3="select supervisor.sup_id AS empcount from supervisor where sup_id='$ans'";
    //$result3=mysqli_query($connection,$sql3);
    //$data3=mysqli_fetch_assoc($result3);
    //$count=$data3['empcount'];
    //echo $count;
    // this is to check the employee is a supervisor or not
    
    $sql3="select supervisor.emp_id as empid,leave_req.leave_id as leaveid,leave_req.leave_type as leavetype,leave_req.leave_date as leavedate,leave_req.leave_count as leavecount,remain_leaves.remain_leaves as remainleaves,leave_req.leave_status as leavestatus,leave_req.reason as reason from supervisor join leave_req on supervisor.emp_id=leave_req.emp_id join remain_leaves on remain_leaves.emp_id=leave_req.emp_id where leave_req.leave_type=remain_leaves.leave_type and supervisor.sup_id='$ans' and leave_req.leave_status='pending'";
    $result3=mysqli_query($connection,$sql3);
    $data3=mysqli_fetch_all($result3,MYSQLI_ASSOC);

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
        .btn{
            border: none;
            color: white;
            padding: 15px 32px;
        }
        table{
            border-collapse: collapse;
            table-layout: fixed;
            width: 100%;
            overflow: hidden;
            text-align: center;
            
        }
        td{
            background-color: #E4F5D4;
            font-weight: bold;;
            padding: 5px;
            border: 1px solid black;
        }
        th{
            font-weight: bold;;
            padding: 5px;
            border: 1px solid black;
            text-align: center;
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
                    <li class=""><a href ="hr_manager.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-home"></i>Dashboard</li>
                    <li class=""><a href ="hr_profile.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i>Profile</li>
                    <li class=""><a href ="hr_employers.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-users"></i>Employers</li>
                    <li class=""><a href ="hr_create_or_add.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user-plus"></i>Add employee</li>
                    <li class=""><a href ="hr_salary.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-money-bill-wave"></i>Salary</li>
                    <li class="active"><a href ="hr_leave.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-file-medical-alt"></i>Leave</li>
                </ul>
                <ul class="list-unstyle px-2">
                    <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"></a></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="rightside">
            <?php require_once("../navibar.php") ?>
            <h1 style="text-align:center; background-color:powderblue">Leave Approve Table</h1>
            <table>
                <tr>
                    <th>Emp ID</th>
                    <th>Leave ID</th>
                    <th>Leave Type</th>
                    <th>Leave Date</th>
                    <th>Leave Count</th>
                    <th>Reason</th>
                    <th>Remaining Leaves</th>
                    <th>Leave Status</th>
                    <th>Decision</th>

                </tr>
                <?php
                foreach ($data3 as $dum)  {?>
                <tr>
                    <td><?php echo $dum['empid'];?></td>
                    <td><?php echo $dum['leaveid'];?></td>
                    <td><?php echo $dum['leavetype'];?></td>
                    <td><?php echo $dum['leavedate'];?></td>
                    <td><?php echo $dum['leavecount'];?></td>
                    <td><?php echo $dum['reason'];?></td>
                    <td><?php echo $dum['remainleaves'];?></td>
                    <td><?php echo $dum['leavestatus'];?></td>
                    <td>
                        <?php 
                            if($dum['leavestatus']=="pending"){
                                echo "<a href=approve.php?id=".$dum['leaveid']." class='btn btn-success'>Approve</a>";
                                echo "<a href=reject.php?id=".$dum['leaveid']." class='btn btn-danger'>Reject</a>";
                            }
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
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