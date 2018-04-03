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
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		


		
		
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
					
					
				 <?php require ("dbc.php");
											  $user_name = $_SESSION['Investor_id']; 
?>
<?php
$SQL = "SELECT SUM(Total_Tokens * Todays_Value) as value_sum From Investments Where Investor_id = '$user_name'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.

while($fetch = mysql_fetch_array($result)){

   
	   $div5Html .=' '. $fetch["value_sum"] .'';
	  

 
}
?>
 <h2> Total Valuation: &euro;<?php echo$div5Html; ?> <!--<i class="fa fa-caret-up" style="color:green"> 0.32% 1H</i>--> </h2> 
 <?php require ("dbc.php");
											  $user_name = $_SESSION['Investor_id']; 
?>
<?php
$SQL = "SELECT Ethereum_Value from Investor Where Investor_id = '$user_name'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.

while($fetch = mysql_fetch_array($result)){

   
	   $div6Html .=' '. $fetch["Ethereum_Value"] .'';
	  

 
}
?>
 <h3> Ethereum Balance: ETH<?php echo$div6Html; ?>
 <br>
 <br>
 <div>
 <a href data-toggle="modal" data-target="#buyEthermodal" class="watchlistbtn">Buy</a>
 
 <div class="modal fade" id="buyEthermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="loginmodal-container">
						<form  onSubmit="alert('Your purchase was successful! Your funds have been added to your accoumt ');" action="" method="post">
								Purchase Amount (€): <input type="number" step="0.01" id="n1" required> <br>
								Total Ethereum value: <input type="text" id="result" name="result" required> 
								
								<br><br>
			
								<ul class="list-inline" style=" margin-left: 105px;">
								<li><button type="button" id="b1" onclick="calc(); enablesecondbutton();" class="btn">Calculate total</button></li>
								<li><input  id="b2" type="submit" value="Buy" onclick="<?php buy();?>" disabled></li>
								</ul>
								</form>
					</div>
				</div>
			</div>
			
<a href data-toggle="modal" data-target="#transEthermodal" class="watchlistbtn">Transfer</a>
 
 <div class="modal fade" id="transEthermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="loginmodal-container">
						Transfer your funds to:
						<input  type="text" name="total" value="L4NyUroir28Zoa7hhktZBosqYk1ZNcWSYMyDrnBifboZh1KjP6wv"readonly>
						
					</div>
				</div>
			</div>
 
 
 <a href data-toggle="modal" data-target="#withdrawModal" class="watchlistbtn">Withdraw</a>
 <div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="loginmodal-container">
					
					<form  onSubmit="alert('Your funds will now be withdrawn from your account.');" action="" method="post">
								Purchase Amount (€): <input type="number" step="0.01" id="n2" required> <br>
								Total Ethereum value: <input type="text" id="withdraw" name="withdraw" required>
								Enter the wallet address: <input type="text" name="walletaddress" required>
								
								<br><br>
								
								<ul class="list-inline" style=" margin-left: 105px;">
								<li><button type="button" id="b1" onclick="calc2(); enablesecondbutton2();" class="btn">Calculate total</button></li>
								<li><input  id="b3" type="submit" value="Withdraw" onclick="<?php withdraw();?>" disabled></li>
								</ul>
								</form>
					
					
					
					
					
	
						
					</div>
				</div>
			</div>
 </div>
 
					
				</div>
			
			<div class="col-sm-6 ">
				
				<h3> Investments Chart</h3>
				<div id="chartdiv" ></div>
			</div>
				
			</div>
		</div>
		
		<div class="container" style="background-color: white;">
			<div class="row" >
			
				<div class="col-sm-12">
			<div>
        <select>
            <option value="choose">Select an ICO from your investments</option>
            <option value="red">ico 1</option>
            <option value="green">ico 2</option>
            <option value="blue">ico 3</option>
        </select>
    </div>
    <div class="choose box"><div id="chartdiv3" ></div></div>
    <div class="red box">ico 1</div>
    <div class="green box">ico 2</div>
    <div class="blue box">Yico 3</div>
  

				
				</div>
			</div>
		</div>
		
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="accordion" role="tablist" aria-multiselectable="true">
					
					<div class="card">
							<div class="card-header" role="tab" id="headingFive">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
										My Account Details
									</a>
								</h5>
							</div>
							
							<div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
								<div class="card-block">
									
									
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
				
								echo "No Name Asssociated with this account";?><br></br>
									<b>Address Line 1: </b> <?php session_start();
							if (isset( $_SESSION["Address1"]) && !empty (  $_SESSION["Address1"]))
								echo $_SESSION["Address1"];
							else 
				
								echo "No Address associated with this account";?><br></br>
								<b>Address Line 2: </b> <?php session_start();
							if (isset( $_SESSION["Address2"]) && !empty (  $_SESSION["Address2"]))
								echo $_SESSION["Address2"];
							?><br></br>
								
								<b>County/State: </b> <?php session_start();
							if (isset( $_SESSION["County"]) && !empty (  $_SESSION["County"]))
								echo $_SESSION["County"];
							?><br></br>
								
								<b>Country: </b> <?php session_start();
							if (isset( $_SESSION["Country"]) && !empty (  $_SESSION["Country"]))
								echo $_SESSION["Country"];
							?> <br></br>
								
								<b>Phone No: </b> <?php session_start();
							if (isset( $_SESSION["Phone_No"]) && !empty (  $_SESSION["Phone_No"]))
								echo $_SESSION["Phone_No"];
							else 
				
								echo "No Phone Number associated with this account";?><br></br>
								
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
							</div>
					  </div>
						
					
					
  
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
											  
											  <th scope="col"><u>Company Name</u></th>
											   <th scope="col"><u>Total Tokens</u></th>
											  <th scope="col"><u>Original Purchase Price</u></th>
											  <th scope="col"><u>Today's Value</u></th>
											  <th scope="col"><u>Total Value</u></th>
											</tr>
										</thead>
										<tbody>
										      <?php require ("dbc.php");
											  $user_name = $_SESSION['Investor_id']; 
?>
<?php
$SQL = "SELECT Company_Name, Total_Tokens, Original_Purchase_Price, Todays_Value, Total_Value, Total_Tokens * Todays_Value as value FROM Investments Where Investor_id = '$user_name'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.

while($fetch = mysql_fetch_array($result)){

    $divHtml .='<tr>';// add css classes and the like here. In case you don't know, the .= operators concatenate the strings that will make your html code.
	 $divHtml .='    <td>'. $fetch['Company_Name'] .'</td>'; 
	   $divHtml .='    <td>'. $fetch["Total_Tokens"] .'</td>'; 
	   $divHtml .='    <td> &euro;'. $fetch["Original_Purchase_Price"] .'</td>'; 
	   $divHtml .='    <td> &euro;'. $fetch["Todays_Value"] .'</td>';
	   $divHtml .='    <td> &euro;'. $fetch["value"] .'</td>';
	    $divHtml .='    <td> <button type="button" class="btn btn-danger">Sell</button> </td>';
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
											  <th scope="col"><u>Company Name</u></th>
											  <th scope="col"><u>Todays Price</u></th>
											</tr>
										  </thead>
										   <tbody>
											
											<?php require ("dbc.php");
											  $user_name = $_SESSION['Investor_id']; 
?>
<?php
$SQL = "SELECT Watchlist_id, Company_Name, Token_Price FROM Watchlist Where Investor_id = '$user_name'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.


if(mysql_num_rows($result) <=0)
{
	echo "no results";
}
while($fetch = mysql_fetch_array($result)){

    $div2Html .='<tr>';// add css classes and the like here. In case you don't know, the .= operators concatenate the strings that will make your html code.
	 $div2Html .='    <td>'. $fetch['Company_Name'] .'</td>'; 
	  $div2Html .='    <td> &euro;'. $fetch["Token_Price"] .'</td>'; 
	   $div2Html .='    <td> <a href=delete.php?id=' . $fetch["Watchlist_id"] . ' class="watchlistbtn">Remove</a> </td>';
 $div2Html .='    </tr>';
 
 
 
}


?>
 <?php echo $div2Html; ?>
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
$SQL = "SELECT Company_Name, Total_Tokens FROM Investments Where Investor_id = '$user_name'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);

//now in the loop you've got to be careful with the css classes, as your html shows, they won't be always the same. But this should give you some insight on how it works.

while($fetch = mysql_fetch_array($result)){

    $div4Html .='{';// add css classes and the like here. In case you don't know, the .= operators concatenate the strings that will make your html code.
    $div4Html .='  "Investment": " '. $fetch['Company_Name'] .' ",'; 
	 $div4Html .=' "investment weight": '. $fetch["Total_Tokens"] .' '; 
	  $div4Html .='},'; 
 
}
?>

<script>
var chart = AmCharts.makeChart("chartdiv3", {
    "type": "serial",
    "theme": "light",
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":true,
    "dataDateFormat": "YYYY-MM-DD",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "ignoreAxisWidth":true
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true
    },
    "valueScrollbar":{
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": [{
  
        "date": "2018-02-28",
        "value": 58
    }, {
        "date": "2018-03-01",
        "value": 60
    }, {
        "date": "2018-03-02",
        "value": 67
    }, {
        "date": "2018-03-03",
        "value": 64
    }, {
        "date": "2018-03-04",
        "value": 66
    }, {
        "date": "2018-03-05",
        "value": 60
    }, {
        "date": "2018-03-06",
        "value": 63
    }, {
        "date": "2018-03-07",
        "value": 61
    }, {
        "date": "2018-03-08",
        "value": 60
    }, {
        "date": "2018-03-09",
        "value": 65
    }, {
        "date": "2018-03-10",
        "value": 75
    }, {
        "date": "2018-03-11",
        "value": 77
    }, {
        "date": "2018-03-12",
        "value": 78
    }, {
        "date": "2018-03-13",
        "value": 70
    }, {
        "date": "2018-03-14",
        "value": 70
    }, {
        "date": "2018-03-15",
        "value": 73
    }, {
        "date": "2018-03-16",
        "value": 71
    }, {
        "date": "2018-03-17",
        "value": 74
    }, {
        "date": "2018-03-18",
        "value": 78
    }, {
        "date": "2018-03-19",
        "value": 85
    }, {
        "date": "2018-03-20",
        "value": 82
    }, {
        "date": "2018-03-21",
        "value": 83
    }, {
        "date": "2018-03-22",
        "value": 88
    }, {
        "date": "2018-03-23",
        "value": 85
    }, {
        "date": "2018-03-24",
        "value": 85
    }, {
        "date": "2018-03-25",
        "value": 80
    }, {
        "date": "2018-03-26",
        "value": 87
    }, {
        "date": "2018-03-27",
        "value": 84
    }, {
        "date": "2018-03-28",
        "value": 83
    }, {
        "date": "2018-03-29",
        "value": 84
    }, {
        "date": "2018-03-30",
        "value": <?php echo$div5Html; ?>
    }]
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}
</script>

 
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
var chartData = generatechartData();

function generatechartData() {
    var chartData = [];
    var firstDate = new Date();
    firstDate.setDate(firstDate.getDate() - 150);
    var visits = 300;

    for (var i = 0; i < 150; i++) {
        // we create date objects here. In your data, you can have date strings
        // and then set format of your dates using chart.dataDateFormat property,
        // however when possible, use date objects, as this will speed up chart rendering.
        var newDate = new Date(firstDate);
        newDate.setDate(newDate.getDate() + i);

        visits += Math.round((Math.random()<0.5?1:-1)*Math.random()*0.01);

        chartData.push({
            date: newDate,
            visits: visits
        });
    }
    return chartData;
}


var chart = AmCharts.makeChart("chartdiv2", {
    "theme": "light",
    "type": "serial",
    "marginRight": 80,
    "autoMarginOffset": 20,
    "marginTop":20,
    "dataProvider": chartData,
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0.1
    }],
    "graphs": [{
        "useNegativeColorIfDown": true,
        "balloonText": "[[category]]<br><b>value: [[value]]</b>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletBorderColor": "#FFFFFF",
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "lineColor": "#fdd400",
        "negativeLineColor": "#67b7dc",
        "valueField": "visits"
    }],
    "chartScrollbar": {
        "scrollbarHeight": 5,
        "backgroundAlpha": 0.1,
        "backgroundColor": "#868686",
        "selectedBackgroundColor": "#67b7dc",
        "selectedBackgroundAlpha": 1
    },
    "chartCursor": {
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "axisAlpha": 0,
        "minHorizontalGap": 60
    },
    "export": {
        "enabled": true
    }
});

chart.addListener("dataUpdated", zoomChart);
//zoomChart();

function zoomChart() {
    if (chart.zoomToIndexes) {
        chart.zoomToIndexes(130, chartData.length - 1);
    }
}
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
			  
<script>


function enablesecondbutton() {
    document.getElementById("b2").disabled = false;
}

</script>

<script>


function enablesecondbutton2() {
    document.getElementById("b3").disabled = false;
}

</script>			  
			  
			  <script>
			  function calc(){
		var n1 = parseFloat(document.getElementById('n1').value);
		document.getElementById('result').value =  n1 / 395.94  ;
	}
	
	
</script>

</script>			  
			  
			  <script>
			  function calc2(){
		var n1 = parseFloat(document.getElementById('n2').value);
		document.getElementById('withdraw').value =  n1 / 395.94  ;
	}
	
	
</script>

<script>
					
						
					<?php
					function withdraw() {
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "hhCEiY41iknJ", "icohub");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 @session_start();
 $withdraw = $_POST['withdraw'];

$user_name = $_SESSION['user_name']; 


// Attempt insert query execution
$sql = "UPDATE Investor SET Ethereum_Value= (Ethereum_Value - $withdraw) WHERE username = '$user_name'";
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

<?php
function buy(){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "hhCEiY41iknJ", "icohub");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 @session_start();
 $result = $_POST['result'];

$user_name = $_SESSION['user_name']; 


// Attempt insert query execution
$sql = "UPDATE Investor SET Ethereum_Value= (Ethereum_Value + $result) WHERE username = '$user_name'";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 
// Close connection
mysqli_close($link);
 header("location:investorProfile.php");
}
?>;


</script>

<script>
$(document).ready(function(){
        $("select").change(function(){
            $( "select option:selected").each(function(){
                if($(this).attr("value")=="red"){
                    $(".box").hide();
                    $(".red").show();
                }
                if($(this).attr("value")=="green"){
                    $(".box").hide();
                    $(".green").show();
                }
                if($(this).attr("value")=="blue"){
                    $(".box").hide();
                    $(".blue").show();
                }
                if($(this).attr("value")=="choose"){
                    $(".box").hide();
                    $(".choose").show();
                }
            });
        }).change();
    });
</script>
			  
	
			
  
</html>