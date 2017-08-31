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
		//Clean up form inputs
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']); 
		$password = mysqli_real_escape_string($conn, $_POST['password']); 
		
		//Track status of sigunup process
		$action = array();
		$action['result'] = null;
		$text = array();
		
		if(empty($username)){
			$action['result'] = 'error';
			array_push($text, 'You forgot your username');
		}
		if(empty($email)){
			$action['result'] = 'error';
			array_push($text, 'You forgot your email');
		}
		if(empty($password)){
			$action['result'] = 'error';
			array_push($text, 'You forgot your password');
		}
		
		if($action['result'] != 'error'){
			//if no errors continue with signup_error
			// use of hashing function md5
			$password = md5($password);
		}
		
		$action['text'] = $text;
		
		$newUserObj = (object)array("type" => "userinfo", "username" => $username, "email" => $email, "password" => $password);
		$sql = "INSERT INTO customer_info VALUES(NULL, '".$username."', '".$email."', '".$password."',0)";

		if ($conn->query($sql)) {
			//get the new user id
			$userid = mysqli_insert_id();
			
			//create a random key
			$key = $username . $email . date('mY');
			$key = md5($key);
			
			//add confirm row
			$confirm = $conn->query("INSERT INTO 'confirm' VALUES (NULL, '".$userid."','".$key."','".$email."')");
			
			if($confirm){
				
			}
		} else {
			//$conn->error
		}
		$conn->close();
	}
?>