<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	header('location:index.php');
}
	$msg="";
	if(isset($_GET['login'])){
		$msg="Invalid Username or Password!";

	}
?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>CSTA Student Portal</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css"> 
	<!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">  	
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div  class="main-form-box">
	<div class="md-form">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="panel panel-login">
						<div class="logo-top">
							<a href="#"><img src="img/logologo.png" alt="" /></a><br><br>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form id="login-form" action="validate_login.php" method="post" role="form" style="display: block;">
										<div class="form-group">
											<label class="icon-lp"><i class="fas fa-user-tie"></i></label>
											<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required="">
										</div>
										<div class="form-group">
											<label class="icon-lp"><i class="fas fa-key"></i></label>
											<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="">
										</div><br>
									
							
										<div class="form-group">
											<div class="row">
												
												<div class="col-sm-6 offset-sm-3">
												
													<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
													<p style="color:red; font-weight:bold; text-align:center;padding-top:10px;"><?=$msg?></p>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="text-center">
														<a href="forgot-password.php" tabindex="5" class="forgot-password">Forgot Password?</a>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					
					<p class="footer-company-name">All Rights Reserved. </p>
					
				</div>
			</div>
		</div>	
	</div>
	
</div>

	
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/particles.min.js"></script>
<script src="js/index.js"></script>
	
	<?php
	require_once('includes/scripts.php');
	
	?>
</body>
</html>
