
	<html>
	<head>
	  
	</head>



	<?php 

	session_start();
	// Check if user has already logged in to the application
	if (isset($_SESSION['access_token']) || isset($_SESSION['access_token']['oauth_token']) || isset($_SESSION['access_token']['oauth_token_secret']))
	{
	    header('Location: starter.php');
	}
	?>
	<!doctype html>
	<html class="no-js" lang="en">
		<head>
			
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>rtCamp Twitter challenge</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <!-- Bootstrap 3.3.7 -->
	  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	  <!-- AdminLTE Skins. Choose a skin from the css/skins
	       folder instead of downloading all of them to reduce the load. -->
	  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

	  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	  <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <![endif]-->

	  <!-- Google Font -->
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
			<script src="js/modernizr.js"></script>
		</head>
		<body>
		
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      
			
			<a href="login.php" style="margin-left: 10%;margin-top: 10%;width: 30%" class="btn btn-primary"><i class="fa fa-twitter fa-2x fa-spin" style="margin-right: 20%"></i><span style="font-size: 25px">Login</span> </button>

			</a>
			
		
			<script src="js/jquery.js"></script>
			<script src="js/foundation.min.js"></script>
			<script>
				$(document).foundation();
			</script>
		</body>
	</html>
