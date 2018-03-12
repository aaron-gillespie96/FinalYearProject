<html lang="en">
<?php  session_start();
?>


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
						<li >
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
<input type="password" name="cpassword" placeholder="enter confirm password">
<input type="submit" value="signup">
</form>
				  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>

		
		
		
		
			<div class="container">
				<div class="row">
					<div id="section1">
							<div class="col-sm-2"></div>						
								<div class="col-sm-8" id="info1">
									<div class="embed-responsive embed-responsive-4by3">
										<iframe class="embed-responsive-item" style="max-width:840; max-height:500;" src="https://www.youtube.com/embed/v9uFp_XavVw"></iframe>
									</div>
								</div>
							<div class="col-sm-2"></div>
					</div>
				</div>
			</div> 
			<!--</div>-->
			
			
				<div class="container" id="whatis">
					<div class="row">
						<div id="section2">
							<div class="col-sm-6" id="info2">
								<h1 class="mainTitle">What is ICOHub?</h1>
								<p class="aboutIcohub">ICOHub is a unique and innovative investment platform that allows start-up companies to
								launch an ICO without any blockchain knowledge. We offer a package of services tailored for
								our two key demographics start-up companies and investors.</p>
							</div>
							
							<div class="col-sm-6" id="info2">
								<img src="images/mobilephone1.png" class="img-responsive" alt="Mobile Phone">
							</div>
						</div>
					</div> 
				</div>
				
				
				<div class="container" id="investorinfo">
					<div class="row">
						<div id="section3">
							<div class="col-sm-6">
							
							</div>
							
							<div class="col-sm-6">
							<h1 class="mainTitle">Investors</h1>
							<p class="aboutIcohub"> bLorem Ipsum is simply dummy text of the printing and typesetting industry. 
							Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
							when an unknown printer took a galley of type and scrambled it to make a type specimen book.
							It has survived not only five centuries, but also the leap into electronic typesetting, remaining
							essentially unchanged. <br>
							<ul class="list-unstyled">
							<li>
									<span class="glyphicon glyphicon-ok aboutIcohub"></span> Billing
								</li>
								
								<li>
									<span class="glyphicon glyphicon-ok aboutIcohub"></span> Billing
								</li><br></P>
						</ul>
  <button type="button" class="btn btn-primary btn-cons getStarted responsive">Get Started</button>
							</div>
							
						</div>
					</div>
				</div>
			
				
							
						
					<div class="container" id="startupinfo">
					<div class="row">
						<div id="section3">
							<div class="col-sm-6">
							<h1 class="mainTitle">Start-Ups</h1>
							<p class="aboutIcohub"> bLorem Ipsum is simply dummy text of the printing and typesetting industry. 
							Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
							when an unknown printer took a galley of type and scrambled it to make a type specimen book.
							It has survived not only five centuries, but also the leap into electronic typesetting, remaining
							essentially unchanged. <br>
							<ul class="list-unstyled">
							<li>
									<span class="glyphicon glyphicon-ok aboutIcohub"></span> Billing
								</li>
								
								<li>
									<span class="glyphicon glyphicon-ok aboutIcohub"></span> Billing
								</li><br></P>
						</ul>
  <button type="button" class="btn btn-primary btn-cons getStarted">Get Started</button>
							</div>
								<div class="col-sm-6">
							
							</div>
							
		
						</div>
					</div>
				</div> 
				
				
				<div class="container" id="ourfavourites">
					<div class="row">
						<div class="col-sm-12" id="marketplace">
								<h1 class="mainTitles">Our Favourites</h1>
				
						
						<div class="gallery_product col-sm-4  filter e-commerce mh-365 mw-365">
                <div class="card">
					<div class="card-block">	
						<img src="images/startup.png" id="card-image" class="img-responsive">
						<div class="card-title">
							<h4>title 1</h4>
						</div>
						<div class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
						1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic 
						</div>
						<a style="margin-top: 10px;" href="#" class="btn btn-success">Read more</a>
					</div>
				</div>
			</div>

           <div class="gallery_product col-sm-4  filter software mh-365 mw-365">
                <div class="card">
					<div class="card-block">	
						<img src="images/startup.png" id="card-image" class="img-responsive">
						<div class="card-title">
							<h4>title 1</h4>
						</div>
						<div class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
						1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic 
						</div>
						<a style="margin-top: 10px;" href="#" class="btn btn-success">Read more</a>
					</div>
				</div>
			</div>

             <div class="gallery_product col-sm-4  filter e-commerce mh-365 mw-365">
                <div class="card">
					<div class="card-block">	
						<img src="images/startup.png" id="card-image" class="img-responsive">
						<div class="card-title">
							<h4>title 1</h4>
						</div>
						<div class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
						1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic 
						</div>
						<a style="margin-top: 10px;" href="#" class="btn btn-success">Click here</a>
					</div>
				</div>
			</div>
			
			<div class="container">
			<div class="row">
			<div class="col-sm-12">
			<a href="marketplace.php" title="Blog" class="btn btn-linkedin btn-lg"></i> View Our Marketplace</a>
			</div>
			</div>
			</div>
						
					
						
							
						</div>
					</div>
				</div> 
				
				
				
				<div class="container">
					<div class="row">
						<div class="col-sm-12" id="our-team">
								<h1 class="mainTitles">Our Team</h1>
						</div>
					
						<div class="container">
							<div class="row">
								<div class="col-sm-3">
									<div class="profile-card">
										  <img src="images/evand.jpg" class="img-circle" alt="Evan" style="width:100%">
										  
									</div>
								</div>
							
								
								<div class="col-sm-3">
									<div class="profile-card" id="evans-card">
										<h3><span class="glyphicon glyphicon-user"></span> Evan Doherty </h3>
											<h4> Co-Founder </h4>
											<p id="university">Dublin City University</p>
											<a href="https://www.linkedin.com/in/evan-doherty/" title="LinkedIn" class="btn btn-linkedin btn-lg"><i class="fa fa-linkedin fa-fw"></i> LinkedIn</a>
											<a href="" title="Blog" class="btn btn-linkedin btn-lg"></i> Project Blog</a>
										  
									</div>
								</div>

							<div class="col-sm-3">
								<div class="profile-card">
										  <img src="images/aaron1.jpg" class="img-circle" alt="Aaron" style="width:100%">
									</div>
								</div>
								
								<div class="col-sm-3">
									<div class="profile-card" id="aarons-card">
											<h3> <span class="glyphicon glyphicon-user"></span> Aaron Gillespie </h3>
											<h4> Co-Founder </h4>
											<p id="university">Dublin City University</p>	
											<a href="https://www.linkedin.com/in/aaron-gillespie/" title="LinkedIn" class="btn btn-linkedin btn-lg"><i class="fa fa-linkedin fa-fw"></i> LinkedIn</a>	
											<a href="" title="Blog" class="btn btn-linkedin btn-lg"></i> Project Blog</a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>


						
				 
				

						


       <div class="container">
                <div class="row" id="contact-us">
                    <div class="col-sm-8" >
                        <div class="contactForm">
                            <form>
                                <h3>Contact Us</h3>
                                <div class="row">
                                    <div class="contact-box"></div>
                                    <div class="col-md-6 form-group">
                                        <input name="fname" class="form-control" placeholder="First Name" type="text">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="lname" class="form-control" placeholder="Last Name" type="text">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="subject" class="form-control" placeholder="Subject" type="text">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="email" class="form-control" placeholder="Email" type="email">
                                    </div>
                                   <label class="col-md-12 control-label" for="textarea"></label>
                                    <div class="col-md-12">                     
                                    <textarea class="form-control" id="textarea" name="textarea"></textarea>
                                     </div>
                                    <div class="col-md-12 text-right">
                                        <button class="contactForm-btn" type="submit">send message</button>
                                    </div>
								</div>
                             </form> 
						</div>

					</div>
                    <div class="col-sm-4">
                        <div class="contact-add-box">
                            <h4>Get in touch</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget leo.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget leo.</p>
                            <ul class="addressDetails">
                                <li><i class="glyphicon glyphicon-map-marker"></i>DCU, Glasnevin, Whitehall, Dublin 9.</li>
                                <li><i class="glyphicon glyphicon-earphone"></i>0860760370.</li>
                                <li><i class="glyphicon glyphicon-paperclip"></i>icohub@gmail.com</li>
                            </ul>
                               
						</div>
                      </div>
					  
                </div>
            </div>
			
			<div class="container" >
			<div class="row" id="map">
			<div class="col-sm-12" >
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2379.663773063783!2d-6.258975184847709!3d53.38506517951241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e1b2f9d5d03%3A0x12bb45984107c2a8!2sDCU+-+Dublin+City+University!5e0!3m2!1sen!2sie!4v1518470013026" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
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
  
	     <!-- Optional JavaScript -->
		 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		  <script src="js/jquery-3.2.1.min.js"</script>
		  <script src="js/bootstrap.js"></script>
		  <script src="js/bootstrap.min.js"></script>
		  <script src="js/ui.js"></script>
	  
		<!--Carousel function to allow slider-->
		  <script type="text/javascript">
		  $(document).ready(fucntion()) {$("#my-slider").carousel();
		  }
		  </script>
		  <script>
		  $(function () {
		  $(document).scroll(function () {
			var $nav = $(".navbar-fixed-top");
			$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
		  });
		});
		</script>
  
</html>