

<?php

$link = mysql_connect('localhost', 'root', 'hhCEiY41iknJ'); 
mysql_select_db('icohub', $link);
   
?>

<?php

$sql    = 'SELECT Name FROM investors';
$result = mysql_query($sql, $link);


while ($row = mysql_fetch_assoc($result)) {
    echo $row['Name'];
}

?>
