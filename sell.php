<?php 
$server = "localhost";
		$user = "root";
		$password = "hhCEiY41iknJ";
		$dbname = "icohub";
		
		
$investment_id = $_GET ['id'];
		$conn = mysql_connect($server, $user, $password);
		
		$SQL = "DELETE FROM Investments where Investment_id = '$investment_id'";
			
		
			mysql_select_db($dbname);
			$result = mysql_query($SQL, $conn);
			
			if(mysql_query($conn, $SQL))
				 header("location:investorProfile.php");
			else
			 header("location:investorProfile.php");
		
		

?>