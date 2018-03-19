<?php
$usernameVal=$_REQUEST["username"];
//$passwordVAl=$_REQUEST["password"];

$servername = "localhost";
$username = "root";
$password = "hhCEiY41iknJ";
$dbname = "icohub";
$name = $_POST['name'];

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
 $query = "select * from $name where username = '$usernameVal';";
 
     $resultSet = mysqli_query($conn,$query);

                           if(@mysqli_num_rows($resultSet) > 0){
                           //check noraml user salt and pass
                           //echo "noraml";
                            
 $saltQuery = "select salt from $name where username = '$usernameVal';";
$result = mysqli_query($conn,$saltQuery);
$row = mysqli_fetch_assoc($result);
$salt = $row['salt'];

$saltedPW =  $escapedPW . $salt;

$hashedPW = hash('sha256', $saltedPW);

 $query = "select * from $name where username = '$usernameVal' 
and password = '$hashedPW' ";
                        
                            $resultSet = mysqli_query($conn,$query);

                           if(@mysqli_num_rows($resultSet) > 0){
							   $row = mysqli_fetch_assoc($resultSet);
                               echo "your username and  password is corrent";
                               session_start();
                               $_SESSION["user_id"]=$row["Startup_id"];
                               $_SESSION["user_name"]=$row["username"];
							   $_SESSION["companyname"]=$row["Company_Name"];
							   $_SESSION["Company_Desc"]=$row["Company_Desc"];
							   $_SESSION["Token_Name"]=$row["Token_Name"];
							   $_SESSION["Total_Tokens"]=$row["Total_Tokens"];
							   $_SESSION["Token_Price"]=$row["Token_Price"];
							   $_SESSION["Launch_Date"]=$row["Launch_Date"];
							   $_SESSION["Company_Category"]=$row["Company_Category"];
							    $_SESSION["Investor_id"]=$row["Investor_id"];
								 $_SESSION["Fullname"]=$row["Fullname"];
								  $_SESSION["Address1"]=$row["Address1"];
								  $_SESSION["Address2"]=$row["Address2"];
								  $_SESSION["County"]=$row["County"];
								  $_SESSION["Country"]=$row["Country"];
								    $_SESSION["Phone_No"]=$row["Phone_No"];
									$_SESSION["Email"]=$row["Email"];
							   
							   $_SESSION["Type"]=$row["Type"];
							   

							   
							   
header("location:index.php");
}
else
{
echo "your username or password is incorrect";
}

}
     
}
?>