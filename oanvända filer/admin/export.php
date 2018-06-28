<?php
#- Koppla upp till databasen
mysql_connect('localhost', 'marknad', 'lyckebo')
 or die (mysql_error());
mysql_select_db('marknad');
 
$to_text = "löparid;startnummer;förnamn;efternamn;förening;klass;starttid;diplom;antal;";

$fp = fopen($_POST['sokvag'], "a"); 
fwrite($fp, $to_text);

$query = mysql_query("SELECT * FROM anmalda05 WHERE loparid LIKE '$id'");
while($a = mysql_fetch_array($query))
{
  $loparid = $a["loparid"];
  $startnummer = $a["startnr"];
  $fnamn = $a["fnamn"];
  $enamn = $a["enamn"];
  $forening = $a["forening"];
  $klass = $a["klass"];
  $starttid = $a["starttid"];
  $diplom = $a["diplom"];
  $antal = $a["antal"];


$to_text = $loparid.";".$startnummer.";".$fnamn.";".$enamn.";".$forening.";".$klass.";".$starttid.";".$diplom.";".$antal.";";

$fp = fopen($_POST['sokvag'], "a"); 
fwrite($fp, $to_text);
} 
fclose($fp);
?>