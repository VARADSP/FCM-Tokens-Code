<?php

include 'connection.php';

 $con = mysqli_connect($server,$user,$pass,$db_name);

 $id = intval($_POST['id']);
 $token = $_POST['token'];


 $Sql_Query = "insert into phone (fcmtoken) values ('$token') where id='$id'";

 if(mysqli_query($con,$Sql_Query)){

 echo 'Data Inserted Successfully';

 }
 else{

 echo 'Try Again';

 }
 mysqli_close($con);
?>
