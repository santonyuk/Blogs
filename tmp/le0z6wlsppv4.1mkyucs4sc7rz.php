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
	

<div class="container"><!-- main container from nav -->
	<div class="row col-sm-10 page-container"><!-- page heading box -->
		<div class="jumbotron left-margin-20 top-margin-30">
			<div class="row">
				<div class="col-md-6">
				<h1>Welcome back!</h1> 
				<p>Please login below</p>
			</div>
			<div class="col-md-6">
				<img src="./images/lock.png" width="150" height="150" class="pull-right">
			</div>
		</div>
	</div><!-- page heading box -->
	<div class="jumbotron"><!-- signin form box -->
		<form action="./verify-user" method="post" class="form-horizontal">
			<div class="col-md-4 col-md-offset-4">
				<div class="form-group">
					<div class="col-md-4 col-md-push-8 text-center">
						<label class="control-label sign-up-form-label" for="username">Username</label>
					</div>
					<div class="col-md-8 col-md-pull-4">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-4 col-md-push-8 text-center">
						<label class="control-label sign-up-form-label" for="password">Password</label>
					</div>
					<div class="col-md-8 col-md-pull-4">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
				</div>
			</div>
			<div class="row top-margin-10">
				<div class="col-md-12 text-center">
					<button type="submit" class="btn btn-primary btn-lg">Log In</button>
				</div>
			</div>
		</form>
	</div><!-- signup form box -->
</div><!--main container from nav -->

</body>
</html>