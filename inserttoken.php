<?php

include 'connection.php';

 $con = mysqli_connect($server,$user,$pass,$db_name);
 
 $f_name = $_POST['username'];
 $l_name = $_POST['token'];
 
 
 $Sql_Query = "insert into phone (username,fcmtoken) values ('$f_name','$l_name')";
 
 if(mysqli_query($con,$Sql_Query)){
 
 echo 'Data Inserted Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 }
 mysqli_close($con);
?>