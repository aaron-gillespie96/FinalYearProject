<?php
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


echo "<script>
window.location.href='investorProfile.php';
alert('Your Ethereum has been withdrawn from your account');
</script>";
// Close connection
mysqli_close($link);


?>;