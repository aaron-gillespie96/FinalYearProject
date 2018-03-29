<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "Agg2uJKvGUng", "registerfacility");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 $facility_name = $_POST['form2'];
$facility_type = $_POST['form3'];
$contact_phone = $_POST['form3'];





// Attempt insert query execution
$sql = "insert into facilities(facility_name, facility_type, contact_phone) values ('$facility_name','$facility_type','$contact_phone')";




if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 
// Close connection
mysqli_close($link);
?>