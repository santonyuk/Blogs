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
	
<div class="container"><!-- main container  -->
	<div class="row col-sm-10 page-container"><!-- page heading box -->
		<div class="jumbotron left-margin-20 top-margin-30">
			<div class="col-md-12 text-center"><h3><strong><?= $user->getUsername() ?></strong></h3></div>
  		</div>
	</div>
</div>

</body>
</html>