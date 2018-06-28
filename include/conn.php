<?php 
 
// Byt ut mot dina inloggningsuppgifter och databas 
$mysql_server = "localhost"; 
$mysql_user = "marknad"; 
$mysql_password = "lyckebo"; 
$mysql_database = "marknad"; 
 
$conn = mysql_connect($mysql_server, $mysql_user, $mysql_password); 
mysql_select_db($mysql_database, $conn); 
 
/* 
   Se till att det inte finns några dolda tecken, typ radbyte 
   eller mellanslag, efter den avslutande PHP-taggen !!! 
*/ 
?>