<?php
	require_once("../../includes/initialize.php");

	if($session->is_logged_in()){
		redirect_to("../NiceAdmin/profile.php");
	}
	
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		$found_user = User::authenticate($username, $password);
		
		//check if pw and un exist
		if($found_user){
			$session->login($found_user);
			log_action('Login', "{$found_user->username} logged in.");
			redirect_to("../NiceAdmin/profile.php");
		}else{
			$message = "Username/password combination incorrect.";
		}
	}else{
	//form has not been submitted
		$username="";
		$password="";
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
				<h1 class="text-center">Login</h1>
		    </div>
			
			<div class="modal-body">
			<h1 class="title"><center><img src = "assets/images/mm.png" style = "width:100px; height = 100px;"></center></h1>
				<center><?php echo output_message($message); ?></center>
				<form action="login.php" method="post" class="form col-md-12 center-block">
						 
					<div class="form-group">
						<input type="text" class="form-control input-lg" placeholder="Username" name="username" maxlength="30"
						value="<?php echo htmlentities($username); ?>" required autofocus/>     
					</div>
				   
					<div class="form-group">
						<input type="password" class="form-control input-lg" placeholder="Password" name="password" maxlength="30"
						value="<?php echo htmlentities($password); ?>" required/>
					</div>
					 
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Login</button>
					    <span class="pull-right"><input type="checkbox" value="remember-me"> Remember me</span><span><a href="#">Forgot Password?</a></span>
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
	
	
	
	
	<!-- Second (About) section -->
<section class="section" id="about">

<center><h1 class="title"><img src = "assets/images/mm.png" style = "width = 100px; height:100px;margin-top:-250px;"><h4 class="subtitle" style = "margin-top:-100px">Photos</h4></h1></center>
	<p>
	<center>
		<a href="assets/public/1.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/1.jpg" style ="length: 200px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/2.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/2.jpg" style ="length: 200px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/3.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/3.jpg" style ="length: 200px;height:200px;"></a>
		<br>
		<br>
		<br>
		<a href="assets/public/4.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/4.jpg" style ="length: 200px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/5.jpeg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/5.jpeg" style ="length: 240px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/6.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/6.jpg" style ="length: 200px;height:200px;"></a>
		<br>
		<br>
		<br>
		<a href="assets/public/7.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/7.jpg" style ="length: 200px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/8.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/8.jpg" style ="length: 240px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/9.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/9.jpg" style ="length: 200px;height:200px;"></a>
		<br>
		<br>
		<br>
		<a href="assets/public/10.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/10.jpg" style ="length: 200px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/11.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/11.jpg" style ="length: 240px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/12.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/12.jpg" style ="length: 200px;height:200px;"></a>
		<br>
		<br>
		<br>
		<a href="assets/public/13.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/13.jpg" style ="length: 200px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/14.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/14.jpg" style ="length: 240px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/15.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/15.jpg" style ="length: 200px;height:200px;"></a>
		<br>
		<br>
		<br>
		<a href="assets/public/16.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/16.jpg" style ="length: 200px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/17.jpeg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/17.jpeg" style ="length: 240px;height:200px;"></a>
		&nbsp &nbsp &nbsp
		<a href="assets/public/18.jpg" rel="lightbox" title="Beautiful, isn't it?"><img src = "assets/public/18.jpg" style ="length: 200px;height:200px;"></a>
		
	</center>
	</p>
	
	<p>
	<center>
	</center>
	</p>
	
</section>

	<!------ fifth section blog ----->
<section class="section" id="blog">

						
						<center><h1 class="title"><img src = "assets/images/mm.png" style = "width = 100px; height:100px;margin-top:-250px;"><h4 class="subtitle" style = "margin-top:-100px">Developers</h4></h1></center>
						
							<span>
                                <center style = "margin-top:100px; margin-left:10px;"><img alt="" src="assets/images/miles.jpeg" style = " height:400px;width:400px;border-radius:200px; border: 5px solid #688a7e;">
								<img alt="" src="assets/images/cla.jpg" style = " height:400px;width:400px;border-radius:200px; border: 5px solid #688a7e;">
								<img alt="" src="assets/images/rein.jpg" style = " height:400px;width:400px;border-radius:200px; border: 5px solid #688a7e;">
								</center>
                            </span>
							
							<h3>
							&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
							Miles
							
							&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
							Clarence
							
							&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
							Rein
							</h3>
							
							<span>
                                <center style = "margin-top:100px; margin-left:10px;"><img alt="" src="assets/images/glenn.jpg" style = " height:400px;width:400px;border-radius:200px; border: 5px solid #688a7e;">
								<img alt="" src="assets/images/pre.jpg" style = " height:400px;width:400px;border-radius:200px; border: 5px solid #688a7e;">
								</center>
                            </span>
							
							<h3>
							&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
							Glenn
							
							&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
							Precious
							</h3>
							
							
							<br />

	
</section>
	
	
<!-- Load js libs only when the page is loaded. -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.custom.72241.js"></script>
<!-- Custom template scripts -->
<script src="assets/js/magister.js"></script>
</body>
</html>
<?php if(isset($database)){ $database->close_connection(); } ?>