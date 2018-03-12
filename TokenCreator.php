<html lang="en">
<?php  session_start(); ?>
	  <head>
	  
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="viewport" content="initial-scale=1">
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
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
					<a class="navbar-brand" href="index.php"><img src="images/evan.png" alt="ICOHub Logo"></a>
				</div>
		
				<div class="nav-collapse collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="">
							<a href="marketplace.php">Marketplace</a>
						</li>
						
						<li>
							<a href="#" class="#">Services</a>
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
	 <?php } //else end of if(isset($_SESSION['user_name'])....?>
					
						<li class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown" id="signoutID"><span class="glyphicon glyphicon-user"></span> <?php
							session_start();
							if (isset($_SESSION["user_name"]) && !empty ($_SESSION["user_name"]))
								echo  $_SESSION["user_name"];
							else
								echo "Guest";
							?> <strong class="caret"></strong></a>
							
							<ul class="dropdown-menu">
								<li>
									<a href="companyName.php"><span class="glyphicon glyphicon-wrench"></span>View Profile</a>
								</li>
								
								<li>
									<a href="startupDetails.php"><span class="glyphicon glyphicon-refresh"></span> Update Profile</a>
								</li>
								
								<li>
									<a href="#"><span class="glyphicon glyphicon-briefcase"></span> Billing</a>
								</li>
								
								<li class="divider"></li>
								
								<li>
									<a href="logout.php"><span class="glyphicon glyphicon-off" ></span> Sign out</a>
								</li>
							</ul>
						</li>
						
						<li>
							<a href="#" data-toggle="modal" data-target="#login-modal" id="loginID" <span class="glyphicon glyphicon-log-in"></span>  Login</a>
						</li>
					</ul><!-- end nav pull-right -->
				</div><!-- end nav-collapse -->
		
			</div><!-- end container -->
		</div><!-- end navbar -->
		
	
		  
		  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<form name="signupform" action="login_nextpage.php" method="get">
<input type="text" name="username" placeholder="enter username" required>
<input type="password"  name="password" 
placeholder="enter password" required>
<input type="submit" value="login">
</form>
				  <div class="login-help">
					<a href data-toggle="modal" data-target="#register-modal">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>
		  
		  
		    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<form name="signupform" action="signup_nextpage.php" method="get">
<input type="text" name="username" placeholder="enter username" required>
<input type="password" id="passwordID" name="password" placeholder="enter password" required>
<input type="password" name="cpassword" placeholder="enter confirm password" 
oninput="check(this)" required>
<input type="submit" value="signup">
</form>
				  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
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
					<li><a href="https://twitter.com/ICOHubInvest">Twitter</a></li>
					<li><a href="https://www.facebook.com/ICOHub-2214663765433262/">Facebook</a></li>
				</ul>
				</div>	
		</div>
	</div>

  </footer>
  
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"</script>
	<script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/ui.js"></script>
	<script src="js/marketplace.js"></script>
	
	<script type="text/javascript">
  $(document).ready(fucntion()) {$("#my-slider").carousel();
  }
  </script>

  
</html>