<?php



function getID($username){
	$q = mysql_query("SELECT Company_Name FROM Startup WHERE username = $username");
	while ($r = mysql_fetch_assoc($q)){
		return $r['Company_Name'];
	} r=
}

?>