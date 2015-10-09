<?php
	require_once("../../includes/initialize.php");
	
	if(isset($_POST['submit'])){
		$first_name = trim($_POST['first_name']);
		$last_name = trim($_POST['last_name']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		
		$new_user = User::create_user($username, $password, $first_name, $last_name, $email);
		
		redirect_to("login.php");
	}else{
	//form has not been submitted
		$username="";
		$password="";
		$first_name="";
		$last_name="";
		$email="";
	}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>MASTER - Share your Photos!</title>

	<link rel="shortcut icon" href="assets/images/re.jpg">
	
	<!-- Bootstrap itself -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles -->
	<link rel="stylesheet" href="assets/css/magister.css">

	<!-- Fonts -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='assets/css/css.css' rel='stylesheet' type='text/css'>
</head>

<!-- use "theme-invert" class on bright backgrounds, also try "text-shadows" class -->
<body class="theme-invert">

	<nav class="mainmenu">
		<div class="container">
			<div class="dropdown">
				<button type="button" class="navbar-toggle" data-toggle="dropdown"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<!-- <a data-toggle="dropdown" href="#">Dropdown trigger</a> -->
				<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
					<li><a onClick="location.href='index.php'">Home</a></li>
				<li><a onClick="location.href='signup.php'">Sign Up</a></li>
				<li><a onClick="location.href='login.php'">Log In</a></li>
				</ul>
			</div>
		</div>
	</nav>


	<div class="modal-dialog"style = "margin: 70px auto;width: 430px;height = 500px;">
		<div class="modal-content">
		 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h1 class="text-center">Sign Up</h1>
				<h4 class = "text-center">Fill in the form to get an instant access:<h4> 
			</div>
		  
			<div class="modal-body">
				<h1 class="title"><center><img src = "assets/images/mm.png" style = "width:100px; height = 100px;"></center></h1>
				<form action="signup.php" method="post" class="form col-md-12 center-block">
					<div class="form-group">
					   <input type="text" name="username" maxlength="30"
							value="<?php echo htmlentities($username); ?>" class="form-control input-lg" placeholder="Username">
					</div>
					
					<div class="form-group">
						<input type="text" name="first_name" maxlength="30"
							value="<?php echo htmlentities($first_name); ?>" class="form-control input-lg" placeholder="First Name">
					</div>
				   
					<div class="form-group">
					   <input type="text" name="last_name" maxlength="30"
							value="<?php echo htmlentities($last_name); ?>" class="form-control input-lg" placeholder="Last Name">
					</div>
				 
					<div class="form-group">
					   <input type="text" name="email" maxlength="30"
							value="<?php echo htmlentities($email); ?>" class="form-control input-lg" placeholder="Email">
					</div>
				 
					<div class="form-group">
						   <input type="password" name="password" maxlength="30"
							value="<?php echo htmlentities($password); ?>" class="form-control input-lg" placeholder="Password">
					</div>
					 
					<div class="form-group">
						   <input type="password" class="form-control input-lg" placeholder="Confirm Password">
					</div>
				  
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Create Account</button>
						<span class="pull-right"><a href="#">Log in</a></span><span><a href="#">Need help?</a></span>
					</div>
				</form>
		    </div>
		
			<div class="modal-footer">
				<div class="col-md-12">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
				</div>	
			</div>
		</div>
	</div>
	
<!-- Load js libs only when the page is loaded. -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.custom.72241.js"></script>
<!-- Custom template scripts -->
<script src="assets/js/magister.js"></script>
</body>
</html>
<?php if(isset($database)){ $database->close_connection(); } ?>