<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "hhCEiY41iknJ", "icohub");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 @session_start();
 $result = $_POST['result'];
$user_id =  $_SESSION["Investor_id"];
$user_name = $_SESSION['user_name'];
$n1 = $_POST['n1'];  


// Attempt insert query execution
$update = "UPDATE Startup SET Company_funding= Round((Company_funding + $result * 395.94),2) WHERE Company_Name = 'LogoGrab'";
$deducttokens ="UPDATE Startup SET Total_Tokens= (Total_Tokens - $n1) WHERE Company_Name = 'LogoGrab'";
$test = "UPDATE Investor SET Ethereum_Value= (Ethereum_Value - $result) WHERE username = '$user_name'";
$sql = "Insert into Investments (Investor_id, Company_Name, Original_Purchase_Price, Total_Tokens, Todays_Value, Total_Value) Values ('$user_id', 'LogoGrab', '0.034', '$n1', '0.034', '$result')";
if(mysqli_query($link, $sql)){
    mysqli_query($link, $test);
	 mysqli_query($link, $update);
	  mysqli_query($link, $deducttokens);

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
header("location:CompanyProfile.php");	
?> 