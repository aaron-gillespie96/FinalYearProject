<?php
//THIS IS INDEX.PHP PAGE
//connect to database.db name is images
        mysql_connect("localhost", "root", "hhCEiY41iknJ") OR DIE (mysql_error());
        mysql_select_db ("icohub") OR DIE ("Unable to select db".mysql_error());
		 @session_start();
		$id =   $_SESSION["user_id"];
//to retrive send the page to another page
if(isset($_POST['retrive']))
{
    header("location:search.php");

}

//to upload
if(isset($_POST['submit']))
{
if(isset($_FILES['image'])) {
        $name=$_POST['image_name'];
        $email=$_POST['mail'];
        $fp=addslashes(file_get_contents($_FILES['image']['tmp_name'])); //will store the image to fp
        }
                $sql = " Update Startup set image = '{$fp}' where Startup_id= '$id'";
                // our sql query
                            mysql_query($sql) or die("Error in Query insert: " . mysql_error());
							header("location:startupDetails.php");
} 
?>
