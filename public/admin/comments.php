<?php require_once("../../includes/initialize.php"); ?>
<?php if(!$session->is_logged_in()){ redirect_to("login.php"); } ?>
<?php
	if(empty($_GET['id'])){
		$session->message("No photograph ID was provided.");
		redirect_to('index.php');
	}
	
	$photo = Photograph::find_by_id($_GET['id']);
	
	if(!$photo){
		$session->message("The photo could not be located.");
		redirect_to('index.php');
	}
	
	$comments = $photo->comments();
?>
<html lang="en">
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

  <body style="background:url('img/body1.jpg') no-repeat center;">
  <!-- container section start -->
  <section id="container" class="">
		<section id="main-content">
          <section class="wrapper">
		  
			<div class="col-sm-6">
                      <section class="panel">
						  <?php echo output_message($message); ?>
                          <table class="table table-hover">
                              <thead>
                              <tr>	
									<br>
									<a href="list_photos.php"><h4>&laquo; Back</h4></a>
                                  <th>Comments on <?php echo $photo->filename; ?></th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php foreach($comments as $comment): ?>
                              <tr>
									<td>
                                  <div class="author">
										<?php echo htmlentities($comment->author); ?> wrote:
									</div>
									<div class="body">
										<?php echo strip_tags($comment->body, '<strong><em><p>'); ?>
									</div>
									<div class="meta-info" style="font-size: 0.8em;">
										<?php echo datetime_to_text($comment->created); ?>
									</div>
									<br/>
									<div class="actions" style="font-size: 0.8em;">
										<a href="delete_comment.php?id=<?php echo $comment->id; ?>">
											Delete Comment
										</a>
									</div>
								  </td>
                              </tr>
							  <?php endforeach; ?>
							<?php if(empty($comments)){ echo "No comments."; } ?>
                              </tbody>
                          </table>
                      </section>
                  </div>
		  
			</section>
		</section>
  </section>
	</body>

</html>