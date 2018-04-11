
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "hhCEiY41iknJ", "icohub");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 @session_start();
 $companyname = $_POST['companyname'];
$description = $_POST['companydesc'];
$video = $_POST['companyvid'];
$tokenname = $_POST['tokenname'];
$totaltokens = $_POST['totaltokens'];
$totalprice = $_POST['totalprice'];
$date = $_POST['shootdate'];
$category = $_POST['category'];

$user_name = $_SESSION['user_name']; 

// Attempt insert query execution
$sql = "UPDATE Startup SET Company_Name= '$companyname', Company_desc= '$description', vid_link = '$video', Token_Name = '$tokenname', Total_Tokens = '$totaltokens', Token_Price = '$tokenprice', Launch_Date = '$date', Company_Category = '$category', Startup_PDF = '$PDF'  WHERE username = '$user_name'";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 
// Close connection
mysqli_close($link);
?>