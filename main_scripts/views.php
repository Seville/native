<?php
	session_start();
	
	$main = "../main_pages/main.php";
	$signup = "../customer/pages/signup.php";
	$signup_confirm = "../customer/pages/signup_confirm.php";
	$signup_success = "../customer/pages/signup_success.php";
	$signup_error = "../customer/pages/signup_error.php";
	$login = "../customer/pages/login.php";
	$login_success = "../customer/pages/login_success.php";
	$login_error = "../customer/pages/login_error.php";
	$pencils = "../main_pages/pencils.php";
	$paper = "../main_pages/paper.php";
	$pens = "../main_pages/pens.php";
	$careers = "../main_pages/careers.php";
	$mission = "../main_pages/mission.php";
	$about = "../main_pages/about.php";
	$returnPolicy = "../main_pages/returnPolicy.php";
	$shippingPolicy = "../main_pages/shippingPolicy.php";
	$termsConditions = "../main_pages/termsConditions.php";
	
	$content;
	
	if(getenv('REQUEST_METHOD') == 'POST'){
		$request = file_get_contents("php://input");
			switch($request){
				case 'mainBanner':
					$content = file_get_contents($main);
					break;
				case 'pencils':
					$content = file_get_contents($pencils);
					break;
				case 'paper':
					$content = file_get_contents($paper);
					break;
				case 'pens':
					$content = file_get_contents($pens);
					break;
				case 'careers':
					$content = file_get_contents($careers);
					break;
				case 'mission':
					$content = file_get_contents($mission);
					break;
				case 'about':
					$content = file_get_contents($about);
					break;
				case 'returnPolicy':
					$content = file_get_contents($returnPolicy);
					break;
				case 'shippingPolicy':
					$content = file_get_contents($shippingPolicy);
					break;
				case 'termsConditions':
					$content = file_get_contents($termsConditions);
					break;
				case 'login':
					$content = file_get_contents($login);
					break;
				case 'signup':
					$content = file_get_contents($signup);
					break;
				case 'signup_success':
					$content = json_encode((object)array("content" => file_get_contents($signup_success), "data" => $_SESSION["user"]));
					break;
				case 'signup_confirm':
					$content = json_encode((object)array("content" => file_get_contents($signup_confirm), "data" => $_SESSION["user"]));
					break;
				case 'login_success':
					$content = json_encode((object)array("content" => file_get_contents($login_success), "data" => "null"));
					break;
				case 'signup_error':
					$content = file_get_contents($signup_error);
					break;
				case 'login_error':
					$content = file_get_contents($login_error);
					break;
				default:
					$content = file_get_contents($main);
			}
	}
	echo ($content);
?>