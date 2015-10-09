<?php require_once("../../includes/initialize.php"); ?>
<?php if(!$session->is_logged_in()){ redirect_to("login.php"); } ?>
<?php
	//find all photographs
	$photos = Photograph::find_all();
?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Basic Table | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body>
	<section id="container" class="">
	
	<section id="main-content">
          <section class="wrapper">
		  
		  <div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="../kataklimt/viewphotos.php">Home</a></li>
					</ol>
				</div>
			</div>
		  
	<div class="row">
	  <div class="col-lg-12">
		  <section class="panel">
			  <header class="panel-heading">
				  PHOTOGRAPHS
			  </header>
			  <?php echo output_message($message); ?>
			  <table class="table table-striped table-advance table-hover">
			   <tbody>
				  <tr>
					 <th>Image</th>
					 <th>Filename</th>
					 <th>Caption</th>
					 <th>Size</th>
					 <th>Type</th>
					 <th>Comments</th>
				  </tr>
				  <?php foreach($photos as $photo): ?>
				  <tr>
					 <td><img src="../<?php echo $photo->image_path(); ?>" width="100"/></td>
					<td><?php echo $photo->filename; ?></td>
					<td><?php echo $photo->caption; ?></td>
					 <td><?php echo $photo->size_as_text(); ?></td>
					<td><?php echo $photo->type; ?></td>
					<td>
						<a href="comments.php?id=<?php echo $photo->id; ?>">
							<?php echo count($photo->comments()); ?>
						</a>
					</td>
					 <td>
					  <div class="btn-group">
						  <a class="btn btn-danger" href="delete_photo.php?id=<?php echo $photo->id;?>"><i class="icon_close_alt2"></i></a>
					  </div>
					  </td>
				  </tr>
				<?php endforeach; ?>				  
			   </tbody>
			</table>
			<br/>
	<a href="photo_upload.php">Upload a new photograph</a>
	<br/>
		  </section>
	  </div>
       </div>
	   </section>
      </section>
	  </section>
	   <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
</body>
</html>