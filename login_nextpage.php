<?php
$usernameVal=$_REQUEST["username"];
//$passwordVAl=$_REQUEST["password"];

$servername = "localhost";
$username = "root";
$password = "hhCEiY41iknJ";
$dbname = "icohub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{

     $escapedPW = mysqli_real_escape_string($conn,$_REQUEST['password']);

     //save this user and pass as cookie if remeber checked start
 if (isset($_REQUEST['remember']))
   $escapedRemember = mysqli_real_escape_string($conn,$_REQUEST['remember']);

 $cookie_time = 60 * 60 * 24 * 30; // 30 days
  $cookie_time_Onset=$cookie_time+ time();
  if (isset($escapedRemember)) {
    /*
     * Set Cookie from here for one hour
     * */
    setcookie("username", $usernameVal, $cookie_time_Onset);
    setcookie("password", $escapedPW, $cookie_time_Onset);  

  } else {

      $cookie_time_fromOffset=time() -$cookie_time;
setcookie("username", '',$cookie_time_fromOffset );
    setcookie("password", '', $cookie_time_fromOffset);  

  }
  //save this user and pass as cookie if remember checked end
     
//now check user and pass verification
 $query = "select * from Startup where username = '$usernameVal';";
 
     $resultSet = mysqli_query($conn,$query);

                           if(@mysqli_num_rows($resultSet) > 0){
                           //check noraml user salt and pass
                           //echo "noraml";
                            
 $saltQuery = "select salt from Startup where username = '$usernameVal';";
$result = mysqli_query($conn,$saltQuery);
$row = mysqli_fetch_assoc($result);
$salt = $row['salt'];

$saltedPW =  $escapedPW . $salt;

$hashedPW = hash('sha256', $saltedPW);

 $query = "select * from Startup where username = '$usernameVal' 
and password = '$hashedPW' ";
                        
                            $resultSet = mysqli_query($conn,$query);

                           if(@mysqli_num_rows($resultSet) > 0){
							   $row = mysqli_fetch_assoc($resultSet);
                               echo "your username and  password is corrent";
                               session_start();
                               $_SESSION["user_id"]=$row["Startup_id"];
                               $_SESSION["user_name"]=$row["username"];
							   $_SESSION["companyname"]=$row["Company_Name"];
							   $_SESSION["company_desc"]=$row["Company_desc"];
							   $_SESSION["vid_link"]=$row["vid_link"];

							   
							   
header("location:index.php");
}
else
{
echo "your username or password is incorrect";
}

}
     
}
?>