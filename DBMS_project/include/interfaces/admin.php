<?php session_start(); ?>
<?php include_once "../connection.php"; 

    $username=$_SESSION['user_name'];

    $empquary="SELECT COUNT(*) AS totalemp FROM employee_details";
    $emp_result=mysqli_query($connection,$empquary);
    $emp_data=mysqli_fetch_assoc($emp_result);
    $emp_count=$emp_data['totalemp']-1;

    $branchquary="SELECT COUNT(*) AS totalbr FROM branch";
    $branch_result=mysqli_query($connection,$branchquary);
    $branch_data=mysqli_fetch_assoc($branch_result);
    $branch_count=$branch_data['totalbr'];



    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="../../css/admin_dash.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7dd60dd937.js" crossorigin="anonymous"></script>
    <?php require_once("../dept_script_pie.php") ?>


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
                        <li class="active"><a href ="admin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-home"></i>Dashboard</li>
                        <li class=""><a href ="admin_profile.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i>Profile</li>
                        <li class=""><a href ="admin_employers.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-users"></i>Employers</li>
                        <li class=""><a href ="admin_addEmployee.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user-plus"></i>Add employee</li>
                    </ul>
                    <ul class="list-unstyle px-2">
                        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="rightside">
            <?php require_once("../navibar.php") ?>
            <div class="upperbar"><?php require_once("../topslides.php") ?></div>
            <?php require_once("../admin_topboxes.php") ?>
            <div id="piechart" style="width: 900px; height: 500px;"></div>
            <?php require_once("../footer.php") ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../js/empdash.js"></script>
    
    <script>
        $(".sidebar ul li").on('click' , function(){
            $(".sidebar ul li.active").removeClass('active');
            $(this).addClass('active');
        })
    </script>

    
    
</body>
</html>