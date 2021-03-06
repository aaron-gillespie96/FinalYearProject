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
									<a href="tokenCreator.php"><span class="glyphicon glyphicon-arrow-right"></span> Token Creator</a>
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
		
	
		  
		  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			  <div class="modal-dialog">
					<div class="loginmodal-container">
						<form name="signupform" action="login_nextpage.php" method="post">
							<select name="name" id="name" required>
								<option value="">Select an option</option>
								<option value="Startup">Startup</option>
								<option value="Investor">Investor</option>
							</select>
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
						<form name="signupform" action="signup_nextpage.php" method="post">
							<input type="text" name="username" placeholder="enter username" required>
							<input type="password" id="passwordID" name="password" placeholder="enter password" required>
							<input type="password" name="cpassword" placeholder="enter confirm password">
							<select name="name" id="name" required>
								<option value="">Select an option</option>
								<option value="Startup">Startup</option>
								<option value="Investor">Investor</option>	
							</select>
							<input type="submit" value="signup">
						</form>
						<div class="login-help">
							<a href="#">Register</a> - <a href="#">Forgot Password</a>
						</div>
					</div>
				</div>
			</div>

			


			<div class ="parallax1">
			<div class="container">
					<div class="row">
					<div class="col-sm-5" id="first">
					<hr style="color: white;">
						<h2 style="color: white;"> How to update your account? </h2>
						<ul class="list-unstyled">
							<li style="color: white;">
									<span class="glyphicon glyphicon-ok aboutIcohub"></span> Billing
								</li>
								
								<li style="color: white;">
									<span class="glyphicon glyphicon-ok aboutIcohub"></span> Billing
								</li>
						</ul>
					<hr style="color: white;">
						<div style="background-color: white; border-radius: 10px; padding: 5px; border: 1px solid #428ff4;">
						<form action="insertimage.php" onsubmit="alert('Your logo has been uploaded successfully! You will see this change when you logout.');" method="post"  enctype="multipart/form-data">
<p style="text-align: center;"><b> Please upload your company logo here, so that it can be added to your profile</b></p>
<input  style="margin: auto;" name="image" id="image" accept="image/*" type="file"><br>
<div style="text-align: center">
<input type="submit" value="upload logo" name="submit" disabled />
</div>
</form>
</div>
						</div>
						
						<div class="col-sm-7" id="first" style="background-color: white; border-radius: 10px; padding: 5px; border: 1px solid #428ff4;" >
						<hr>
						<h2>Update your details</h2>
						<hr>
							<form role="form" id="contactForm" action="updateStartup.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="companyName">Company Name:</label>
									<input type="text" class="form-control" id="companyName"name="companyname"required>
								</div>
								<div class="form-group">
									<label for="companyDesc">Company Description:</label>
									<input type="text" class="form-control" id="companydesc"name="companydesc" required>
								</div>
								<div class="form-group">
									<label for="companyVideo">Enter Company Video Url:</label>
									<input type="text" class="form-control" id="companyvid"name="companyvid" required>
								</div>
								
								<div class="form-group">
									<label for="companyVideo">Token Name: </label>
									<input type="text" class="form-control" id="companytok"name="tokenname" required>
								</div>
								
								<div class="form-group">
									<label for="companyVideo">Total Tokens: </label>
									<input type="text" class="form-control" id="conpanyName"name="totaltokens" required>
								</div>
								
								<div class="form-group">
									<label for="companyVideo">Price per token:</label>
									<input type="text" class="form-control" id="conpanyName"name="totalprice" required>
								</div>
								
								<div class="form-group">
									<label for="companyVideo">Launch Date:</label>
									<input required type="date" data-date-format="DD MMMM YYYY" name="shootdate" id="shootdate" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>">
								</div>
							
								<div class="form-group">
									<label for="category">What Category best suits your business:</label>
												<select name="category" required>
												<option value="">Select an option</option>
													<option value="software">Software</option>
													<option value="e-commerce">E-commerce</option>
													<option value="fashion">Fashion</option>
													<option value="gaming">Gaming</option>
													<option value="health">Health</option>
													<option value="engineering">Engineering</option>
													<option value="fintech-finance">Fintech-finance</option>
													<option value="other">other</option>
												</select>
								</div>
								
								<input class="submit" type="submit" value="Publish to profile">
							</form>
				

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
						<li><img src="images/twitter2.png"class="img-responsive"><a href="https://twitter.com/ICOHubInvest">Twitter</a></li>
						<li><a href="https://www.facebook.com/ICOHub-2214663765433262/">Facebook</a></li>
					</ul>
					</div>	
			</div>
		</div>
	  </footer>
	  
	  <script type="text/javascript">
        $('input:file').on("change", function() {
    $('input:submit').prop('disabled', !$(this).val()); 
});
            </script>
  
	     <!-- Optional JavaScript -->
		 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		  <script src="js/jquery-3.2.1.min.js"</script>
		  <script src="js/bootstrap.js"></script>
		  <script src="js/bootstrap.min.js"></script>
		  <script src="js/ui.js"></script>
	  
</html>