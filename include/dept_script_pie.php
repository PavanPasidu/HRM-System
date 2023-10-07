<?php


$depat1_quary="SELECT COUNT(*) AS dept1 from employment where dept_name='HR Department'";
$depat1_result=mysqli_query($connection,$depat1_quary);
$depat1_data=mysqli_fetch_assoc($depat1_result);
$depat1_count=$depat1_data['dept1'];

$depat2_quary="SELECT COUNT(*) AS dept2 from employment where dept_name='Business Department'";
$depat2_result=mysqli_query($connection,$depat2_quary);
$depat2_data=mysqli_fetch_assoc($depat2_result);
$depat2_count=$depat2_data['dept2'];

$depat3_quary="SELECT COUNT(*) AS dept3 from employment where dept_name='Marketing Department'";
$depat3_result=mysqli_query($connection,$depat3_quary);
$depat3_data=mysqli_fetch_assoc($depat3_result);
$depat3_count=$depat3_data['dept3'];
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'department Distribution'],
          ['HR Department',     <?php echo $depat1_count; ?>],
          ['Business Department',   <?php echo $depat2_count; ?>],
          ['Marketing Department',  <?php echo $depat3_count; ?>],
        ]);

        var options = {
          title: 'Department Distribution'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>