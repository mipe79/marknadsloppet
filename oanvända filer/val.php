<?php
$year = (int) date("Y", mktime()); // "Detta" år
$dag1 = mktime(9,0,0, 5, 1, $year);  // Starttid
$dag2 = mktime(1,0,0, 6, 18, $year);  // Sluttid
 
$now = mktime(); // Nu är det ....
 
if( ($dag1<=$now) & ($now<=$dag2) )
   header("Location: ny_reg.php");
else
   header("Location: avstangd.php");
?>


