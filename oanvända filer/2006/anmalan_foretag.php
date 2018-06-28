<?php

require "include/var.php";

if($_POST['exit'])
{
?>
<script type="text/javascript"> 
window.location.href = 'huvud.html'; 
</script>
<?
}


if($_POST['spara'])
{
#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen 


if (empty($epost))
{
}
else
{
  if (!eregi("^.+\@.+\..+$",$epost))
  {
    echo?> <body bgcolor="#E2C8FB">Ogiltig epost!!</body>
  <? echo("<br>");
   echo("<br>");  
   exit;
  }
} 

if (empty($fnamn1) || empty($fnamn2) || empty($fnamn3)) 
{ 
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i något av förnamnen!!</body>
  <? echo("<br>"); 
  echo("<br>");
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
} 
elseif (empty($enamn1) || empty($enamn2) || empty($enamn3)) 
{ 
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i något av efternamnen!!</body>
  <? echo("<br>"); 
  echo("<br>");
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
} 
elseif (empty($fodelse1) || empty($fodelse2) || empty($fodelse3) || strlen($fodelse1)<4 || strlen($fodelse2)<4 || strlen($fodelse3)<4)
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i något av födelseåren eller angivit felaktigt format!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
} 
elseif ($klass1=="0" || $klass2=="0" || $klass3=="0")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i någon löpares klass!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif ($starttid1 =="" || $starttid2 =="" || $starttid3 =="")
{
  echo?> <body bgcolor="#E2C8FB">Kontrollera klass!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif ($starttid1 =="undefined" || $starttid2 =="undefined" || $starttid3 =="undefined")
{
  echo?> <body bgcolor="#E2C8FB">Kontrollera klass!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif (empty($antal1) || empty($antal2) || empty($antal3) || $antal1=="0" || $antal2=="0" || $antal3=="0")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i antal marknadslopp för någon löpare!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif (empty($adress))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i er postadress!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
  }

elseif (empty($postnummer))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i  ert postnummer!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>"; 
  exit;  
}

elseif (empty($ort))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i er ort!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>"; 
  exit;
}
elseif (empty($land))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i land!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>"; 
  exit;
}

elseif (empty($lag_foretag))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i ert lagnamn!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}


elseif ($diplom == "")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i om ni ska ha diplom!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>"; 
  exit;
}


if(empty($epost))
{
  $dubbel = mysql_query("SELECT * FROM $anmalda WHERE lag_foretag='$lag_foretag'");
  if(mysql_fetch_array($dubbel))
  {
    echo?> <body bgcolor="#E2C8FB">Lagnamnet är upptaget!!</body>
    <? echo("<br>"); 
    echo("<br>");
    echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
    exit; 
  }

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn1', '$enamn1', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse1', '$klass1', '$antal1', '$epost', NOW(), NOW())");

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn2', '$enamn2', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse2', '$klass2', '$antal2', '$epost', NOW(), NOW())");

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn3', '$enamn3', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse3', '$klass3', '$antal3', '$epost', NOW(), NOW())");

sleep(1);
 

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn1' AND enamn LIKE '$enamn1' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse1' AND klass LIKE '$klass1'");
  while($a = mysql_fetch_array($query))
  {
    $id1 = $a["id"];
  }  

sleep(1);

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn2' AND enamn LIKE '$enamn2' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse2' AND klass LIKE '$klass2'");
  while($a = mysql_fetch_array($query))
  {
    $id2 = $a["id"];
  } 

sleep(1); 

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn3' AND enamn LIKE '$enamn3' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse3' AND klass LIKE '$klass3'");
  while($a = mysql_fetch_array($query))
  {
    $id3 = $a["id"];
  }  

sleep(1);

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id1', '$fnamn1', '$enamn1', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse1', '$klass1', '$lag_foretag', '$avgift', '$diplom', '$starttid1', '$antal1', '$epost', 'nej', NOW(), NOW())");

sleep(1);

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id2', '$fnamn2', '$enamn2', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse2', '$klass2', '$lag_foretag', '$avgift', '$diplom', '$starttid2', '$antal2', '$epost', 'nej', NOW(), NOW())");

sleep(1);

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id3', '$fnamn3', '$enamn3', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse3', '$klass3', '$lag_foretag', '$avgift', '$diplom', '$starttid3', '$antal3', '$epost', 'nej', NOW(), NOW())"); 

echo?> <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Vi har mottagit er anmälan!!</br></font>

<?


}

else
{
  $dubbel = mysql_query("SELECT * FROM $anmalda WHERE lag_foretag='$lag_foretag'");
  if(mysql_fetch_array($dubbel))
  {
    echo?> <body bgcolor="#E2C8FB">Lagnamnet är upptaget!!</body>
    <? echo("<br>"); 
    echo("<br>");
    echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
    exit; 
  }

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn1', '$enamn1', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse1', '$klass1', '$antal1', '$epost', NOW(), NOW())");

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn2', '$enamn2', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse2', '$klass2', '$antal2', '$epost', NOW(), NOW())");

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn3', '$enamn3', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse3', '$klass3', '$antal3', '$epost', NOW(), NOW())");

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn1' AND enamn LIKE '$enamn1' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse1' AND klass LIKE '$klass1'");
  while($a = mysql_fetch_array($query))
  {
    $id1 = $a["id"];
  }  

sleep(1);

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn2' AND enamn LIKE '$enamn2' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse2' AND klass LIKE '$klass2'");
  while($a = mysql_fetch_array($query))
  {
    $id2 = $a["id"];
  }  

sleep(1);

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn3' AND enamn LIKE '$enamn3' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse3' AND klass LIKE '$klass3'");
  while($a = mysql_fetch_array($query))
  {
    $id3 = $a["id"];
  }  

sleep(1);

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id1', '$fnamn1', '$enamn1', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse1', '$klass1', '$lag_foretag', '$avgift', '$diplom', '$starttid1', '$antal1', '$epost', 'nej', NOW(), NOW())");

sleep(1);

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id2', '$fnamn2', '$enamn2', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse2', '$klass2', '$lag_foretag', '$avgift', '$diplom', '$starttid2', '$antal2', '$epost', 'nej', NOW(), NOW())");

sleep(1);

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id3', '$fnamn3', '$enamn3', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse3', '$klass3', '$lag_foretag', '$avgift', '$diplom', '$starttid3', '$antal3', '$epost', 'nej', NOW(), NOW())"); 
  
echo?> <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Vi har mottagit din anmälan och skickat ett mail med dina uppgifter!!</br></font>

<?
 
$fnamn1 = $_POST['fnamn1'];
$enamn1 = $_POST['enamn1'];
$klass1 = $_POST['klass1'];
$fodelse1 = $_POST['fodelse1'];

$fnamn2 = $_POST['fnamn2'];
$enamn2 = $_POST['enamn2'];
$klass2 = $_POST['klass2'];
$fodelse2 = $_POST['fodelse2'];

$fnamn3 = $_POST['fnamn3'];
$enamn3 = $_POST['enamn3'];
$klass3 = $_POST['klass3'];
$fodelse3 = $_POST['fodelse3'];

$adress = $_POST['adress'];
$postnummer = $_POST['postnummer'];
$ort = $_POST['ort'];
$land = $_POST['land'];

$avgift =$_POST['avgift'];

if ($diplom == "ja")
{

$message = <<<HTML

<html>
<head>
<title>HTML-mail</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>
  
<body style="text-align: left">
<table width="500" cellpadding="0" cellspacing="0" border="0" style="margin-right: auto; margin-left: auto">
<tr>
  <td>
    Tack för din anmälan till <b>Marknadssloppet 2005</b>!
    <br>
    <br>
    Vi har mottagit din anmälan där du uppgav följande uppgifter:
    <br>
    <br>
    <hr>
    Löpare 1: <b>{$_POST['fnamn1']} {$_POST['enamn1']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass1']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse1']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id1} </b>\r\n
    <br>
    <br>
    <hr>
    Löpare 2: <b>{$_POST['fnamn2']} {$_POST['enamn2']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass2']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse2']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id2} </b>\r\n
    <br>
    <br>
    <hr>
    Löpare 3: <b>{$_POST['fnamn3']} {$_POST['enamn3']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass3']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse3']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id3} </b>\r\n
    <br>
    <br>
    <hr>
    Postadress: <b>{$_POST['adress']}</b>\r\n
    <br>
    Postnummer: <b>{$_POST['postnummer']}</b>\r\n
    <br>
    Ort: <b>{$_POST['ort']}</b>\r\n
    <br>
    Land: <b>{$_POST['land']}</b>\r\n
    <br>
    Förening: <b>{$_POST['forening']}</b>\r\n
    <br>
    <br>
    Lagnamn: <b>{$_POST['lag_foretag']}</b>\r\n
    <br>
    <br>
    Betalningen gör ni genom att sätta in <b>{$_POST['avgift']} kr</b> på pg nr: <b>162 78 46-7</b> senast <b>fredagen den 17 juni.</b>\r\n
    Ange era tre MarknadsloppsID och ert Lagnamn samt Föreningens/Företagets namn som meddelande.\r\n
    <br>
    <br>
    <b> OBS!!!</b>
    Du har även beställt <b>Marknadsloppsdiplom</b>, lägg till <b>90 kr</b> vid inbetalningen för detta.\r\n 
    <br>
    <br>
    <b>Lycka till i loppet önskar Frosta OK!</b>
  </td>
</tr>
</table>
</body>
</html>
HTML;
  
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: php\r\n";
$headers .= "From: Marknadsloppet <anmalan@marknadsloppet.nu>\r\n";
$headers .= "Bcc: anmalan@marknadsloppet.nu\r\n";
$headers .= "Reply-to: anmalan@marknadsloppet.nu\r\n";
$headers .= "Return-path: anmalan@marknadsloppet.nu\r\n"; 
$to = "<$epost>";
$subject = "Anmälan till marknadsloppet";

mail($to , $subject, $message, $headers); 
}

 else if ($diplom == "nej")
 {

   $message = <<<HTML

<html>
<head>
<title>HTML-mail</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>
  
<body style="text-align: left">
<table width="500" cellpadding="0" cellspacing="0" border="0" style="margin-right: auto; margin-left: auto">
<tr>
  <td>
    Tack för din anmälan till <b>Marknadssloppet 2005</b>!
    <br>
    <br>
    Vi har mottagit din anmälan där du uppgav följande uppgifter:
    <br>
    <br>
    <hr>
    Löpare 1: <b>{$_POST['fnamn1']} {$_POST['enamn1']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass1']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse1']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id1} </b>\r\n
    <br>
    <br>
    <hr>
    Löpare 2: <b>{$_POST['fnamn2']} {$_POST['enamn2']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass2']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse2']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id2} </b>\r\n
    <br>
    <br>
    <hr>
    Löpare 3: <b>{$_POST['fnamn3']} {$_POST['enamn3']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass3']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse3']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id3} </b>\r\n
    <br>
    <br>
    <hr>
    Postadress: <b>{$_POST['adress']}</b>\r\n
    <br>
    Postnummer: <b>{$_POST['postnummer']}</b>\r\n
    <br>
    Ort: <b>{$_POST['ort']}</b>\r\n
    <br>
    Land: <b>{$_POST['land']}</b>\r\n
    <br>
    Förening: <b>{$_POST['forening']}</b>\r\n
    <br>
    <br>
    Lagnamn: <b>{$_POST['lag_foretag']}</b>\r\n
    <br>
    <br>
    Betalningen gör ni genom att sätta in <b>{$_POST['avgift']} kr</b> på pg nr: <b>162 78 46-7</b> senast <b>fredagen den 17 juni.</b>\r\n
    Ange era tre MarknadsloppsID och ert Lagnamn samt Föreningens/Företagets namn som meddelande.\r\n
    <br>
    <br>
    <b>Lycka till i loppet önskar Frosta OK!</b>
  </td>
</tr>
</table>
</body>
</html>
HTML;
  
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: php\r\n";
$headers .= "From: Marknadsloppet <anmalan@marknadsloppet.nu>\r\n";
$headers .= "Bcc: anmalan@marknadsloppet.nu\r\n";
$headers .= "Reply-to: anmalan@marknadsloppet.nu\r\n";
$headers .= "Return-path: anmalan@marknadsloppet.nu\r\n"; 
$to = "<$epost>";
$subject = "Anmälan till marknadsloppet";

mail($to , $subject, $message, $headers);
}
     
}  

$adress="";
$postnummer="";
$ort="";
$land="";
$forening="";
$epost="";

}

if($_POST['fler'])
{
#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen 


if (empty($epost))
{
}
else
{
   if (!eregi("^.+\@.+\..+$",$epost))
  {
    echo?> <body bgcolor="#E2C8FB">Ogiltig epost!!</body>
  <? echo("<br>");
   echo("<br>");  
   exit;
  }
} 

if (empty($fnamn1) || empty($fnamn2) || empty($fnamn3)) 
{ 
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i något av förnamnen!!</body>
  <? echo("<br>"); 
  echo("<br>");
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
} 
elseif (empty($enamn1) || empty($enamn2) || empty($enamn3)) 
{ 
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i något av efternamnen!!</body>
  <? echo("<br>"); 
  echo("<br>");
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
} 
elseif (empty($fodelse1) || empty($fodelse2) || empty($fodelse3) || strlen($fodelse1)<4 || strlen($fodelse2)<4 || strlen($fodelse3)<4)
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i något av födelseåren eller angivit felaktigt format!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
} 
elseif ($klass1=="0" || $klass2=="0" || $klass3=="0")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i någon löpares klass!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif ($starttid1 =="" || $starttid2 =="" || $starttid3 =="")
{
  echo?> <body bgcolor="#E2C8FB">Kontrollera klass!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif ($starttid1 =="undefined" || $starttid2 =="undefined" || $starttid3 =="undefined")
{
  echo?> <body bgcolor="#E2C8FB">Kontrollera klass!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif (empty($antal1) || empty($antal2) || empty($antal3) || $antal1=="0" || $antal2=="0" || $antal3=="0")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i antal marknadslopp för någon löpare!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif (empty($adress))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i er postadress!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
  }

elseif (empty($postnummer))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i  ert postnummer!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>"; 
  exit;  
}

elseif (empty($ort))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i er ort!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>"; 
  exit;
}
elseif (empty($land))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i land!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>"; 
  exit;
}

elseif (empty($lag_foretag))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i ert lagnamn!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}


elseif ($diplom == "")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i om ni ska ha diplom!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>"; 
  exit;
}


if(empty($epost))
{
  $dubbel = mysql_query("SELECT * FROM $anmalda WHERE lag_forening='$lag_forening'");
  if(mysql_fetch_array($dubbel))
  {
    echo?> <body bgcolor="#E2C8FB">Lagnamnet är upptaget!!</body>
    <? echo("<br>"); 
    echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
    exit; 
  }

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn1', '$enamn1', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse1', '$klass1', '$antal1', '$epost', NOW(), NOW())");

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn2', '$enamn2', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse2', '$klass2', '$antal2', '$epost', NOW(), NOW())");

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn3', '$enamn3', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse3', '$klass3', '$antal3', '$epost', NOW(), NOW())");

sleep(1);
 

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn1' AND enamn LIKE '$enamn1' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse1' AND klass LIKE '$klass1'");
  while($a = mysql_fetch_array($query))
  {
    $id1 = $a["id"];
  }  

sleep(1);

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn2' AND enamn LIKE '$enamn2' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse2' AND klass LIKE '$klass2'");
  while($a = mysql_fetch_array($query))
  {
    $id2 = $a["id"];
  }  

sleep(1);

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn3' AND enamn LIKE '$enamn3' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse3' AND klass LIKE '$klass3'");
  while($a = mysql_fetch_array($query))
  {
    $id3 = $a["id"];
  } 

sleep(1); 

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id1', '$fnamn1', '$enamn1', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse1', '$klass1', '$lag_foretag', '$avgift', '$diplom', '$starttid1', '$antal1', '$epost', 'nej', NOW(), NOW())");

sleep(1); 

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id2', '$fnamn2', '$enamn2', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse2', '$klass2', '$lag_foretag', '$avgift', '$diplom', '$starttid2', '$antal2', '$epost', 'nej', NOW(), NOW())");

sleep(1); 

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id3', '$fnamn3', '$enamn3', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse3', '$klass3', '$lag_foretag', '$avgift', '$diplom', '$starttid3', '$antal3', '$epost', 'nej', NOW(), NOW())"); 

echo?> <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Vi har mottagit er anmälan!!</br></font>
<?

}

else
{
 $dubbel = mysql_query("SELECT * FROM $anmalda WHERE lag_foretag='$lag_foretag'");
  if(mysql_fetch_array($dubbel))
  {
    echo?> <body bgcolor="#E2C8FB">Lagnamnet är upptaget!!</body>
    <? echo("<br>"); 
    echo("<br>"); 
    echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
    exit; 
  }

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn1', '$enamn1', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse1', '$klass1', '$antal1', '$epost', NOW(), NOW())");

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn2', '$enamn2', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse2', '$klass2', '$antal2', '$epost', NOW(), NOW())");

mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn3', '$enamn3', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse3', '$klass3', '$antal3', '$epost', NOW(), NOW())");

sleep(1);
 

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn1' AND enamn LIKE '$enamn1' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse1' AND klass LIKE '$klass1'");
  while($a = mysql_fetch_array($query))
  {
    $id1 = $a["id"];
  }  

sleep(1);

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn2' AND enamn LIKE '$enamn2' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse2' AND klass LIKE '$klass2'");
  while($a = mysql_fetch_array($query))
  {
    $id2 = $a["id"];
  }  

sleep(1);

$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fnamn3' AND enamn LIKE '$enamn3' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse3' AND klass LIKE '$klass3'");
  while($a = mysql_fetch_array($query))
  {
    $id3 = $a["id"];
  }  

sleep(1);

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id1', '$fnamn1', '$enamn1', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse1', '$klass1', '$lag_foretag', '$avgift', '$diplom', '$starttid1', '$antal1', '$epost', 'nej', NOW(), NOW())");

sleep(1);

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id2', '$fnamn2', '$enamn2', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse2', '$klass2', '$lag_foretag', '$avgift', '$diplom', '$starttid2', '$antal2', '$epost', 'nej', NOW(), NOW())");

sleep(1);

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, forening, fodelse, klass, lag_foretag, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id3', '$fnamn3', '$enamn3', '$adress', '$postnummer', '$ort', '$land', '$forening', '$fodelse3', '$klass3', '$lag_foretag', '$avgift', '$diplom', '$starttid3', '$antal3', '$epost', 'nej', NOW(), NOW())"); 
  
echo?> <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Vi har mottagit din anmälan och skickat ett mail med dina uppgifter!!</br></font>

<?
 
$fnamn1 = $_POST['fnamn1'];
$enamn1 = $_POST['enamn1'];
$klass1 = $_POST['klass1'];
$fodelse1 = $_POST['fodelse1'];

$fnamn2 = $_POST['fnamn2'];
$enamn2 = $_POST['enamn2'];
$klass2 = $_POST['klass2'];
$fodelse2 = $_POST['fodelse2'];

$fnamn3 = $_POST['fnamn3'];
$enamn3 = $_POST['enamn3'];
$klass3 = $_POST['klass3'];
$fodelse3 = $_POST['fodelse3'];

$adress = $_POST['adress'];
$postnummer = $_POST['postnummer'];
$ort = $_POST['ort'];
$land = $_POST['land'];

$avgift =$_POST['avgift'];

if ($diplom == "ja")
{

$message = <<<HTML

<html>
<head>
<title>HTML-mail</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>
  
<body style="text-align: left">
<table width="500" cellpadding="0" cellspacing="0" border="0" style="margin-right: auto; margin-left: auto">
<tr>
  <td>
    Tack för din anmälan till <b>Marknadssloppet 2005</b>!
    <br>
    <br>
    Vi har mottagit din anmälan där du uppgav följande uppgifter:
    <br>
    <br>
    <hr>
    Löpare 1: <b>{$_POST['fnamn1']} {$_POST['enamn1']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass1']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse1']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id1} </b>\r\n
    <br>
    <br>
    <hr>
    Löpare 2: <b>{$_POST['fnamn2']} {$_POST['enamn2']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass2']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse2']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id2} </b>\r\n
    <br>
    <br>
    <hr>
    Löpare 3: <b>{$_POST['fnamn3']} {$_POST['enamn3']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass3']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse3']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id3} </b>\r\n
    <br>
    <br>
    <hr>
    Postadress: <b>{$_POST['adress']}</b>\r\n
    <br>
    Postnummer: <b>{$_POST['postnummer']}</b>\r\n
    <br>
    Ort: <b>{$_POST['ort']}</b>\r\n
    <br>
    Land: <b>{$_POST['land']}</b>\r\n
    <br>
    Förening: <b>{$_POST['forening']}</b>\r\n
    <br>
    <br>
    Lagnamn: <b>{$_POST['lag_foretag']}</b>\r\n
    <br>
    <br>
    Betalningen gör ni genom att sätta in <b>{$_POST['avgift']} kr</b> på pg nr: <b>162 78 46-7</b> senast <b>fredagen den 17 juni.</b>\r\n
    Ange era tre MarknadsloppsID och ert Lagnamn samt Föreningens/Företagets namn som meddelande.\r\n
    <br>
    <br>
    <b> OBS!!!</b>
    Du har även beställt <b>Marknadsloppsdiplom</b>, lägg till <b>90 kr</b> vid inbetalningen för detta.\r\n 
    <br>
    <br>
    <b>Lycka till i loppet önskar Frosta OK!</b>
  </td>
</tr>
</table>
</body>
</html>
HTML;
  
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: php\r\n";
$headers .= "From: Marknadsloppet <anmalan@marknadsloppet.nu>\r\n";
$headers .= "Bcc: anmalan@marknadsloppet.nu\r\n";
$headers .= "Reply-to: anmalan@marknadsloppet.nu\r\n";
$headers .= "Return-path: anmalan@marknadsloppet.nu\r\n"; 
$to = "<$epost>";
$subject = "Anmälan till marknadsloppet";

mail($to , $subject, $message, $headers); 
}

 else if ($diplom == "nej")
 {

   $message = <<<HTML

<html>
<head>
<title>HTML-mail</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>
  
<body style="text-align: left">
<table width="500" cellpadding="0" cellspacing="0" border="0" style="margin-right: auto; margin-left: auto">
<tr>
  <td>
    Tack för din anmälan till <b>Marknadssloppet 2005</b>!
    <br>
    <br>
    Vi har mottagit din anmälan där du uppgav följande uppgifter:
    <br>
    <br>
    <hr>
    Löpare 1: <b>{$_POST['fnamn1']} {$_POST['enamn1']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass1']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse1']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id1} </b>\r\n
    <br>
    <br>
    <hr>
    Löpare 2: <b>{$_POST['fnamn2']} {$_POST['enamn2']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass2']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse2']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id2} </b>\r\n
    <br>
    <br>
    <hr>
    Löpare 3: <b>{$_POST['fnamn3']} {$_POST['enamn3']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass3']}</b>\r\n
    <br>
    <br>
    Födelseår: <b>{$_POST['fodelse3']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Marknadslopps-id är:  <b>{$id3} </b>\r\n
    <br>
    <br>
    <hr>
    Postadress: <b>{$_POST['adress']}</b>\r\n
    <br>
    Postnummer: <b>{$_POST['postnummer']}</b>\r\n
    <br>
    Ort: <b>{$_POST['ort']}</b>\r\n
    <br>
    Land: <b>{$_POST['land']}</b>\r\n
    <br>
    Förening: <b>{$_POST['forening']}</b>\r\n
    <br>
    <br>
    Lagnamn: <b>{$_POST['lag_foretag']}</b>\r\n
    <br>
    <br>
    Betalningen gör ni genom att sätta in <b>{$_POST['avgift']} kr</b> på pg nr: <b>162 78 46-7</b> senast <b>fredagen den 17 juni.</b>\r\n
    Ange era tre MarknadsloppsID och ert Lagnamn samt Föreningens/Företagets namn som meddelande.\r\n
    <br>
    <br>
    <b>Lycka till i loppet önskar Frosta OK!</b>
  </td>
</tr>
</table>
</body>
</html>
HTML;
  
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: php\r\n";
$headers .= "From: Marknadsloppet <anmalan@marknadsloppet.nu>\r\n";
$headers .= "Bcc: anmalan@marknadsloppet.nu\r\n";
$headers .= "Reply-to: anmalan@marknadsloppet.nu\r\n";
$headers .= "Return-path: anmalan@marknadsloppet.nu\r\n"; 
$to = "<$epost>";
$subject = "Anmälan till marknadsloppet";

mail($to , $subject, $message, $headers);
}

}
}
   
?>

<HTML>
<HEAD>
<META http-equiv="Expires" content="0">
<TITLE>Marknadsloppet 2005 - anm&auml;lan</TITLE>

<script language="JavaScript">
<!--

function SymError()
{
  return true;
}

window.onerror = SymError;

var SymRealWinOpen = window.open;

function SymWinOpen(url, name, attributes)
{
  return (new Object());
}

window.open = SymWinOpen;

//-->
</script>
</HEAD>

<BODY bgcolor="#E2C8FB" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="10" BORDER="0"  ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<form ACTION="<?php echo $PHP_SELF ?>" METHOD="post" id=form1 name=form1>
<table WIDTH="550" CELLSPACING="0" CELLPADDING="0" BORDER="0">
<tr height="30">
</tr>	
<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Företagsutmaningen:</b></font>
   <br>
   <br>
  </td>	
</tr>

<tr>
  <td colspan ="5">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>
     <hr>
     <u>Instruktioner:</u>
     <br>
     <br>
     Företag som registrerar flera lag trycker på "Registrera fler lag många" för samtliga (även för det sista laget)  och trycker därefter "Avsluta" när man är klar.
     <br>
     <br>
     Anmäler man bara 1 lag trycker man på "Registrera ett lag" och därefter "Avsluta"
   </b></font>
   <br>
  <br>
<tr>
  <td colspan="5">
    <hr>
  </td>
</tr>

<tr>
  <td WIDTH="340">
    <table CELLSPACING="2" CELLPADDING="3" BORDER="0" WIDTH="100%">
    <tr>
      <td colspan="2"><font face="verdana" size="-1"><b>Löpare 1</b></td>
    </tr>
    <tr>
      <td><font face="verdana" size="-2">förnamn (t.ex. Anders)</td>
      <td><input TYPE="Text" NAME="fnamn1" value="" SIZE="15" MAXLENGTH="15">*</td>
    
      <td><font face="verdana" size="-2">efternamn (t.ex. Andersson)</td>
      <td><input TYPE="Text" NAME="enamn1" value="" SIZE="15" MAXLENGTH="20">*</td>
    
      <td><font face="verdana" size="-2">födelseår (t.ex. 1980)</td>
      <td><input TYPE="Text" NAME="fodelse1" SIZE="4" MAXLENGTH="4" VALUE="">*</td>

      <td><font face="verdana" size="-2"><b>Välj din klass:</b></td>
      <td>    
        <table border = "0">
        <tr>  
          <td><? echo '<select name="klass1" onChange="this.form.starttid1.value=this.options[this.selectedIndex].starttid">'; 
                 echo '<option value="">--- Välj här ---</option>'; 

                 #- Koppla upp till databasen
                 include "include/conn.php"; // Databasanslutningen 
                  
                 $sql = "SELECT klass, value, starttid FROM klasser_lag";
                 $result = mysql_query($sql);

                 while ($row = mysql_fetch_array($result))
                 {
                  $value = $row['value'];
                  $klass = $row['klass'];
                  $starttid = $row['starttid'];
                
                   echo "<option value='$value' starttid = '$starttid'>$klass</option>";
 
                }
                
              
            
                 echo '</select>'
               
            ?>
          </td>
          <td>*</td>

          <td><input TYPE="hidden" NAME="starttid1" SIZE="4" MAXLENGTH="4" VALUE="" readonly></td>
    
     </tr>
        </table>
      </td>   

      <td><font face="verdana" size="-2">antal marknadslopp inklusive detta</td>
      <td><input TYPE="Text" NAME="antal1" SIZE="4" MAXLENGTH="4" VALUE="">*</td>
      </tr>

      <tr>
       <td colspan="10"><hr></td>
      </tr>

      <tr>
      <td colspan="2"><font face="verdana" size="-1"><b>Löpare 2</b></td>
      </tr>
    <tr>
      
      <td><font face="verdana" size="-2">förnamn (t.ex. Anders)</td>
      <td><input TYPE="Text" NAME="fnamn2" value="" SIZE="15" MAXLENGTH="15">*</td>
    
      <td><font face="verdana" size="-2">efternamn (t.ex. Andersson)</td>
      <td><input TYPE="Text" NAME="enamn2" value="" SIZE="15" MAXLENGTH="20">*</td>
    
      <td><font face="verdana" size="-2">födelseår (t.ex. 1980)</td>
      <td><input TYPE="Text" NAME="fodelse2" SIZE="4" MAXLENGTH="4" VALUE="">*</td>

      <td><font face="verdana" size="-2"><b>Välj din klass:</b></td>
      <td>    
        <table border = "0">
        <tr>  
          <td><? echo '<select name="klass2" onChange="this.form.starttid2.value=this.options[this.selectedIndex].starttid">'; 
                 echo '<option value="">--- Välj här ---</option>'; 

                 #- Koppla upp till databasen
                 include "include/conn.php"; // Databasanslutningen 
                  
                 $sql = "SELECT klass, value, starttid FROM klasser_lag";
                 $result = mysql_query($sql);

                 while ($row = mysql_fetch_array($result))
                 {
                  $value = $row['value'];
                  $klass = $row['klass'];
                  $starttid = $row['starttid'];
                
                   echo "<option value='$value' starttid = '$starttid'>$klass</option>";
 
                }
                
              
            
                 echo '</select>'
               
            ?>
          </td>
          <td>*</td>

          <td><input TYPE="hidden" NAME="starttid2" SIZE="4" MAXLENGTH="4" VALUE="" readonly></td>
   
       </tr>
        </table>
      </td>   

      <td><font face="verdana" size="-2">antal marknadslopp inklusive detta</td>
      <td><input TYPE="Text" NAME="antal2" SIZE="4" MAXLENGTH="4" VALUE="">*</td>
      </tr>

    <tr>
       <td colspan="10"><hr></td>
    </tr>
  
    <tr>
      <td colspan="2"><font face="verdana" size="-1"><b>Löpare 3</b></td>
      </tr>

    <tr>
      <td><font face="verdana" size="-2">förnamn (t.ex. Anders)</td>
      <td><input TYPE="Text" NAME="fnamn3" value="" SIZE="15" MAXLENGTH="15">*</td>
    
      <td><font face="verdana" size="-2">efternamn (t.ex. Andersson)</td>
      <td><input TYPE="Text" NAME="enamn3" value="" SIZE="15" MAXLENGTH="20">*</td>
    
      <td><font face="verdana" size="-2">födelseår (t.ex. 1980)</td>
      <td><input TYPE="Text" NAME="fodelse3" SIZE="4" MAXLENGTH="4" VALUE="">*</td>

      <td><font face="verdana" size="-2"><b>Välj din klass:</b></td>
      <td>    
        <table border = "0">
        <tr>  
          <td><? echo '<select name="klass3" onChange="this.form.starttid3.value=this.options[this.selectedIndex].starttid">'; 
                 echo '<option value="">--- Välj här ---</option>'; 

                 #- Koppla upp till databasen
                 include "include/conn.php"; // Databasanslutningen 
                  
                 $sql = "SELECT klass, value, starttid FROM klasser_lag";
                 $result = mysql_query($sql);

                 while ($row = mysql_fetch_array($result))
                 {
                  $value = $row['value'];
                  $klass = $row['klass'];
                  $starttid = $row['starttid'];
                
                   echo "<option value='$value' starttid = '$starttid'>$klass</option>";
 
                }
                
              
            
                 echo '</select>'
               
            ?>
          </td>
          <td>*</td>

         <td><input TYPE="hidden" NAME="starttid3" SIZE="4" MAXLENGTH="4" VALUE="" readonly></td>
  
        </tr>
        </table>
      </td>   

      <td><font face="verdana" size="-2">antal marknadslopp inklusive detta</td>
      <td><input TYPE="Text" NAME="antal3" SIZE="4" MAXLENGTH="4" VALUE="">*</td>
      </tr>

     <tr>
       <td colspan="10"><hr></td>
     </tr>

    </table>
    <table CELLSPACING="6" CELLPADDING="0" BORDER="0" WIDTH="100%">				
    <tr>
      <td><font face="verdana" size="-2">postadress (t.ex. Alvägen 1)</td>
      <td><input TYPE="Text" NAME="adress" SIZE="30" MAXLENGTH="30" VALUE="<?=$adress?>">*</td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2">postnummer (t.ex. 12345)</td>
      <td><input TYPE="Text" NAME="postnummer" SIZE="5" MAXLENGTH="5" VALUE="<?=$postnummer?>">*</td>
    </tr>
	
    <tr>
      <td><font face="verdana" size="-2">ort (t.ex. Löparby)</td>
      <td><input TYPE="Text" NAME="ort" SIZE="30" MAXLENGTH="30" VALUE="<?=$ort?>">*</td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2">land (t.ex. Sverige)</td>
      <td><input TYPE="Text" NAME="land" SIZE="30" MAXLENGTH="30" VALUE="Sverige">*</td>
    </tr>

    <tr>
      <td><font face="verdana" size="-2">företag/förening (t.ex. Löpar IF)</td>
      <td><input TYPE="Text" NAME="forening" SIZE="30" MAXLENGTH="30" VALUE="<?=$forening?>"></td>
    </tr>

    <tr>
      <td><font face="verdana" size="-2">lagnamn (t.ex. Hörby 1)</td>
      <td><input TYPE="Text" NAME="lag_foretag" SIZE="30" MAXLENGTH="30" VALUE="">*</td>
    </tr>

        <tr>
      <td><font face="verdana" size="-2">e-postadress <br> (behövs för att få bekräftelse av anmälan via e-post och om du vill ändra något)
   </td>
      <td><input TYPE="Text" NAME="epost" SIZE="30" MAXLENGTH="70" VALUE="<?=$epost?>"></td>
    </tr>
       					
    <tr>
         <td><font face="verdana" size="-2">avgift</td>
         <td><input TYPE="Text" NAME="avgift" SIZE="4" MAXLENGTH="4" VALUE="250" readonly> kr</td>
   </tr>

    <tr>
      <td><font face="verdana" size="-2">Marknadsloppsdiplom i färg med namn, klass, sträcka, tid  30 kr/st (totalt 90 kr för laget)</td>
      <td>
	<table>
	<tr>
	  <td><font face="verdana" size="-2">ja: </font></td>
	  <td><input TYPE="radio" NAME="diplom"  VALUE="ja" <? if ($diplom == "ja") echo(" checked"); ?>></td>
	</tr>
	<tr>
	  <td><font face="verdana" size="-2">nej: </font></td>
	  <td><input TYPE="radio" NAME="diplom"  VALUE="nej" <? if ($diplom == "nej") echo(" checked"); ?>></td>
	</tr>
	</table>
      </td>
    </tr>
    
    <tr>
      <td COLSPAN="2" NOWRAP>* = obligatorisk uppgift</td>
    </tr>

    <tr>
      <td><input TYPE="submit" value="» registrera fler lag" name="fler"></td>
      <td><input TYPE="submit" value="» registrera ett lag" name="spara"></td>
    </tr>

    <tr>
      <td><input TYPE="submit" value="» avsluta" name="exit"></td>
    </tr>

    
    </table>
  </td>
</tr>
</table>
</form>

<tr>
      
    <td>
      <form ACTION="anmalan_lag.php" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="<< tillbaka">
      </form>
    </td>
      
    </tr>

</TD>
</TR>
</TABLE>
</BODY>
</HTML>

<script language="JavaScript">
<!--
var SymRealOnLoad;
var SymRealOnUnload;

function SymOnUnload()
{
  window.open = SymWinOpen;
  if(SymRealOnUnload != null)
     SymRealOnUnload();
}

function SymOnLoad()
{
  if(SymRealOnLoad != null)
     SymRealOnLoad();
  window.open = SymRealWinOpen;
  SymRealOnUnload = window.onunload;
  window.onunload = SymOnUnload;
}

SymRealOnLoad = window.onload;
window.onload = SymOnLoad;

//-->
</script>


     