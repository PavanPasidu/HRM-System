<?php require_once("connection.php") ?>
<?php
    $user_name = $_SESSION['user_name'];
    $query_id = "SELECT emp_id FROM user WHERE user_name='$user_name'";
    $result_set_id =  mysqli_query($connection,$query_id);
    $record_id = mysqli_fetch_assoc($result_set_id);
    $emp_id = $record_id['emp_id'];

    $query = "SELECT * FROM payroll WHERE emp_id='$emp_id'";
    $result_set = mysqli_query($connection, $query);
    $record = mysqli_fetch_all($result_set, MYSQLI_ASSOC);
?>

<h3><b>Salary Details</b></h3>
<table>
    <tr>
        <th><b>Pay Day</b></th>
        <th><b>Payment</b></th>
    </tr>
    <?php foreach ($record as $row) {?>
    <tr>
        <td><b><?php echo $row['pay_date']; ?></b></td>
        <td><b><?php echo $row['payment']; ?></b></td>
    </tr>
    <?php } ?>
</table>