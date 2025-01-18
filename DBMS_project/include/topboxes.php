
<div class="flexbox-container">
            <div class="head_box flex_1" id="empdiv">Employees <i class="fa-solid fa-people-group"></i><br> <?php  echo $emp_count ?></div>
            <div class="head_box flex_2" id ="brndiv">Branches <i class="fas fa-city"></i><br> <?php  echo $branch_count ?></div>
            <div class="head_box flex_3" id ="levdiv">Remaining Leaves <i class="fas fa-heart"></i>
            <br> No-pay :<?php  echo $leave_count ?>
            <?php echo "   |   "?>Annual :<?php  echo $leave_count2 ?>   
            <br> Casual :<?php  echo $leave_count3 ?>
            <?php echo "    |   "?>Maternity :<?php  echo  $leave_count4 ?>
            
        </div>
            <div class="head_box flex_4" id ="saldiv">Salary <i class="fas fa-sack-dollar"></i><br> <?php  echo $salary_amount ?></div>
        </div>