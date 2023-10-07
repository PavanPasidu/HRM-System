<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="../../css/leave_style.css">
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
        <?php require_once("../navibar.php"); ?>
        <div class="flexboxcontainer_leave">
            <a href="hr_leaveform.php" class="btn"><div class="smbox">Leave Request</div></a>
            <a href="hr_leavedetail.php" class="btn"><div class="smbox">Leave Details</div></a>
            <a href="hr_remainingleaves.php" class="btn"><div class="smbox">Remaining Leaves</div></a>
            <a href="hr_leaveapprove.php" class="btn"><div class="smbox">Leave Approve</div></a>
        </div>
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