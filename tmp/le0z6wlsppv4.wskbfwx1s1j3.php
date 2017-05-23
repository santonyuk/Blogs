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
	<!-- navbar -->
<?php echo $this->render('include/nav.html',NULL,get_defined_vars(),0); ?>
	
<div class="container"><!-- main container from nav -->
	<div class="row col-sm-10 page-container"><!-- page heading box -->
		<div class="jumbotron left-margin-20 top-margin-30">
			<div class="row">
					<h2>Your blogs</h2>
					<img src="images/user2.png" alt="User Portrait" class="img-responsive pull-right" width="150" height="150">
			</div>
		</div>
	</div>
	<div class="row top-margin-10 left-margin-20">
		<div class="col-md-8">
			<div class="row top-margin-30">
				<div class="col-md-10 col-md-offset-1">
					<table class="table">
						<thead>
							<tr>
								<th>Blog</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>
							</thead>
					</table>
				</div>
			</div>
		</div>
		<div class="extend">
			<h3><strong>Username</strong></h3>
			<p>Bio: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		</div>
	</div>
</div><!-- main container -->

</body>
</html>