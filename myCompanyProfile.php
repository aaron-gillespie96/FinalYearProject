<html lang="en">

		<?php  session_start(); ?><?php
		session_start();
		if(!isset($_SESSION['user_name'])){
		   header("Location:index.php");
		}?>
	  <head>
	  
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="viewport" content="initial-scale=1">
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
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
							<input type="password"  name="password" placeholder="enter password" required>
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
		<br></br><br></br>
						<div class="container companypage-background">
							<div class="row" id="companypage-top">
								<div class="col-sm-12">
								<h1><?php session_start();
											if (isset($_SESSION["companyname"]) && !empty ($_SESSION["companyname"]))
												echo  $_SESSION["companyname"];
											else 
												echo "Guest";?> </h1>
								<button type="button"  id="watchlistBtn" class="btn btn-lg btn-success btn-responsive">Add to watchlist</button>
								</div>
							</div>
						</div>
		
						<div class="container companypage-background">
							<div class="row">
								<div class="col-sm-7">
					
									
										<h3><u>About Us</u></h3>
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" style="max-width:640; max-height:390;" src="<?php  session_start();
											if (isset($_SESSION["vid_link"]) && !empty ($_SESSION["vid_link"]))
												echo  $_SESSION["vid_link"];
											else 
												echo "No video";?>"></iframe>
										</div>
										<br>
										<h3>Company Description</h3>
										<p><?php session_start();
											if (isset($_SESSION["Company_Desc"]) && !empty ($_SESSION["Company_Desc"]))
												echo  $_SESSION["Company_Desc"];
											else 
												echo "No Description";?></p>
								</div>
								<br>
							
								<div class="col-sm-5">
						 
							  
											<h4>Token Details</h4>
										<div class="card-text" id="myprofile">
										<b>Token Name: </b>  <?php session_start();
											if (isset(  $_SESSION["Token_Name"]) && !empty (  $_SESSION["Token_Name"]))
												echo $_SESSION["Token_Name"];
											else 
								
												echo "Token information unavailable";?> <br>
										Total Tokens: <?php session_start();
											if (isset( $_SESSION["Total_Tokens"]) && !empty (  $_SESSION["Total_Tokens"]))
												echo $_SESSION["Total_Tokens"];
											else 
								
												echo "Token information unavailable";?><br>
										Price Per Token: <?php session_start();
											if (isset(  $_SESSION["Token_Price"]) && !empty (  $_SESSION["Token_Price"]))
												echo $_SESSION["Token_Price"];
											else 
								
												echo "Token information unavailable";?><br>
										Launch Date: <?php session_start();
											if (isset(  $_SESSION["Launch_Date"]) && !empty (  $_SESSION["Launch_Date"]))
												echo $_SESSION["Launch_Date"];
											else 
								
												echo "Token information unavailable";?><br>
										Category:<?php session_start();
											if (isset(  $_SESSION["Company_Category"]) && !empty (  $_SESSION["Company_Category"]))
												echo $_SESSION["Company_Category"];
											else 
								
												echo "Token information unavailable";?><br>
										</p>
										</div>
									
									<br>
									<div id="buytokens"
											<h4>Buy Tokens</h4>
										<div class="card-text">
												Purchase Amount: <br>
												Total Amount: <br>			
												<?php            
											 if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name']) ){
											   
												 ?>
												 <style>
												 #buytokens
												 {
													 display:none;
												 }
												 #watchlistbtn
												 {
													 display:none;
												 } 
												 </style>
												<?php } ?>
										</div>
										<a href="marketplace.php" class="btn btn-linkedin btn-md"></i>Buy Tokens</a>
								   </div>
							   </div>
						   </div>
					   </div>
							
				
						
			
		
					
					<div class="container companypage-background">
						<div class="row">
							<div class="col-sm-12">
								<h3> Connect with us </h3>
									<ul class="list-inline">
										<li> <a href="#" class="fa fa-facebook"></a></li>
										<li> <a href="#" class="fa fa-twitter"></a></li>
										<li> <a href="#" class="fa fa-instagram"></a></li>
									    <li> <a href="#" class="fa fa-youtube"></a> </li> 
									</ul>
							</div>
					   </div>	
		           </div>
				   
				<div class="section-style-companypage">
					<div class="container companypage-background">
						<div class="row" id="section-widths">
							<div class="col-sm-12" >
								<h3>Our Whitepaper </h3>
								<img src="images/pdf.png" class="img-repsonsive" alt="Responsive image">
				            </div>
				        </div>
					</div>
		       </div>
		 
		 <br><br>
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
							<li><a href="#">Home</a></li>
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
  
  
</html>