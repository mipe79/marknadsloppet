<?php

if($_POST['exit'])
{
?>
<script type="text/javascript"> 
alert('Tack f�r din anm�lan!'); 
window.location.href = 'index3.html'; 
</script>
<?
}


if($_POST['spara'])
{
#- Koppla upp till databasen
mysql_connect('localhost', 'marknad', 'lyckebo')
 or die (mysql_error());
mysql_select_db('marknad');

$adresstyp=$_POST['adresstyp'];

if (empty($forening))
{
}
else
{
  if (strlen($forening)<2)
  {
    echo("Kontrollera f�rening");
    exit;
  }
}

if (empty($epost))
{
}
else
{
  if (!eregi("^.+\@.+\..+$",$epost))
  {
    echo("Ogiltlig e-postadress!");
    exit;
  }
}

if (strlen($fnamn)<2)
{
  echo("Du gl�mde skriva ditt f�rnamn!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($enamn)<2)
{
  echo("Du gl�mde skriva ditt efternamn!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($adress)<5)
{
  echo("Du gl�mde skriva din postadress!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($postnummer)<>5)
{
  echo("Du gl�mde skriva ditt postnummer!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($ort)<2)
{
  echo("Du gl�mde skriva din ort!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($land)<2)
{
  echo("Du gl�mde fylla i ditt land!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($fodelse)<4)
{
  echo("Du gl�mde skriva in ditt f�delse�r!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif ($klass=="0")
{
  echo("Du gl�mde fylla i din klass!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}

elseif ($adresstyp == "")
{
  echo("Du gl�mde fylla i din adresstyp!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}

elseif ($diplom == "")
{
  echo("Du gl�mde fylla i om du ska ha diplom!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}

elseif (strlen($antal)<1)
{
  echo("Du gl�mde skriva in antal marknadslopp!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}

if(empty($epost))
{
  $dubbel = mysql_query("SELECT * FROM lopare WHERE fnamn='$fnamn' AND enamn='$enamn' AND adress='$adress' AND postnummer='$postnummer' AND ort='$ort' AND fodelse='$fodelse'");
  if(mysql_fetch_array($dubbel))
  {
    echo("Du finns redan registrerad!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
  }

mysql_query("INSERT INTO lopare (id, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$antal', '$epost', NOW(), NOW())");

sleep(7);
 

$query = mysql_query("SELECT * FROM lopare WHERE fnamn LIKE '$fnamn' AND enamn LIKE '$enamn' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse' AND klass LIKE '$klass'");
  while($a = mysql_fetch_array($query))
  {
    $id = $a["id"];
  }  

mysql_query("INSERT INTO anmalda05 (loparid, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$avgift', '$diplom', '$starttid', '$antal', '$epost', 'nej', NOW(), NOW())");
 

echo?> <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Vi har mottagit din anm�lan!!</br></font>

<?


}

else
{
  $dubbel = mysql_query("SELECT * FROM lopare WHERE fnamn='$fnamn' AND enamn='$enamn' AND adress='$adress' AND postnummer='$postnummer' AND ort='$ort' AND fodelse='$fodelse'");
  if(mysql_fetch_array($dubbel))
  {
    echo("Du finns redan registrerad!");?>
    <br>
    <br>
    <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
    <?exit;
  }
 
mysql_query("INSERT INTO lopare (id, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$antal', '$epost', NOW(), NOW())");
 

sleep(7);

$query = mysql_query("SELECT * FROM lopare WHERE fnamn LIKE '$fnamn' AND enamn LIKE '$enamn' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse' AND klass LIKE '$klass'");
  while($a = mysql_fetch_array($query))
  {
    $id = $a["id"];
  } 

mysql_query("INSERT INTO anmalda05 (loparid, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$avgift', '$diplom', '$starttid', '$antal', '$epost', 'nej', NOW(), NOW())");
 
echo?> <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Vi har mottagit din anm�lan och skickat ett mail med dina uppgifter!!</br></font>

<?
 
$fnamn = $_POST['fnamn'];
$enamn = $_POST['enamn'];
$adress = $_POST['adress'];
$postnummer = $_POST['postnummer'];
$ort = $_POST['ort'];
$land = $_POST['land'];
$klass = $_POST['klass'];
$fodelse = $_POST['fodelse'];
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
    Tack f�r din anm�lan till <b>Marknadssloppet 2005</b>!
    <br>
    <br>
    Vi har mottagit din anm�lan d�r du uppgav f�ljande uppgifter:
    <br>
    <br>
    Namn: <b>{$_POST['fnamn']} {$_POST['enamn']}</b>\r\n
    <br>
    Postadress: <b>{$_POST['adress']}</b>\r\n
    <br>
    Postnummer: <b>{$_POST['postnummer']}</b>\r\n
    <br>
    Ort: <b>{$_POST['ort']}</b>\r\n
    <br>
    Land: <b>{$_POST['land']}</b>\r\n
    <br>
    F�rening: <b>{$_POST['forening']}</b>\r\n
    <br>
    F�delse�r: <b>{$_POST['fodelse']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du anv�nda n�r du vill anm�la dig till
    kommande �r och g� in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Ditt marknadslopps-id �r:  <b>{$id} </b>\r\n
    <br>
    <br>
    Betalningen g�r du genom att s�tta in <b>{$_POST['avgift']} kr</b> p� pg nr: <b>162 78 46-7</b> senast <b>fredagen den 18 juni.</b>\r\n
    Ange ditt marknadsloppsid som meddelande.\r\n
    <br>
    <br>
    <b> OBS!!!</b>
    Du har �ven best�llt <b>Marknadsloppsdiplom</b>, l�gg till <b>30 kr</b> vid inbetalningen f�r detta.\r\n 
    <br>
    <br>
    <b>Lycka till i loppet �nskar Frosta OK!</b>
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
$headers .= "Reply-to: anmalan@marknadsloppet.nu\r\n";
$headers .= "Return-path: anmalan@marknadsloppet.nu\r\n"; 
$to = "<$epost>";
$subject = "Anm�lan till marknadsloppet";

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
    Tack f�r din anm�lan till <b>Marknadssloppet 2005</b>!
    <br>
    <br>
    Vi har mottagit din anm�lan d�r du uppgav f�ljande uppgifter:
    <br>
    <br>
    Namn: <b>{$_POST['fnamn']} {$_POST['enamn']}</b>\r\n
    <br>
    Postadress: <b>{$_POST['adress']}</b>\r\n
    <br>
    Postnummer: <b>{$_POST['postnummer']}</b>\r\n
    <br>
    Ort: <b>{$_POST['ort']}</b>\r\n
    <br>
    Land: <b>{$_POST['land']}</b>\r\n
    <br>
    F�rening: <b>{$_POST['forening']}</b>\r\n
    <br>
    F�delse�r: <b>{$_POST['fodelse']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du anv�nda n�r du vill anm�la dig till
    kommande �r och g� in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Ditt marknadslopps-id �r:  <b>{$id} </b>\r\n
    <br>
    <br>
    Betalningen g�r du genom att s�tta in <b>{$_POST['avgift']} kr</b> p� pg nr: <b>162 78 46-7</b> senast <b>fredagen den 18 juni.</b>\r\n
    Ange ditt marknadsloppsid som meddelande.\r\n
    <br>
    <br>
    <b>Lycka till i loppet �nskar Frosta OK!</b>
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
$headers .= "Reply-to: anmalan@marknadsloppet.nu\r\n";
$headers .= "Return-path: anmalan@marknadsloppet.nu\r\n"; 
$to = "<$epost>";
$subject = "Anm�lan till marknadsloppet";

mail($to , $subject, $message, $headers);
}
     
}  

$adress="";
$postnummer="";
$ort="";
$land="";
$forening="";
$ansluten="";
$epost="";


}

if($_POST['fler'])
{
#- Koppla upp till databasen
mysql_connect('localhost', 'marknad', 'lyckebo')
 or die (mysql_error());
mysql_select_db('marknad');

$adresstyp=$_POST['adresstyp'];

if (empty($forening))
{
}
else
{
  if (strlen($forening)<2)
  {
    echo("Kontrollera f�rening");
    exit;
  }
}

if (empty($epost))
{
}
else
{
  if (!eregi("^.+\@.+\..+$",$epost))
  {
    echo("Ogiltlig e-postadress!");
    exit;
  }
}

if (strlen($fnamn)<2)
{
  echo("Du gl�mde skriva ditt f�rnamn!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($enamn)<2)
{
  echo("Du gl�mde skriva ditt efternamn!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($adress)<5)
{
  echo("Du gl�mde skriva din postadress!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($postnummer)<>5)
{
  echo("Du gl�mde skriva ditt postnummer!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($ort)<2)
{
  echo("Du gl�mde skriva din ort!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($land)<2)
{
  echo("Du gl�mde fylla i ditt land!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif (strlen($fodelse)<4)
{
  echo("Du gl�mde skriva in ditt f�delse�r!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}
elseif ($klass=="0")
{
  echo("Du gl�mde fylla i din klass!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}

elseif ($adresstyp == "")
{
  echo("Du gl�mde fylla i din adresstyp!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}

elseif ($diplom == "")
{
  echo("Du gl�mde fylla i om du ska ha diplom!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}

elseif (strlen($antal)<1)
{
  echo("Du gl�mde skriva in antal marknadslopp!");?>
  <br>
  <br>
  <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
  <?exit;
}


if(empty($epost))
{
  $dubbel = mysql_query("SELECT * FROM lopare WHERE fnamn='$fnamn' AND enamn='$enamn' AND adress='$adress' AND postnummer='$postnummer' AND ort='$ort' AND fodelse='$fodelse'");
  if(mysql_fetch_array($dubbel))
  {
    echo("Du finns redan registrerad!");?>
    <br>
    <br>
    <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
    <?exit;
  }

mysql_query("INSERT INTO lopare (id, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$antal', '$epost', NOW(), NOW())");

sleep(7);


$query = mysql_query("SELECT * FROM lopare WHERE fnamn LIKE '$fnamn' AND enamn LIKE '$enamn' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse' AND klass LIKE '$klass'");
  while($a = mysql_fetch_array($query))
  {
    $id = $a["id"];
  }  

mysql_query("INSERT INTO anmalda05 (loparid, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$avgift', '$diplom', '$starttid', '$antal', '$epost', 'nej', NOW(), NOW())");
 
echo?> <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Vi har mottagit din anm�lan!!</br></font>

<?

}

else
{
  $dubbel = mysql_query("SELECT * FROM lopare WHERE fnamn='$fnamn' AND enamn='$enamn' AND adress='$adress' AND postnummer='$postnummer' AND ort='$ort' AND fodelse='$fodelse'");
  if(mysql_fetch_array($dubbel))
  {
    echo("Du finns redan registrerad!");?>
    <br>
    <br>
    <a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
    <?exit;
  }
 
mysql_query("INSERT INTO lopare (id, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$antal', '$epost', NOW(), NOW())");
 
sleep(7);



$query = mysql_query("SELECT * FROM lopare WHERE fnamn LIKE '$fnamn' AND enamn LIKE '$enamn' AND adress LIKE '$adress' AND postnummer LIKE '$postnummer' AND ort LIKE '$ort' AND fodelse LIKE '$fodelse' AND klass LIKE '$klass'");
  while($a = mysql_fetch_array($query))
  {
    $id = $a["id"];
  } 

mysql_query("INSERT INTO anmalda05 (loparid, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$avgift', '$diplom', '$starttid', '$antal', '$epost', 'nej', NOW(), NOW())");
 
echo?> <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Vi har mottagit din anm�lan och skickat ett mail med dina uppgifter!!</br></font>
<?
 
$fnamn = $_POST['fnamn'];
$enamn = $_POST['enamn'];
$adress = $_POST['adress'];
$postnummer = $_POST['postnummer'];
$ort = $_POST['ort'];
$land = $_POST['land'];
$klass = $_POST['klass'];
$fodelse = $_POST['fodelse'];
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
    Tack f�r din anm�lan till <b>Marknadssloppet 2005</b>!
    <br>
    <br>
    Vi har mottagit din anm�lan d�r du uppgav f�ljande uppgifter:
    <br>
    <br>
    Namn: <b>{$_POST['fnamn']} {$_POST['enamn']}</b>\r\n
    <br>
    Postadress: <b>{$_POST['adress']}</b>\r\n
    <br>
    Postnummer: <b>{$_POST['postnummer']}</b>\r\n
    <br>
    Ort: <b>{$_POST['ort']}</b>\r\n
    <br>
    Land: <b>{$_POST['land']}</b>\r\n
    <br>
    F�rening: <b>{$_POST['forening']}</b>\r\n
    <br>
    F�delse�r: <b>{$_POST['fodelse']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du anv�nda n�r du vill anm�la dig till
    kommande �r och g� in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Ditt marknadslopps-id �r:  <b>{$id} </b>\r\n
    <br>
    <br>
    Betalningen g�r du genom att s�tta in <b>{$_POST['avgift']} kr</b> p� pg nr: <b>162 78 46-7</b> senast <b>fredagen den 18 juni.</b>\r\n
    Ange ditt marknadsloppsid som meddelande.\r\n
    <br>
    <br>
    <b> OBS!!!</b>
    Du har �ven best�llt <b>Marknadsloppsdiplom</b>, l�gg till <b>30 kr</b> vid inbetalningen f�r detta.\r\n 
    <br>
    <br>
    <b>Lycka till i loppet �nskar Frosta OK!</b>
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
$headers .= "Reply-to: anmalan@marknadsloppet.nu\r\n";
$headers .= "Return-path: anmalan@marknadsloppet.nu\r\n"; 
$to = "<$epost>";
$subject = "Anm�lan till marknadsloppet";

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
    Tack f�r din anm�lan till <b>Marknadssloppet 2005</b>!
    <br>
    <br>
    Vi har mottagit din anm�lan d�r du uppgav f�ljande uppgifter:
    <br>
    <br>
    Namn: <b>{$_POST['fnamn']} {$_POST['enamn']}</b>\r\n
    <br>
    Postadress: <b>{$_POST['adress']}</b>\r\n
    <br>
    Postnummer: <b>{$_POST['postnummer']}</b>\r\n
    <br>
    Ort: <b>{$_POST['ort']}</b>\r\n
    <br>
    Land: <b>{$_POST['land']}</b>\r\n
    <br>
    F�rening: <b>{$_POST['forening']}</b>\r\n
    <br>
    F�delse�r: <b>{$_POST['fodelse']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du anv�nda n�r du vill anm�la dig till
    kommande �r och g� in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Ditt marknadslopps-id �r:  <b>{$id} </b>\r\n
    <br>
    <br>
    Betalningen g�r du genom att s�tta in <b>{$_POST['avgift']} kr</b> p� pg nr: <b>162 78 46-7</b> senast <b>fredagen den 18 juni.</b>\r\n
    Ange ditt marknadsloppsid som meddelande.\r\n
    <br>
    <br>
    <b>Lycka till i loppet �nskar Frosta OK!</b>
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
$headers .= "Reply-to: anmalan@marknadsloppet.nu\r\n";
$headers .= "Return-path: anmalan@marknadsloppet.nu\r\n"; 
$to = "<$epost>";
$subject = "Anm�lan till marknadsloppet";

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

<BODY bgcolor="#FFFFFF" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="10" BORDER="0"  ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<?#- Koppla upp till databasen
mysql_connect('localhost', 'marknad', 'lyckebo')
 or die (mysql_error());
mysql_select_db('marknad');?>

<form ACTION="<?php echo $PHP_SELF ?>" METHOD="post" id=form1 name=form1>
<table WIDTH="550" CELLSPACING="0" CELLPADDING="0" BORDER="0">
<tr height="30">
</tr>	
<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Fyll i dina personuppgifter:</b></font>
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
     F�reningar, familjer och f�retag som registrerar flera l�pare trycker p� "Registrera m�nga" f�r samtliga (�ven f�r den sista l�paren)  och trycker d�refter "Avsluta" n�r man �r klar.
     <br>
     <br>
     Anm�ler man bara 1 l�pare trycker man p� "Registrera en" och d�refter "Avsluta"
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
    <br>
    <table CELLSPACING="6" CELLPADDING="0" BORDER="1" WIDTH="100%">
    <tr>
      <td><font face="verdana" size="-2">f�rnamn (t.ex. Anders)</td>
      <td><input TYPE="Text" NAME="fnamn" value="" SIZE="30" MAXLENGTH="15">*</td>
    </tr>

    <tr>
      <td><font face="verdana" size="-2">efternamn (t.ex. Andersson)</td>
      <td><input TYPE="Text" NAME="enamn" value="" SIZE="30" MAXLENGTH="20">*</td>
    </tr>
					
    <tr>
      <td><font face="verdana" size="-2">postadress (t.ex. Alv�gen 1)</td>
      <td><input TYPE="Text" NAME="adress" SIZE="30" MAXLENGTH="30" VALUE="<?=$adress?>">*</td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2">adresstyp</td>
      <td>
	<table>
	<tr>
	  <td><font face="verdana" size="-2">hem: </font></td>
	  <td><input TYPE="radio" NAME="adresstyp"  VALUE="hem" <? if ($adresstyp == "hem") echo(" checked"); ?>></td>
	</tr>
	<tr>
	  <td><font face="verdana" size="-2">f�retag/f�rening: </font></td>
	  <td><input TYPE="radio" NAME="adresstyp"  VALUE="f�retag/f�rening" <? if ($adresstyp == "f�retag/f�rening") echo(" checked"); ?>></td>
	</tr>
	</table>
      </td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2">postnummer (t.ex. 12345)</td>
      <td><input TYPE="Text" NAME="postnummer" SIZE="5" MAXLENGTH="5" VALUE="<?=$postnummer?>">*</td>
    </tr>
	
    <tr>
      <td><font face="verdana" size="-2">ort (t.ex. L�parby)</td>
      <td><input TYPE="Text" NAME="ort" SIZE="30" MAXLENGTH="30" VALUE="<?=$ort?>">*</td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2">land (t.ex. Sverige)</td>
      <td><input TYPE="Text" NAME="land" SIZE="30" MAXLENGTH="30" VALUE="Sverige">*</td>
    </tr>

    <tr>
      <td><font face="verdana" size="-2">f�rening (t.ex. L�par IF)</td>
      <td><input TYPE="Text" NAME="forening" SIZE="30" MAXLENGTH="30" VALUE="<?=$forening?>"></td>
    </tr>

    <tr>
      <td><font face="verdana" size="-2">�r f�reningen ansluten till Friidrottsf�rbundet?<br>(g�ller t�vlingsklasser)</td>
      <td>
	<table>
	<tr>
	  <td><font face="verdana" size="-2">ja: </font></td>
	  <td><input TYPE="radio" NAME="ansluten"  VALUE="ja" <? if ($ansluten == "ja") echo(" checked"); ?>></td>
	</tr>
	
        <tr>
	  <td><font face="verdana" size="-2">nej: </font></td>
	  <td><input TYPE="radio" NAME="ansluten"  VALUE="nej" <? if ($ansluten == "nej") echo(" checked"); ?>></td>
	</tr>
	</table>
      </td>
    </tr>
	
    <tr>
      <td><font face="verdana" size="-2">e-postadress <br> (beh�vs f�r att f� bekr�ftelse av anm�lan via e-post och om du vill �ndra n�got)
   </td>
      <td><input TYPE="Text" NAME="epost" SIZE="30" MAXLENGTH="70" VALUE="<?=$epost?>"></td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2">f�delse�r (t.ex. 1980)</td>
      <td><input TYPE="Text" NAME="fodelse" SIZE="4" MAXLENGTH="4" VALUE="">*</td>
    </tr>
    <tr>
     <td><font face="verdana" size="-2"><b>V�lj din klass:</b></td>
     <td>
       <table border = "0">
        <tr> 
        <td> 
        <?     $sql = "SELECT klass, value, avgift, starttid FROM klasser";
                     $result = mysql_query($sql);?>
        <select name="klass" onchange="this.form.avgift.value=this.options[this.selectedIndex].<?$row['avgift']?>" onClick="this.form.starttid.value=this.options[this.selectedIndex].starttid">';
                <?
 
                     while ($row = mysql_fetch_assoc($result))
                     {
                     echo "<option value=\"{$row['klass']}\" selected>{$row['klass']}</option>";
                     } 
                ?>
        </select>
    </td>
    <td>*</td>
    </td>
    </tr>
    </table>
    </tr>				
    
    <tr>
         <td><font face="verdana" size="-2">avgift</td>
         <td><input TYPE="Text" NAME="avgift" SIZE="4" MAXLENGTH="4" VALUE="" readonly> kr</td>
   </tr>

    <tr>
      <td><input TYPE="hidden" NAME="starttid" SIZE="4" MAXLENGTH="4" VALUE="" readonly></td>
    </tr>

    <tr>
      <td><font face="verdana" size="-2">Marknadsloppsdiplom i f�rg med namn, klass, str�cka, tid  30 kr</td>
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
      <td><font face="verdana" size="-2">antal marknadslopp inklusive detta</td>
      <td><input TYPE="Text" NAME="antal" SIZE="4" MAXLENGTH="4" VALUE="">*</td>
    </tr>
    
    <tr>
      <td COLSPAN="2" NOWRAP>* = obligatorisk uppgift</td>
    </tr>

    <tr>
      <td><input TYPE="submit" value="� registrera m�nga" name="fler"></td>
      <td><input TYPE="submit" value="� registrera en" name="spara"></td>
    </tr>

    <tr>
      <td><input TYPE="submit" value="� avsluta" name="exit"></td>
    </tr>

    <tr>
      <td><p><a href="JavaScript:history.go(-1);">&#171 Tillbaka</a></td>
    </tr>
    </table>
  </td>
</tr>
</table>
</form>

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


     