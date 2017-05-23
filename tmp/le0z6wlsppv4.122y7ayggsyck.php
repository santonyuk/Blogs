<!DOCTYPE html>
<html lang="en">
<head>
  <!--IT 328
    Author: Sofiya Antonyuk 
    Date: 05-18-17-->
  <title>Blogs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Bootstrap style sheet-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--Custom style sheet-->
  <link rel="stylesheet" href="styles/styles.css">
  <!--Default JS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<!-- Navigation-->
<?php echo $this->render('include/nav.html',NULL,get_defined_vars(),0); ?>

<!-- Blog posts -->
    <div class="container col-md-9 col-xs-12 page-container"> <!-- main body container --> 
			<div class="row">
				<?php foreach (($content?:[]) as $blogger): ?>
					<div class="post-box col-md-4 col-sm-6"> <!-- post boxes -->
						<div class="post"> <!-- post content -->
							<img src="<?= $blogger->getPortrait() ?>" alt="user2.png" height="150px" width="150px" />
							<p class="center"><?= $blogger->getUserName() ?></p>
							<p class="top-bottom-border extend pull"><a href="#">view blogs</a> <!-- /328/pages/user_blogs -->
							<span class="pull-right">Total: <?= $blogger->getBlogCounter() ?></span></p>
							<div class="blog-text">
								<p>Something from my latest blog:<br>
								<?= $blogger->getMostRecent() ?></p>
							</div>	
						</div> <!-- post content -->
					</div>
				<?php endforeach; ?>
			</div>
		</div>		
				
			
	<!-- Loop the posts containers -->
</body>
</html>