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
$sql = "Insert into Investments (Investor_id, Company_Name, Original_Purchase_Price, Total_Tokens, Total_Value) Values ('$user_id', 'LogoGrab', '0.034', '$result', '$n1')";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
					
?> 