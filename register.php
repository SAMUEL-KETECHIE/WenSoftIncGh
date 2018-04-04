<?php
include_once('dbConnection.php');

$error= false;

if(isset($_POST['btn-register'])){
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$username=strip_tags($username);
	$username=htmlspecialchars($username);
	
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$email=strip_tags($email);
	$email=htmlspecialchars($email);
	
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$password=strip_tags($password);
	$password=htmlspecialchars($password);
	
	
	if(empty($username)){
		$error= true;
		$usernameError='Please Username Required';
	}
	
	
	//check for valid email
	if(empty($email)){
		$error=true;
		$emailError='Please email required';
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$error=true;
		$emailError='Please input valid email';
	}
	
	
	
	if(empty($password)){
		$error= true;
		$passwordError='Please Password Required';
	}elseif(strlen($password) < 6){
		$error= true;
		$passwordError='Password must be at least six(6) characters';
	}
	
	//Encrypt password
	$password = md5($password);
	
	// Insert data if no error
	
	if(!$error){
		$sql="insert into USERS(username,email,password) 
		value('$username','$email','$password')";
		
		if(mysqli_query($conn,$sql)){
			$successMsg='Registed successfully!!! <a href="login.php">Click here to Login<a> ';			
		}else{
			echo 'Something went wrong'.mysqli_error();
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>NEW USER SIGN UP</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<link rel="shortcut icon" href="icon/icon.png" />
	
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/form-log.css" />
	<link rel="stylesheet" href="css/wenstrap.css" />
	<link rel="stylesheet" href="css/PicEffects.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	
	<style>
	/*Footer Background */
	
		.divimg{
			background-image: url(img/company.png);
			background-repeat: no-repeat;
		}
		
	/*Page Background */
	
		#back{
			background-image: url(bg-img/sign-up.jpg);
			background-repeat: no-repeat;
			background-color: white;
		}
	</style>
	
	<script type="text/JavaScript" src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/bootstrap.js"></script>
	<script type="text/JavaScript" src="js/jquery-3.2.1.js"></script>
	<script type="text/JavaScript" src="js/jquery-3.2.1.min.js"></script>

</head>
<body id="back">
<div id="container" >
	<a href="index.html"><img id="image-wrap" src="img/logo-final.png" alt="wenSoft Inc. Gh."/></a>	
<div id="navMenu">

	<ul>
		<li><a class="list-group-item" href="index.html"><i class="fa fa-home fa-fw fa-1x" aria-hidden="true"></i>&nbsp; HOME</a></li>
		
		<li><a href="#"><i class="fa fa-user fa-fw fa-1x"></i> USER AREA</a>
			<ul>
				<li><a href="register.php"><i class="fa fa-key fa-1x" aria-hidden="true"></i>&nbsp; REGISTER</a></li>
				<li><a href="login.php"><i class="fa fa-sign-in fa-1x" aria-hidden="true"></i>&nbsp; LOGIN</a></li>
				<li><a href="login.php"><i class="fa fa-sign-out fa-1x" aria-hidden="true"></i>&nbsp; LOGOUT</a></li>
			</ul>
		</li>
		
		<li><a href="about_us.html"><i class="fa fa-address-card fa-1x" aria-hidden="true"></i> ABOUT US</a>
			<ul>
				<li><a href="contact_us.html"><i class="fa fa-mobile fa-1x" aria-hidden="true"></i>&nbsp; CONTACT US</a></li>
				<li><a href="locate_us.html"><i class="fa fa-map-marker fa-1x" aria-hidden="true"></i>&nbsp; LOCATION</a></li>
			</ul>
		</li>
		
		<li><a href="#"><i class="fa fa-product-hunt fa-1x" aria-hidden="true"></i>&nbsp; PRODUCTS</a>
			<ul>
				<li><a href="#">SOFTWARES</a></li>
				<li><a href="#">HARDWARES</a></li>
			</ul>
		</li>
		
		<li><a href="#"><i class="fa fa-server" aria-hidden="true"></i>&nbsp; SERVICES</a>
			<ul>
				<li><a href="networking.html">NETWORKING</a></li>
				<li><a href="mobile.html">MOBILE COMPUTING</a></li>
				<li><a href="cloud_comp.html">CLOUD COMPUTING</a></li>
				<li><a href="infus.html">INFRASTRUCTURE</a></li>
				<li><a href="iots.html">IOTS</a></li>
				<li><a href="cyber_sec.html">CYBERSECURITY</a></li>
				<li><a href="db.html">DB ADMINISTRATION</a></li>
				<li><a href="hard_sys.html">HARDWARE &amp; SYSTEM</a></li>
				<li><a href="desktop.html">DESKTOP</a></li>
			</ul>
		</li>
		
		<li><a class="list-group-item" href="#"><i class="fa fa-book fa-fw fa-1x" aria-hidden="true"></i>&nbsp; TUTORIALS</a> 
			<ul>
				<li><a href="#">JAVA WORLD</a></li>
				<li><a href="#">WEB DEV</a></li>
				<li><a href="#">NETWORKING</a></li>
			</ul>
		</li>
		
		<li><a href="#"><i class="fa fa-internet-explorer" aria-hidden="true"></i>&nbsp; ONLINE</a>
			<ul>
				<li><a href="https://tonaton.com/en/ads" target="_blanc"><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i>&nbsp; BUY</a></li>
				<li><a href="https://www.tonaton.com" target="_blanc"><i class="fa fa-money fa-1x" aria-hidden="true"></i>&nbsp; SELL</a></li>
			</ul>
		</li>
		
	</ul>
		
	<br class="clearFloat">
		
	</div>	<!--end of navMenu-->
	
	<div id="form-log" style=" background-image: url(bg-img/sign.jpg); background-repeat: no-repeat;">
	<center>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off">
			<br>
			<br>
			<h3> SIGN UP </h3>
			<hr>
			<?php
				if(isset($successMsg)){
			?>
				<div class="alert alert-success">
					<span class="fa fa-info-circle"></span>
					<?php echo $successMsg; ?>
				</div>
			<?php
				}
			?>
			<div class="form-group">
				<label for="username" class="label fa fa-user fa-1x" aria-hidden="true" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USERNAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<input name="username" id="username" type="text" class="form-control" autocomplete="off" placeholder="ENTER YOUR FULL NAME" required></input>
				<br>
				<span style="color:red"><?php if(isset($usernameError)) echo $usernameError;?></span>
			</div>
			
			<div class="form-group">
				<label for="email" class="label fa fa-envelope fa-1x" aria-hidden="true" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-MAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<input name="email" id="email" type="email" class="form-control" autocomplete="off" placeholder="ENTER YOUR E-MAIL" required></input>
				<br>
				<span style="color:red"><?php if(isset($emailError)) echo $emailError;?></span>
			</div>
			
			<div class="form-group">
				<label for="password" class="label fa fa-unlock-alt fa-1x" aria-hidden="true">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PASSWORD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<input name="password" id="password" type="password" class="form-control" autocomplete="off" placeholder="CREATE A PASSWORD" required></input>
				<br>
				<span style="color:red"><?php if(isset($passwordError)) echo $passwordError;?></span>
			</div>
				<hr>
			<div class="form-group">
				<center><button class="btn-danger form-control" type="submit" name="btn-register">SIGN UP</button></center>
			</div>
		</form>
	</center>
	<h5 style="color: white; background: black;">If you have signed up already, please login here!!! <a href="login.php" style="text-decoration: none">Login</a></h5>
		
	</div>
	
		
	<!-- Sroll Button -->
	<a href="#top" id="to-top" class="btn btn-primary"><i class="fa fa-angle-up"></i></a>
	
	<!-- Footer code -->
	<footer class="foot">
		<div class="foot-div divimg">
		<br>
			<a href="index.html"><i class="fa fa-home fa-1x" aria-hidden="true"></i> HOMEPAGE</a>
			<a href="about_us.html"><i class="fa fa-address-card fa-1x" aria-hidden="true"></i> ABOUT US</a>
			<a href="contact_us.html"><i class="fa fa-mobile fa-1x" aria-hidden="true"></i>&nbsp; CONTACT US</a>
			<a href="locate_us.html"><i class="fa fa-map-marker fa-1x" aria-hidden="true"></i>&nbsp; LOCATION</a>
			<a href="register.php"><i class="fa fa-key fa-1x" aria-hidden="true"></i>&nbsp; REGISTER</a>
			<a href="login.php"><i class="fa fa-sign-in fa-1x" aria-hidden="true"></i>&nbsp; LOGIN</a>
			<a href="login.php"><i class="fa fa-sign-out fa-1x" aria-hidden="true"></i>&nbsp; LOGOUT</a><br><br>
			<a href="networking.html">NETWORKING</a>
			<a href="mobile.html">MOBILE</a>
			<a href="infus.html">INFRASTRUCTURE SERVICES</a>
			<a href="cyber_sec.html">CYBERSECURITY</a><br><br>
			<a href="iots.html">INTERNET OF THINGS</a>
			<a href="#">SERVICES</a>
			<a href="cloud_comp.html">CLOUD COMPUTING</a>
			<a href="hard_sys.html">HARDWARE &amp; SYSTEM ADMINISTRATION</a>
			<br>
			<h3 >You Can Also Visit Us On The Following:</h3>
			<ul>
				<a href="https://www.facebook.com/wendolin.samuel" target="_blanc"> <i class="fa fa-facebook-square fa-4x btn btn-danger" aria-hidden="true"></i></a>
				<a href="https://www.linkedin.com/in/samuel-ketechie-988b44113/" target="_blanc" > <i class="fa fa-linkedin-square fa-4x btn btn-danger" aria-hidden="true"></i></a>
				<a href="https://twitter.com/samuelwendolin2" target="_blanc" > <i class="fa fa-twitter-square fa-4x btn btn-danger" aria-hidden="true"></i></a>
				<a href="https://www.youtube.com/channel/UCAOF-mITMQMgnkA6jfeS-Og" target="_blanc" > <i class="fa fa-youtube-square fa-4x btn btn-danger" aria-hidden="true"></i></a>
				<a > <i class="fa fa-whatsapp fa-4x btn btn-success" aria-hidden="true"><h5 style="background-color:#000; border-radius:25px; width: 150px" > +233 247218146</h5></i></a>
			
			</ul>
			
			<p align="center"> <mark>&copy; 2017 WenSoft Inc. Gh. All Right Reserved</mark> </p>
		</div>
	</footer><!--End Footer code -->
	
	 
</div>	 <!--end of container -->
	
</body>

</html>