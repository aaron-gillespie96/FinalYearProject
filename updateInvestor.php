
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "hhCEiY41iknJ", "icohub");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
@session_start();
$address1= $_POST['address1'];
$address2 = $_POST['address2'];
$county = $_POST['county'];
$country = $_POST['country'];
$phone= $_POST['phone'];
$email = $_POST['email'];
$user_id = $_SESSION["Investor_id"]; 

$sql = "UPDATE Investor SET Address1= '$address1', Address2= '$address2', County= '$county',  Country= '$country', Phone_No = '$phone', Emmail = '$email' WHERE username = '$user_id'";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 
// Close connection
mysqli_close($link);
?>