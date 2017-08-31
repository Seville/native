<?php
	//Start session
	session_start();

	//Create connection
	$conn = new mysqli("localhost", "root", "", "jc_stationary");
	
	//Check connection and show error if not connected
	if($conn->connect_error){
		header("Location: http://localhost/PlainJavascript/#signup_error");
	}

	if(getenv('REQUEST_METHOD') == 'POST'){
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']); 
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		
		$password = md5($password);
		
		// the message
		$msg = "Thanks for signing up. Please please copy this link in your browser to verify: ".$_SERVER['HTTP_HOST']."/PlainJavascript/#signup_success";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);
		
		//Parse email content as html
		$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";

		// send email
		mail($_POST['email'],"Welcome to JustinCase stationary",$msg,$headers);
		
		$newUserObj = (object)array("type" => "userinfo", "username" => $username, "email" => $email, "password" => $password);
		$sql = "INSERT INTO customer_info VALUES(NULL, '".$username."', '".$email."', '".$password."',0)";

		if ($conn->query($sql)) {
			$_SESSION["user"] = json_encode($newUserObj);
			header("Location: http://localhost/PlainJavascript/#signup_confirm"); /* Redirect browser */
		}
		$conn->close();
	}
?>