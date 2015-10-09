<?php
	require_once("../../includes/initialize.php");
	if (!$session->is_logged_in()){ redirect_to("login.php"); }

?>
<?php include_layout_template('admin_header.php'); ?>
	
	<h2>Menu</h2>
	<?php echo output_message($message); ?>
	<ul>
	<a href="list_photos.php"><li>List Photos</a></li>
	<a href="logfile.php"><li>View Log File</a></li>
	<a href="logout.php"><li>Logout</a></li>
	</ul>
<?php include_layout_template('admin_footer.php'); ?>