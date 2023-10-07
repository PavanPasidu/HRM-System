<?php
    $connection = mysqli_connect('localhost','root','','empmanage');

    if(mysqli_connect_error()){
        die('Database connection fail'.mysqli_connect_error());
    }
        else{
           // echo "Connection Success!";
        }



?>