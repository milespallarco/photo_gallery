<?php
	require_once("../../includes/initialize.php");
	//if (!$session->is_logged_in()){ redirect_to("../kataklimt/profile.php"); }
?>
<?php
	$max_file_size = 1048576; /*bytes
								10240 = 10 KB
								102400 = 100KB
								1048576 = 1MB
								10485760 = 10MB*/
	
	if(isset($_POST['submit'])){
		$photo = new Photograph();
		$photo->caption = $_POST['caption'];
		$photo->attach_file($_FILES['file_upload']);

		if($photo->save()){
			$session->message("Photograph uploaded successfully.");
			redirect_to('../kataklimt/viewphotos.php');
		}else{
			$message = join("<br/>", $photo->errors);
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/re.jpg" type="image/x-icon">

    <title>MASTER</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- date picker -->
    
    <!-- color picker -->
    
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body style="background:url('img/body1.jpg') no-repeat center center fixed;">
	<section id="main-content">
	<section id="container" class="">
	 <section class="wrapper">
	
	<div class="row">
	<div class="col-lg-6">
	  <section class="panel">
		  <h2 class="panel-heading">
			  Photo Upload
			  <a href="../kataklimt/viewall.php"><h5>&laquo; Back</h5></a>
		  </h2>
		  <div class="panel-body">
		  
		  <?php echo output_message($message); ?>
			  <form role="form" action="photo_upload.php" enctype="multipart/form-data" method="POST">
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>"/>
				  <div class="form-group">
					  <input type="file" name="file_upload">
				  </div>
				  <div class="form-group">
					 <p>Caption:
					  <input type="text" class="form-control" name="caption" value=""></p>
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary">Upload</button>
			  </form>

		  </div>
	  </section>
    </div>
	</div>
	</section>
	</section>
	</section>
</body>
</html>