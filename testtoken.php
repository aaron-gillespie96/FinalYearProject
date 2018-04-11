<html lang="en" >
<?php  session_start();
?>

	  <head>
	  
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="viewport" content="initial-scale=1">
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="./apptoken.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115336551-1"></script>
		<script language='javascript' type='text/javascript'>
		function check(input) {
		if (input.value != document.getElementById('passwordID').value) {
		input.setCustomValidity('Password Must be Matching.');
		} else {
		// input is valid -- reset the error message
		input.setCustomValidity('');
		}
		}
		</script>
		
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115336551-1"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}
gtag('js',new Date());gtag('config','UA-115336551-1');</script>
		
	  </head>
	  
	  <body>
		<!--Start of the navbar -->
		<div class="navbar navbar-default navbar-fixed-top">
			<!--Start of the navbar container-->
			<div class="container">
				
				<div class="navbar-header">
					
					<!-- button that is used to allow the navbar to collapse on mobile -->
					<button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!--End of Button-->
					
					<!-- The Navbar Brand Logo-->
					<a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="ICOHub Logo"></a>
				</div>
		
				<div class="nav-collapse collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li >
							<a href="marketplace.php">Marketplace</a>
						</li>
					</ul>
					
					
					<ul class="nav navbar-nav navbar-right">
					<?php            
					if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name']) ){
					?>
					<style>
					#signupID
					{
					display:none;
					}
					#loginID
					{
					display:none;
					} 
					</style>
					<?php } else{ ?>
					<style>
					 #signoutID
					 {
						 display:none;
					 }
					 </style>
					<?php } ?>
					
						<li class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown" id="signoutID"><span class="glyphicon glyphicon-user"></span> <?php
							if (isset($_SESSION["user_name"]) && !empty ($_SESSION["user_name"]))
								echo  $_SESSION["user_name"];
							else
								echo "Guest";
							?> <strong class="caret"></strong></a>
							 <?php if(isset($_SESSION['Type']) && !empty($_SESSION['Type']) ){ ?>
							<ul class="dropdown-menu">
								<li>
									<a href="myCompanyProfile.php"><span class="glyphicon glyphicon-eye-open"></span>View Profile</a>
								</li>
								
								<li>
									<a href="startupDetails.php"><span class="glyphicon glyphicon-pencil"></span> Update Profile</a>
								</li>
								<li>
									<a href="TokenCreator.php"><span class="glyphicon glyphicon-arrow-right"></span> Token Creator</a>
								</li>
								
								<li class="divider"></li>
								
								<li>
									<a href="logout.php"><span class="glyphicon glyphicon-off" ></span> Sign out</a>
								</li>
							</ul>
							
							 <?php } else { ?>
							
							<ul class="dropdown-menu">
								<li>
									<a href="investorProfile.php"><span class="glyphicon glyphicon-eye-open"></span>View Profile</a>
								</li>
								<li>
									<a href="logout.php"><span class="glyphicon glyphicon-off" ></span> Sign out</a>
								</li>
							</ul>
							 <?php } ?>
						</li>
						
						<li>
							<a href  data-toggle="modal" data-target="#login-modal" id="loginID" <span class="glyphicon glyphicon-log-in"></span>  Login</a>
						</li>
					</ul><!-- end nav pull-right -->
				</div><!-- end nav-collapse -->
		
			</div><!-- end container -->
		</div><!-- end navbar -->
		
		<div class ="parallax1">
		<div class="container">
		<div class="row">
		<div  class="col-sm-2" style="margin-top: 60px;"></div>
		<div  class="col-sm-8" style=" margin-top: 60px; margin-bottom: 60px; background-color: white; padding: 50px 20px 5px 50px;">
		
		<h1>ICOHub Token creator</h1>

<div id="whichNetwork" ></div>

<br>

<hr>

<div class="form-group">
  <textarea class="form-control" rows="1" id="symbol" placeholder="Symbol of token" style="overflow:auto"></textarea>
</div>
<div class="form-group">
  <textarea class="form-control" rows="1" id="name" placeholder="Name of token" style="overflow:auto"></textarea>
</div>
<div class="form-group">
  <textarea class="form-control" rows="1" id="decimals" placeholder="How many decimals will your token have" style="overflow:auto"></textarea>
</div>
<div class="form-group">
  <textarea class="form-control" rows="1" id="rate" placeholder="Price of Token" style="overflow:auto"></textarea>
</div>

<a href="#!" onclick="App.deploy()" button id="button" class="btn btn-primary btn-block">Deploy my crowdsale contract!</a>

<br>

<i><div id="statusText"></div></i>

<hr>
<div  class="col-sm-2"></div>
<br>
</div>
</div>
</div>
</div>
	
	  </body>
	  
	  <footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
				<h6>Copyright &copy; ICOHub</h6>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was populari </p>
				</div>
					
					<div class="col-sm-4">
					<h6>About Us</h6>
					<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was populari</p>
					</div>
					
					<div class="col-sm-3">
					<h6>Navigation</h6>
					<ul class="unstyled">
						<li><a href="index.php">Home</a></li>
						<li><a href="#">Services</a></li>
					</ul>
					</div>
					
					<div class="col-sm-3">
					<h6>Follow Us</h6>
					<ul class="unstyled">
						<li><a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
						<li><a href="https://www.facebook.com/ICOHub-2214663765433262/">Facebook</a></li>
					</ul>
					</div>	
			</div>
		</div>

	  </footer>
  
	  
	 
  
	  
	  
  
	     <!-- Optional JavaScript -->
		 <!-- jQuery first then Bootstrap JS -->
		  <script src="js/jquery-3.2.1.min.js"</script>
		  <script src="js/bootstrap.js"></script>
		  <script src="js/bootstrap.min.js"></script>
		  
  
</html>