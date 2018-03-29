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
?>;