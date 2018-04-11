<html lang="en">
<?php  session_start(); ?>
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
							<h1>       
							<?php require ("dbc.php");?>
							<?php
							
							$SQL = "SELECT * FROM Startup where Startup_id = '1'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.

while($fetch = mysql_fetch_array($result)){

   
	   $div1Html .=' '. $fetch["Company_Name"] .'';
	    $div2Html .=' '. $fetch["Company_Desc"] .'';
		 $div3Html .=' '. $fetch["Token_Name"] .'';
		  $div4Html .=' '. $fetch["Total_Tokens"] .'';
		   $div5Html .=' '. $fetch["Token_Price"] .'';
	   $div6Html .=' '. $fetch["Launch_Date"] .'';
	    $div7Html .=' '. $fetch["Company_Category"] .'';
		 $div8Html .=' '. $fetch["vid_link"] .'';
		 $divlogo .=' '. $fetch["image"] .'';
		  $msg.= '<img src="data:image/*;base64,'.base64_encode($fetch["image"]). ' " /> ';
		

 
}?><div style=" border: 1px solid black;">
<ul class="list-inline" style="text-align:center;"><?php session_start();
											
												
		?><li><?php echo  $msg;?> </li>									
 <li><h1 style="font-size:170%;"><?php echo  $div1Html;?></h1> </li>
 <ul>
 </div>
 <br>

 
 <?php require ("dbc.php");?>
							<?php
							$user_id =  $_SESSION["Investor_id"];
							$SQL = "SELECT onOrOff FROM watchlist where Investor_id = '$user_id'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.

$fetch = mysql_fetch_array($result);

	   
		

 

?><?php if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name']) ){
	 if(!isset($_SESSION['Type']) && empty($_SESSION['Type']) ){
 if(isset($fetch["onOrOff"]) && !empty($fetch["onOrOff"]) ){?> 
<form  action="watchlist.php" method="post">
							<input type="submit" value="Remove from watchlist" id="watchlistBtn" class="btn btn-lg btn-danger btn-responsive">
						</form>

						<?php } else { ?>
						<form  action="watchlist.php" onSubmit="alert('LogoGrab has been added to your watchlist');"method="post">
							<input type="submit" value="Add to watchlist" id="watchlistBtn" class="btn btn-lg btn-success btn-responsive">
						</form>
						
						
						 <?php } ?>
						  <?php } ?>
						    <?php } ?>
						</div>
					</div>
				</div>
		
				<div class="container companypage-background">
					<div class="row">
						<div class="col-sm-7">
								<h3>About Us</h3>
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" style="max-width:640; max-height:390;" src="<?php  echo  $div8Html;?>"></iframe>
								</div>
								<br>
								<h3>Company Description</h3>
								<p><?php  echo  $div2Html;?></p>
						</div>
						<br>
					
						<div class="col-sm-5" id="TokenDetails">
				 
					  <div style="background-color: #dee2e8; padding: 10px; border: 1px solid black;"">
									<h4><u>Token Details</u></h4>
								<div class="card-text"><b>Token Name:</b> <?php  echo  $div3Html;?>  <br>
								<b>Total Tokens: </b> <?php  echo  $div4Html;?><br>
								<b>Price Per Token: </b> <?php  echo  $div5Html;?><br>
								<b>Launch Date: </b> <?php  echo  $div6Html;?><br>
								<b>Category:</b> <?php  echo  $div7Html;?><br>
								
								</div>
							</div>
							
							<br>
							<br>
							<?php if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name']) ){ 
								 if(!isset($_SESSION['Type']) && empty($_SESSION['Type']) ){?>
								<div style="background-color: #dee2e8; padding: 10px; border: 1px solid black;">
								<h4><u>Buy Tokens</u></h4>
								<div class="card-text">
								<form action="buytoken.php" onSubmit="alert('LogoGrab has been added to your investments');"method="post">
								<b>Purchase Amount: </b> <input type="number" step="0.01" id="n1" name="n1"> <a href="" data-toggle="tooltip" title="Please enter the the number of tokens that your wish to buy into the the 'Purchase Amount' field and click the 'calculate total' button to calculate your total cost."><span class="glyphicon glyphicon-info-sign"></span></a><br>
								<b>Total Cost:</b> <input type="text" id="result" name="result" style=" background-color : #dee2e8; border:none" readonly> <br>
								
								<br>
			
								<ul class="list-inline" style=" margin-left: 105px;">
								<li><button type="button" id="b1" onclick="calc(); enablesecondbutton();" class="btn">Calculate total</button></li>
								<li><input  id="b2" type="submit" value="Buy" disabled="disabled"></li>
								</ul>
								</form>
								</div>
								</div>
							<?php } 
							}							?>
								
							
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
								<div class="col-sm-12" style="margin-bottom: 10px;">
								   <h3>Our Whitepaper </h3>
								   
								   <div id="downloadContent">
								<a href="whitepaper/whitepaper.docx">
									<img src="images/pdf.png" class="img-repsonsive" alt="Responsive image">
								</a>
						</div>
		
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
	<script src="js/ui.js"></script>
	
	<script>
	function calc(){
		var n1 = parseFloat(document.getElementById('n1').value);
		document.getElementById('result').value =  n1 *  <?php  echo  $div5Html;?> ;
	}
</script>

<script>
					
						
					<?php
					function update() {
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "hhCEiY41iknJ", "icohub");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 @session_start();
 $result= $_POST['result'];

$user_name = $_SESSION['user_name']; 


// Attempt insert query execution
$sql = "UPDATE Investor SET Ethereum_Value= (Ethereum_Value - $result) WHERE username = '$user_name'";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
					}
?> 


</script>





<script>
function enablesecondbutton() {
    document.getElementById("b2").disabled = false;
}

</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
   
  
</html>