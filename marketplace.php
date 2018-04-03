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
		<br></br><br></br>
		<div class="container" id="trending-now">
			<div class="row">
				<div class="col-sm-6 section-widths-marketplace">
				<h1>Trending now!</h1>
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
			
			</div>
			
			
			<div class="col-sm-6 section-widths-marketplace">
					<div id="carousel-section">
						<!-- Start of icohubCarousel --> 
								<div class="carousel slide" id="icohubCarousel">

									<!-- Carousel Indicators -->
									<ol class="carousel-indicators">
										<li class="active" data-slide-to="0" data-target="#icohubCarousel"></li>
										<li data-slide-to="1" data-target="#icohubCarousel"></li>
										<li data-slide-to="2" data-target="#icohubCarousel"></li>
									</ol>

									<!-- Wrapper for icohubCarousel slides -->
									<div class="carousel-inner">
										<div class="item active" id="slide1">
											<div class="carousel-caption">
												<h4>Browse ICO's</h4>
												<p>Join our marketplace now!</p>
											</div><!-- end of item 1 caption-->
										</div><!-- end item 1 -->
										
										<div class="item" id="slide2">
											<div class="carousel-caption">
												<h4>Hello</h4>
												<p></p>
											</div><!-- end of item 2 caption-->
										</div><!-- end of item 2-->
										
										<div class="item" id="slide3">
											<div class="carousel-caption">
												<h4>Bitcoin</h4>
												<p></p>
											</div><!-- end of item 3 caption-->
										</div><!-- end of item 3-->
									</div>
					
								<!-- The icoHub Carousel Controls -->
										<a class="left carousel-control" data-slide="prev" href="#icohubCarousel"><span class="icon-prev"></span></a>
										<a class="right carousel-control" data-slide="next" href="#icohubCarousel"><span class="icon-next"></span></a>

							</div><!-- end of the icoHub-Carousel -->
							</div>
					</div>
				</div> 
			</div>
		<!--End of Carousel-->
	  
	
			 <div class="container" id="search-category-section">
				<div class="row">
					<div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12 section-widths-marketplace">
						<h1 class="gallery-title">Search categories</h1>
					</div>

					<div align="center">
						<button class="btn btn-default filter-button" data-filter="all">All</button>
						<button class="btn btn-default filter-button" data-filter="software">Software</button>
						<button class="btn btn-default filter-button" data-filter="e-commerce">E-Commerce</button>
						<button class="btn btn-default filter-button" data-filter="fashion">Fashion</button>
						<button class="btn btn-default filter-button" data-filter="gaming">Gaming</button>
						<button class="btn btn-default filter-button" data-filter="health">Health</button>
						<button class="btn btn-default filter-button" data-filter="engineering">Engineering</button>
						<button class="btn btn-default filter-button" data-filter="fintech-finance">Fintech Finance</button>
					</div>
					<br/>
					
					 <?php require ("dbc.php");?>
					<?php  $SQL = "SELECT Company_Name, Company_desc, Company_Category FROM Marketplace";
					mysql_select_db($dbname);
					$result = mysql_query($SQL, $conn);
					while($fetch = mysql_fetch_array($result)){
					$divHtml .='<div class="gallery_product col-sm-4  filter ' . $fetch['Company_Category'] . ' mh-365 mw-365">';// add css classes and the like here. In case you don't know, the .= operators concatenate the strings that will make your html code.
					$divHtml .=' <div class="card">'; 
					$divHtml .='    <div class="card-block">'; 
					$divHtml .='    <img src="images/startup.png" id="card-image" class="img-responsive">'; 
					$divHtml .='    <div class="card-title">';
					$divHtml .='    <h4>' . $fetch['Company_Name'] . '</h4>';
					$divHtml .='    </div>';
					$divHtml .='   <div class="card-text">' . $fetch["Company_desc"] . '</div>';
					$divHtml .='    <a style="margin-top: 10px;" href="CompanyProfile.php" class="btn btn-success">Read more</a>'; // be careful with this class, as you might need to evaluate it for every run of the loop
					$divHtml .='        </div>';
					$divHtml .='            </div>';
					$divHtml .='            </div>';		}  ?>
					<?php echo $divHtml; ?>
				</div>
			</div>
			
			
	</br></br></br>
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