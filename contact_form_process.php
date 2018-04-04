<?php
	//print_r($_POST);
	
	$name="";
	$phone="";
	$email="";
	$msg="";
	$name_error="";
	$phone_error="";
	$email_error="";
	$msg_error="";
	//form is submitted with POST method 
	
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(empty($_POST["name"])){
			$name_error="Name is required";
		}else{
			$name=test_input($_POST["name"]);
			
			//check if name contain letters and whitespaces only
			
			if(!preg_match("/^[a-zA-Z]*$/",$name)){
				$name_error="Only letters and whitespaces allowed";
			}
		}
		
		if(empty($_POST["phone"])){
			$phone_error="Phone Number required";
		}else{
			$phone=test_input($_POST["phone"]);
			//check for valid phone number
						
			if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)){
				$phone_error="Invalid phone number";
			}
		}
		
		if(empty($_POST["email"])){
			$email_error="E-mail Number required";
		}else{
			$email=test_input($_POST["email"]);
			//check for valid email
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$email_error="Invalid E-mail";
			}
		}
		
		if(empty($_POST["msg"])){
			$msg="";
		}else{
			$msg=test_input($_POST["msg"]);
			}
		
		if($name_error=="" and $phone_error="" and $email_error="" and $ms=""){
			$message='';
			unset($_POST['submit']);
			foreach($_POST as $key => $value){
				$message .="$key : $value \n";
			}
			$to='samuelwendolin2@gmail.com';
			$subject="CONTACT FROM WEBSITE"
			if(mail($to,$subject,$message)){
				$success="Your Message have been sent successfully";
				$name=$phone=$email=$msg='';
			}
		}
	}
		
		function test_input($data){
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
			
	
?>

