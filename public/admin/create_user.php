<?php
	require_once("../../includes/initialize.php");

	if($session->is_logged_in()){
		redirect_to("index.php");
	}
	
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
<html>
	<head>
		<title>Photo Gallery</title>
		<link href="../stylesheets/main.css" media="all" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
		<div id="header">
			<h1>Photo Gallery</h1>
		</div>
		<div id ="main">
		<h2>Admin</h2>
		<h2>CREATE</h2>
		
		<form action="create_user.php" method="post">
			<table>
				<tr>
					<td>Fname:</td>
					<td>
						<input type="text" name="first_name" maxlength="30"
							value="<?php echo htmlentities($first_name); ?>"/>
					</td>
				</tr>
				<tr>
					<td>Lname:</td>
					<td>
						<input type="text" name="last_name" maxlength="30"
							value="<?php echo htmlentities($last_name); ?>"/>
					</td>
				</tr>
				<tr>
					<td>Username:</td>
					<td>
						<input type="text" name="username" maxlength="30"
							value="<?php echo htmlentities($username); ?>"/>
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<input type="password" name="password" maxlength="30"
							value="<?php echo htmlentities($password); ?>"/>
					</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>
						<input type="text" name="email" maxlength="30"
							value="<?php echo htmlentities($email); ?>"/>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Login"/>
					</td>
				</tr>
			</table>
		</form>
		</div>
		<div id ="footer">
			Copyright <?php echo date ("Y", time()); ?>,GRP4
		</div>
	</body>
</html>
<?php if(isset($database)){ $database->close_connection(); } ?>