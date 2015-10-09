<?php
	require_once("../../includes/initialize.php");
?>
<?php
	//1.current page num
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	
	//2.records per page
	$per_page = 10;
	
	//3.total record count
	$total_count = Photograph::count_all();
	
	//$photos = Photograph::find_all();
	$pagination = new Pagination($page, $per_page, $total_count);
	
	//find the records for this page
	$sql = "SELECT * FROM photographs ";
	$sql .= "LIMIT {$per_page} ";
	$sql .= "OFFSET {$pagination->offset()}";
	$photos = Photograph::find_by_sql($sql);
?>
<html lang="en">
	<head>
	<title>MASTER - Share your Photos!</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/re.jpg" type="image/x-icon">
	<link rel="shortcut icon" href="img/re.jpg" type="image/x-icon" />
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>  
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/touchTouch.jquery.js"></script> 
    
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>
	<script>		
		 jQuery(window).load(function() {	
		 $x = $(window).width();		
	if($x > 1024)
	{			
	jQuery("#content .row").preloader();    }			 
	 jQuery('.magnifier').touchTouch();
		 jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
  		  }); 
					
	</script>

	</head>

	<body>
<div class="spinner"></div>
<!--============================== header =================================-->
<header>
      <div class="container clearfix">
    <div class="row">
          <div class="span12">
        <div class="navbar navbar_">
              <div class="container">
           <h1 class="brand brand_"><img alt="" src="img/mm.png" style = "height: 100px;">MASTER</h1>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
            <div class="nav-collapse nav-collapse_  collapse">
                  <ul class="nav sf-menu">
				  <li><a onClick="location.href='viewall.php'">View<br>All</a></li>
                <li><a onClick="location.href='../admin/photo_upload.php'">Upload Photo</a></li>
                <li class="sub-menu"><a href="../admin/list_photos.php">My Account</a>
                      <ul>
                    <li><a onClick="location.href='../NiceAdmin/profile.php'">My Profile</a></li>
                    <li><a onClick="location.href='viewphotos.php'">My Photos</a></li>
                    <li><a onClick="location.href='../admin/logout.php'">Logout</a></li>
                  </ul>
                    </li>
              </ul>
                </div>
          </div>
            </div>
      </div>
        </div>
  </div>
    </header>

<div class="bg-content">       
  <!--============================== content =================================-->      
      <div id="content"><div class="ic"></div>
    <div class="container">
          <div class="row">
        <article class="span12">
        <h3>Gallery</h3>
         </article>
        <div class="clear"></div>
         <ul class="portfolio clearfix">        
			<?php foreach($photos as $photo): ?>
				<li class="box">
				<a href="../<?php echo $photo->image_path(); ?>"  class="magnifier">
					<img src="../<?php echo $photo->image_path(); ?>" width="200"/>
				</a>
				</li>
				
			<?php endforeach; ?>

			<div id="pagination" style="clear: both;">
				<?php
					if($pagination->total_pages() > 1){
						if($pagination->has_previous_page()){
							echo " <a href=\"index.php?page=";
							echo $pagination->previous_page();
							echo "\">&laquo; Previous</a> ";
						}
						
						for($i=1; $i <= $pagination->total_pages(); $i++){
							if($i==$page){
								echo " <span class=\"selected\">{$i}</span> ";
							}else{
								echo " <a href=\"index.php?page={$i}\">{$i}</a> ";
							}
						}
						
						if($pagination->has_next_page()){
							echo " <a href=\"index.php?page=";
							echo $pagination->next_page();
							echo "\">Next &raquo;</a> ";
						}
					}
				
				?>
			</div>	
				
            </ul> 
      </div>
        </div>
  </div>
    </div>

<!--============================== footer =================================-->
<footer>
      <div class="container clearfix">
   
  </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>