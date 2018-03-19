<html lang="en">
<?php  session_start(); ?>
	  <head>
	  
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="viewport" content="initial-scale=1">
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="js/canvasjs.min.js">
			<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
		
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
							 <?php if(isset($_SESSION['Type']) && !empty($_SESSION['Type']) ){ ?>
							<ul class="dropdown-menu">
								<li>
									<a href="myCompanyProfile.php"><span class="glyphicon glyphicon-eye-open"></span>View Profile</a>
								</li>
								
								<li>
									<a href="startupDetails.php"><span class="glyphicon glyphicon-pencil"></span> Update Profile</a>
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
									<a href="startupDetails.php"><span class="glyphicon glyphicon-pencil"></span> Update Profile</a>
								</li>
								<li>
									<a href="TokenCreator.php"><span class="glyphicon glyphicon-arrow-right"></span> Token Creator</a>
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
						<form name="signupform" action="login_nextpage.php" method="get">
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
						<form name="signupform" action="signup_nextpage.php" method="get">
							<input type="text" name="username" placeholder="enter username" required>
							<input type="password" id="passwordID" name="password" placeholder="enter password" required>
							<input type="password" name="cpassword" placeholder="enter confirm password" oninput="check(this)" required>
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
	
		<div class="container" style="background-color: white;">
			<div class="row" id="investorProfile">
			
				<div class="col-sm-6">
					<h3><u>My Account Details</u></h3>
							<a href="#" class="btn btn-primary a-btn-slide-text" onclick="switchVisible();"id="edit-button">
							<span class="glyphicon glyphicon-edit" aria-hidden="true" ></span>
							<span><strong>Edit Details</strong></span>            
							</a>
							 
							<div id="Div1">	
								<div class="text">
									<b>Full name: </b><?php session_start();
							if (isset( $_SESSION["Fullname"]) && !empty (  $_SESSION["Fullname"]))
								echo $_SESSION["Fullname"];
							else 
				
								echo "No Name Asssociated with this account";?><br>
									<b>Address Line 1: </b> <?php session_start();
							if (isset( $_SESSION["Address1"]) && !empty (  $_SESSION["Address1"]))
								echo $_SESSION["Address1"];
							else 
				
								echo "No Address associated with this account";?><br>
								<b>Address Line 2: </b> <?php session_start();
							if (isset( $_SESSION["Address2"]) && !empty (  $_SESSION["Address2"]))
								echo $_SESSION["Address2"];
							?><br>
								
								<b>County/State: </b> <?php session_start();
							if (isset( $_SESSION["County"]) && !empty (  $_SESSION["County"]))
								echo $_SESSION["County"];
							?><br>
								
								<b>Country: </b> <?php session_start();
							if (isset( $_SESSION["Country"]) && !empty (  $_SESSION["Country"]))
								echo $_SESSION["Country"];
							?> <br>
								
								<b>Phone No: </b> <?php session_start();
							if (isset( $_SESSION["Phone_No"]) && !empty (  $_SESSION["Phone_No"]))
								echo $_SESSION["Phone_No"];
							else 
				
								echo "No Phone Number associated with this account";?><br>
								
								<b>Email: </b> <?php session_start();
							if (isset( $_SESSION["Email"]) && !empty (  $_SESSION["Email"]))
								echo $_SESSION["Email"];
							else 
				
								echo "No Email Address associated with this account";?>
								</div>
							</div>
							
							
							<div id="Div2">
								<div class="text">
								First name:

								Last name
								</div>
							</div>
				</div>
			
			<div class="col-sm-6 ">
				<div id="chartdiv" class></div>
			</div>
				
			</div>
		</div>
		
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="accordion" role="tablist" aria-multiselectable="true">
  
					<div class="card">
						<div class="card-header" role="tab" id="headingTwo">
							<h5 class="mb-0">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Inventments
								</a>
							</h5>
						</div>
						
							<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
							
							
								<div class="card-block">
									<table class="table">
										<thead>
											<tr>
											  <th scope="col">#</th>
											  <th scope="col"><u>Name</u></th>
											  <th scope="col"><u>Price</u></th>
											  <th scope="col"><u>Balance</u></th>
											</tr>
										</thead>
										<tbody>
										      <?php require ("dbc.php");
											  $user_name = $_SESSION['Investor_id']; 
?>
<?php
$SQL = "SELECT Company_Name, Token_Price FROM Investments Where Investor_id = '$user_name'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.

while($fetch = mysql_fetch_array($result)){

    $divHtml .='<tr>';// add css classes and the like here. In case you don't know, the .= operators concatenate the strings that will make your html code.
    $divHtml .='  <th scope="row">1</th>'; 
	 $divHtml .='    <td>'. $fetch['Company_Name'] .'</td>'; 
	  $divHtml .='    <td>'. $fetch["Token_Price"] .'</td>'; 
	   $divHtml .='    <td>1728</td>';
 $divHtml .='    </tr>';
 
}
?>
 <?php echo $divHtml; ?>
											
										 </tbody>
								</table>
							  </div>
							</div>
						</div>
						
						
					  <div class="card">
							<div class="card-header" role="tab" id="headingThree">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										Watchlist
									</a>
								</h5>
							</div>
							
							<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
								<div class="card-block">
									<table class="table">
										  <thead>
											<tr>
											  <th scope="col">#</th>
											  <th scope="col"><u>Name</u></th>
											  <th scope="col"><u>Price</u></th>
											</tr>
										  </thead>
										   <tbody>
											
											<?php require ("dbc.php");
											  $user_name = $_SESSION['Investor_id']; 
?>
<?php
$SQL = "SELECT Company_Name, Token_Price FROM Watchlist Where Investor_id = '$user_name'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.

while($fetch = mysql_fetch_array($result)){

    $div2Html .='<tr>';// add css classes and the like here. In case you don't know, the .= operators concatenate the strings that will make your html code.
    $div2Html .='  <th scope="row">1</th>'; 
	 $div2Html .='    <td>'. $fetch['Company_Name'] .'</td>'; 
	  $div2Html .='    <td>'. $fetch["Token_Price"] .'</td>'; 
 $div2Html .='    </tr>';
 
}
?>
 <?php echo $div2Html; ?>
										  </tbody>
									</table>
								</div>
							</div>
					  </div>
					  
					  
					   <div class="card">
							<div class="card-header" role="tab" id="headingFour">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										Recent Activity
									</a>
								</h5>
							</div>
							
							<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
								<div class="card-block">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col"><u>Name</u></th>
												<th scope="col"><u>Price</u></th>
											</tr>
										</thead>
										<tbody>
											<?php require ("dbc.php");
											  $user_name = $_SESSION['Investor_id']; 
?>
<?php
$SQL = "SELECT Company_Name, Token_Price FROM recentactivity Where Investor_id = '$user_name'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.

while($fetch = mysql_fetch_array($result)){

    $div3Html .='<tr>';// add css classes and the like here. In case you don't know, the .= operators concatenate the strings that will make your html code.
    $div3Html .='  <th scope="row">1</th>'; 
	 $div3Html .='    <td>'. $fetch['Company_Name'] .'</td>'; 
	  $div3Html .='    <td>'. $fetch["Token_Price"] .'</td>'; 
 $div3Html .='    </tr>';
 
}
?>
 <?php echo $div3Html; ?>
										</tbody>
									</table>
								</div>
							</div>
					    </div>
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
	
	      <?php require ("dbc.php");
											  $user_name = $_SESSION['Investor_id']; 
?>
<?php
$SQL = "SELECT Company_Name, Token_Price FROM Investments Where Investor_id = '$user_name'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.

while($fetch = mysql_fetch_array($result)){

    $div4Html .='{';// add css classes and the like here. In case you don't know, the .= operators concatenate the strings that will make your html code.
    $div4Html .='  "Investment": " '. $fetch['Company_Name'] .' ",'; 
	 $div4Html .=' "investment weight": '. $fetch["Token_Price"] .' '; 
	  $div4Html .='},'; 
 
}
?>
 <?php echo $div4Html; ?>
				  <script>
							var chart = AmCharts.makeChart("chartdiv", {
							"type": "pie",
							"theme": "light",
							"innerRadius": "40%",
							"gradientRatio": [-0.4, -0.4, -0.4, -0.4, -0.4, -0.4, 0, 0.1, 0.2, 0.1, 0, -0.2, -0.5],
							"dataProvider": [<?php echo $div4Html; ?>],
							"balloonText": "[[value]]",
							"valueField": "investment weight",
							"titleField": "Investment",
							"balloon": {
								"drop": true,
								"adjustBorderColor": false,
								"color": "#FFFFFF",
								"fontSize": 16
							},
							"export": {
								"enabled": true
							}
						});
				</script>
				
				<script>
						$(".link").click(function(e) {
							e.preventDefault();
							$('.content-container div').fadeOut('slow');
							$('#' + $(this).data('rel')).fadeIn('slow');
						});
				</script>
  
			    <script>
					function switchVisible() {
								if (document.getElementById('Div1')) {

									if (document.getElementById('Div1').style.display == 'none') {
										document.getElementById('Div1').style.display = 'block';
										document.getElementById('Div2').style.display = 'none';
									}
									else {
										document.getElementById('Div1').style.display = 'none';
										document.getElementById('Div2').style.display = 'block';
									}
								}
					}  
			  </script>
			  
  
</html>