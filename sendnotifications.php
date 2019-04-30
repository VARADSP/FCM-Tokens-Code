<?php
require "connection.php";

//$user_name = $_POST["user_name"];

$con = mysqli_connect($server,$user,$pass,$db_name);


//$user_pass = $_POST["password"];

$response = "";

$mysql_qry = "select * from phone";

$ex = $con->query($mysql_qry);


$noOfRows = mysqli_num_rows($ex);
//$posts = array();




function send_notification($token)
{
	echo 'Hello';
define( 'API_ACCESS_KEY', 'AAAA_zZvwu8:APA91bFDCJtboZZducKKpcdzCtToG7BDbu4FcEsXXgwGQ0TOFSD8iL1H1oQ_WABK9Df3KP_i8OsOvdSE_fEBU4cvdGvh1sSeEq7PoqnMpVHBXQ5XIJZ5rVOKDXaCOnjW6CDq2Zu1_cz-');
 //   $registrationIds = ;
#prep the bundle
     $msg = array
          (
		'body' 	=> 'Firebase Push Notification',
		'title'	=> 'VSP',
             	
          );
	$fields = array
			(
				'to'		=> $token,
				'notification'	=> $msg
			);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		echo $result;
		curl_close( $ch );
}


if(mysqli_num_rows($ex) > 0){
	while($rw = $ex->fetch_object()){
	//
	 $tokenid = $rw->token;
	 
	 send_notification($tokenid);
	 
	 
	// $surname = $rw->surname;
	// $age = $rw->age;
	// $username = $rw->username;
	// $password = $rw->password;
//$posts[] = array('rows'=>$rw);
	//
	// $response = $response . $name ."," . $surname . "";



}
//echo json_encode(array('rows'=>$posts));

}
else {

  echo "Failed To Fetch";
}




 ?>
