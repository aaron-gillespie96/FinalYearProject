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
		
	<?php
$usernameVal=$_REQUEST["username"];
//$passwordVAl=$_REQUEST["password"];

$servername = "localhost";
$username = "root";
$password = "hhCEiY41iknJ";
$dbname = "icohub";
$name = $_POST['name'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{

     $escapedPW = mysqli_real_escape_string($conn,$_REQUEST['password']);

     //save this user and pass as cookie if remeber checked start
 if (isset($_REQUEST['remember']))
   $escapedRemember = mysqli_real_escape_string($conn,$_REQUEST['remember']);

 $cookie_time = 60 * 60 * 24 * 30; // 30 days
  $cookie_time_Onset=$cookie_time+ time();
  if (isset($escapedRemember)) {
    /*
     * Set Cookie from here for one hour
     * */
    setcookie("username", $usernameVal, $cookie_time_Onset);
    setcookie("password", $escapedPW, $cookie_time_Onset);  

  } else {

      $cookie_time_fromOffset=time() -$cookie_time;
setcookie("username", '',$cookie_time_fromOffset );
    setcookie("password", '', $cookie_time_fromOffset);  

  }
  //save this user and pass as cookie if remember checked end
     
//now check user and pass verification
 $query = "select * from $name where username = '$usernameVal';";
 
     $resultSet = mysqli_query($conn,$query);

                           if(@mysqli_num_rows($resultSet) > 0){
                           //check noraml user salt and pass
                           //echo "noraml";
                            
 $saltQuery = "select salt from $name where username = '$usernameVal';";
$result = mysqli_query($conn,$saltQuery);
$row = mysqli_fetch_assoc($result);
$salt = $row['salt'];

$saltedPW =  $escapedPW . $salt;

$hashedPW = hash('sha256', $saltedPW);

 $query = "select * from $name where username = '$usernameVal' 
and password = '$hashedPW' ";
                        
                            $resultSet = mysqli_query($conn,$query);

                           if(@mysqli_num_rows($resultSet) > 0){
							   $row = mysqli_fetch_assoc($resultSet);
                               echo "your username and  password is correct";
                               session_start();
                               $_SESSION["user_id"]=$row["Startup_id"];
                               $_SESSION["user_name"]=$row["username"];
							   $_SESSION["companyname"]=$row["Company_Name"];
							   $_SESSION["Company_Desc"]=$row["Company_Desc"];
							    $_SESSION["vid_link"]=$row["vid_link"];
							   $_SESSION["Token_Name"]=$row["Token_Name"];
							   $_SESSION["Total_Tokens"]=$row["Total_Tokens"];
							   $_SESSION["Token_Price"]=$row["Token_Price"];
							   $_SESSION["Launch_Date"]=$row["Launch_Date"];
							   $_SESSION["Company_Category"]=$row["Company_Category"];
							    $_SESSION["Investor_id"]=$row["Investor_id"];
								 $_SESSION["Fullname"]=$row["Fullname"];
								  $_SESSION["Address1"]=$row["Address1"];
								  $_SESSION["Address2"]=$row["Address2"];
								  $_SESSION["County"]=$row["County"];
								  $_SESSION["Country"]=$row["Country"];
								    $_SESSION["Phone_No"]=$row["Phone_No"];
									$_SESSION["Email"]=$row["Email"];
							   $_SESSION["Type"]=$row["Type"];
							    $_SESSION["Company_funding"]=$row["Company_funding"];
								 $_SESSION["Ethereum_Value"]=$row["Ethereum_Value"];
								  $_SESSION["image"]=$row["image"];

							   
							   
header("location:index.php");
}



}
 
}
?>
		  <!--Login Modal -->
		  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			  <div class="modal-dialog">
					<div class="loginmodal-container">
						<form name="signupform" action="" method="post">
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
		  <!--End of Login Modal-->
		  	

		  <!--Register Modal-->
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
		 <!-- End of Register Modal-->
		  
	
	
		
		
		
		<div class ="parallax1">
			<div class="container">
				<div class="row" id="video-section-top">
					
							<div class="col-sm-2"></div>
								<!--Embedded video in the homepage --> 
								<div class="col-sm-8 ">
									<div class="embed-responsive embed-responsive-4by3">
										<iframe class="embed-responsive-item" style="max-width:840; max-height:500;" src="https://www.youtube.com/embed/v9uFp_XavVw"></iframe>
									</div>
								</div>
								<!-- End of the embedded video in the homepage -->
							<div class="col-sm-2"></div>
					</div>
			</div> 
			
			
			<div class="section-style">
				<div class="container" id="whatis">
					<div class="row">
							<div class="col-sm-6 section-widths">
								<h1 class="mainTitle">What is ICOHub?</h1>
								<p class="aboutIcohub">ICOHub is a unique and innovative investment platform that allows start-up companies to
								launch an ICO without any blockchain knowledge. We offer a package of services tailored for
								our two key demographics start-up companies and investors.</p>
							</div>
							
							<div class="col-sm-6 section-widths">
								<img src="images/mobilephone1.png" class="img-responsive" alt="Mobile Phone">
							</div>
					</div> 
				</div>
				</div>
				
				<div class="section-style">
				<div class="container" id="investorinfo">
					<div class="row">
					
					<div class="col-sm-6 section-widths">
							<h1 class="mainTitle">Investors</h1>
							<p class="aboutIcohub"> ICOHub provides investors with an ICO Marketplace allowing you to browse ICO's all in one place.
We also provide free tools such as a  <br>
							<ul class="list-unstyled">
							<li>
									<span class="glyphicon glyphicon-ok aboutIcohub"></span> Secure Ethereum Wallet
								</li>
								
								<li>
									<span class="glyphicon glyphicon-ok aboutIcohub"></span> Graphs and vizulisations of your profits.
								</li><br></P>
						</ul>
						<a href="marketplace.php" title="Blog" class="btn btn-linkedin btn-lg" data-toggle="modal" data-target="#login-modal"></i> Get Started</a>
							</div>
						
							<div class="col-sm-6 section-widths">
							<img src="images/investorchart.png" class="img-responsive" alt="investor chart">
							</div>
						
					</div>
				</div>
				</div>
			
				
							
				<div class="section-style">
					<div class="container" id="startupinfo">
					<div class="row">
					
							<div class="col-sm-6 section-widths">
							<h1 class="mainTitle">Start-Ups</h1>
							<p class="aboutIcohub"> ICOHub provides startups a simple way to launch their own ICO Token which allows startups to gain funding
from investors with ease. Listing on our marketplace is free and you are only charged a transaction comission
fee (3%).
 <br>
							<ul class="list-unstyled">
							<li>
									<span class="glyphicon glyphicon-ok aboutIcohub"></span> Free listings on our marketplace
								</li>
								
								<li>
									<span class="glyphicon glyphicon-ok aboutIcohub"></span> Provides automated token creation
								</li><br></P>
						</ul>
						<a href="" title="Blog" class="btn btn-linkedin btn-lg" data-toggle="modal" data-target="#login-modal"></i>Get Started</a>
							</div>
								<div class="col-sm-6 section-widths">
								<img src="images/startupprofile.png" class="img-responsive" alt="build, measure, learn image">
								</div>
							
		
						
					</div>
				</div> 
				</div>
				
				<div class="section-style">
				<div class="container" id="ourfavourites">
					<div class="row">
						<div class="col-sm-12 section-widths">
								<h1 class="mainTitles">Our Favourites</h1>
				
						
						 <?php require ("dbc.php");?>
					<?php  $SQL = "SELECT * FROM ourfavourites";
					mysql_select_db($dbname);
					$result = mysql_query($SQL, $conn);
					while($fetch = mysql_fetch_array($result)){
					$divHtml .='<div class="gallery_product col-sm-4  filter ' . $fetch['Company_Category'] . ' mh-365 mw-365">';// add css classes and the like here. In case you don't know, the .= operators concatenate the strings that will make your html code.
					$divHtml .=' <div class="card">'; 
					$divHtml .='    <div class="card-block">'; 
					$divHtml .='    <img class="img-responsive" src="data:image/*;base64,'.base64_encode($fetch["image"]). ' " /> '; 
					$divHtml .='    <div class="card-title">';
					$divHtml .=' <br>';
					$divHtml .='    </div>';
					$divHtml .='   <div class="card-text">' . $fetch["Company_desc"] . '</div>';
					$divHtml .='    <a style="margin-top: 10px;" href="CompanyProfile.php" class="btn btn-success">View Profile</a>'; // be careful with this class, as you might need to evaluate it for every run of the loop
					$divHtml .='        </div>';
					$divHtml .='            </div>';
					$divHtml .='            </div>';		}  ?>
					<?php echo $divHtml; ?>
			
			<div class="container">
			<div class="row">
			<div class="col-sm-12 ">
			<a href="marketplace.php" title="Blog" class="btn btn-linkedin btn-lg"></i> View Our Marketplace</a>
			</div>
			</div>
			</div>
						
					
						
							
						</div>
					</div>
				</div>
			</div>
				
				
				
				
			<div class="section-style">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 section-widths" id="our-team" style="border: 1px solid white;">
								<h1 class="mainTitles" style="color: white;">Our Team</h1>
						</div>
					
						<div class="container">
							<div class="row">
								<div class="col-sm-3 section-widths">
									<div class="profile-card">
										  <img src="images/evand.jpg" class="img-circle" alt="Evan" style="width:100%">
										  
									</div>
								</div>
							
								
								<div class="col-sm-3 section-widths">
									<div class="profile-card" id="evans-card">
										<h3 style="color: white;"><span class="glyphicon glyphicon-user"></span> Evan Doherty </h3>
											<h4 style="color: white;"> Co-Founder </h4>
											<p style="color: white;" id="university">Dublin City University</p>
											<a href="https://www.linkedin.com/in/evan-doherty/" title="LinkedIn" class="btn btn-linkedin btn-lg"> LinkedIn</a>
											<a href="" title="Blog" class="btn btn-linkedin btn-lg"></i> Project Blog</a>
										  
									</div>
								</div>

							<div class="col-sm-3 section-widths">
								<div class="profile-card">
										  <img src="images/aaron1.jpg" class="img-circle" alt="Aaron" style="width:100%">
									</div>
								</div>
								
								<div class="col-sm-3 section-widths">
									<div class="profile-card" id="aarons-card">
											<h3 style="color: white;"> <span class="glyphicon glyphicon-user"></span> Aaron Gillespie </h3>
											<h4 style="color: white;"> Co-Founder </h4>
											<p style="color: white;" id="university">Dublin City University</p>	
											<a href="https://www.linkedin.com/in/aaron-gillespie/" title="LinkedIn" class="btn btn-linkedin btn-lg"> LinkedIn</a>	
											<a href="" title="Blog" class="btn btn-linkedin btn-lg"></i> Project Blog</a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				</div>


						
				 
				

						

		<div class="section-style">
		   <div class="container" id="contact-us">
					<div class="row">
						<div class="col-sm-8 section-widths">
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
						<div class="col-sm-4 section-widths">
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
			
			<div class="section-style">
				<div class="container" >
					<div class="row">
						<div class="col-sm-12 section-widths" >
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2379.663773063783!2d-6.258975184847709!3d53.38506517951241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e1b2f9d5d03%3A0x12bb45984107c2a8!2sDCU+-+Dublin+City+University!5e0!3m2!1sen!2sie!4v1518470013026" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
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
		  
		  <!-- Function that allows a modal to be hidden when another modal is choosen-->
		  <script>
			$(function() {
		  return $(".modal").on("show.bs.modal", function() {
			var curModal;
			curModal = this;
			$(".modal").each(function() {
			  if (this !== curModal) {
				$(this).modal("hide");
			  }
				});
			  });
			});
		</script>
  
</html>