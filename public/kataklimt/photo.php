<?php require_once("../../includes/initialize.php"); ?>
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
	
	if(isset($_POST['submit'])){
		$author = trim($_POST['author']);
		$body = trim($_POST['body']);
		
		$new_comment = Comment::make($photo->id, $author, $body);
		if($new_comment && $new_comment->save()){
			//comment saved
			redirect_to("photo.php?id={$photo->id}");
		}else{
			$message = "There was an error that prevented the comment from being saved.";
		}
	}else{
		$author="";
		$body="";
	}
	
	$comments = $photo->comments();
?>
<html>
<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <title>MASTER - Share your Photos!</title>
	<link rel="icon" href="img/re.jpg" type="image/x-icon">
	<link rel="shortcut icon" href="img/re.jpg" type="image/x-icon" />

    <!-- Bootstrap CSS -->    
    <link href="nccss/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="nccss/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="nccss/elegant-icons-style.css" rel="stylesheet" />
    <link href="nccss/font-awesome.min.css" rel="stylesheet" />
    <!-- date picker -->
    
    <!-- color picker -->
    
    <!-- Custom styles -->
    <link href="nccss/style.css" rel="stylesheet">
    <link href="nccss/style-responsive.css" rel="stylesheet" />

</head>

<body>
<br>
	<a href="viewall.php">&nbsp;&laquo; Back</a><br/><br/>
	<center><div style="margin-left: 20px;">
			<img src="../<?php echo $photo->image_path(); ?>" style="length:350px; height:350px;"/><br/>
		<p><?php echo $photo->caption; ?></p>
	</div></center>
	<hr>
	<br/>
	<div id="comments">
		<center>
		<?php foreach($comments as $comment): ?>
			<div class="panel-body">
				<div class="author">
					<?php echo htmlentities($comment->author); ?> wrote:
				</div>
				<div class="body">
					<?php echo strip_tags($comment->body, '<strong><em><p>'); ?>
				</div>
				<div class="meta-info" style="font-size: 0.8em;">
					<?php echo datetime_to_text($comment->created); ?>
				</div>
			</div>
		<?php endforeach; ?>
		<?php if(empty($comments)){ echo "No comments."; } ?></center>
	</div>
	
	<section id="main-content">
	<section id="container" class="">
	<section class="wrapper">
	<div class="row">
		  <div class="col-lg-6">
			  <section class="panel">
				  <header class="panel-heading">
					 NEW COMMENT
				  </header>
				  <?php echo output_message($message); ?>
				  <div class="panel-body">
					  <form role="form" action="photo.php?id=<?php echo $photo->id; ?>" method="post">
						  <div class="form-group">
							  <label for="exampleInputEmail1">Name</label>
							  <input type="text" name="author" value="<?php echo $author; ?>" class="form-control" id="exampleInputEmail1" placeholder="Please enter name">
						  </div>
						  <div class="form-group">
							  <label for="exampleInputEmail1">Comment</label>
							  <textarea name="body" cols="25" rows="8" class="form-control"><?php echo $body; ?></textarea>
						  </div>
						  <button type="submit" name="submit" class="btn btn-primary">Submit Comment</button>
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