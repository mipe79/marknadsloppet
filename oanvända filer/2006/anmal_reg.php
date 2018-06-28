<? require "include/var.php"; ?>

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

<?
function message($mess)
{
?>
<p><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b><?=$mess?></b></font><br>

<p><a href="JavaScript:history.go(-1);">&#171 Ok</a>
<?
exit;
}
?>

<?
function message_ok($mess)
{
?>
<p><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b><?=$mess?></b></font><br>

<p><a href="huvud.html" target=huvud>&#171 Ok</a>
<?
exit;
}
?>
</HEAD>

<BODY bgcolor="#E2C8FB" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<table WIDTH="550" CELLSPACING="0" CELLPADDING="6" BORDER="0">
<tr height="30">
</tr>

<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Anmälan</b></font><br>
  </td>
</tr>

<tr>
  <td>
    <hr>

<?
#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen 

$query = mysql_query("SELECT * FROM $lopare WHERE id LIKE '$id'");
  while($a = mysql_fetch_array($query))
  {
    $fnamn = $a["fnamn"];
    $enamn = $a["enamn"];
    $id = $a["id"];
    $adress = $a["adress"];
    $postnummer = $a["postnummer"];
    $ort = $a["ort"];
    $land = $a["land"];
    $adresstyp = $a["adresstyp"];
    $forening = $a["forening"];
    $ansluten = $a["ansluten"];
    $epost = $a["epost"];
    $fodelse = $a["fodelse"];
  }

if ($klass=="0")
{
  message("Du glömde fylla i din klass eller har du valt en felaktig klass!");
}

if (empty($epost))
{
  $dubbel = mysql_query("SELECT * FROM $anmalda WHERE fnamn='$fnamn' AND enamn='$enamn' AND adress='$adress' AND postnummer='$postnummer' AND ort='$ort' AND fodelse='$fodelse'");
  if(mysql_fetch_array($dubbel))
  {
    message("Du finns redan redan registrerad!");
  }

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$avgift', '$diplom', '$starttid', '{$_POST['antal']}', '$epost', 'nej', NOW(), NOW())");

mysql_query("UPDATE $lopare SET antal = '{$_POST['antal']}' WHERE id = {$id}"); 

message_ok("Vi har mottagit din anmälan!");
}

else
{
  $dubbel = mysql_query("SELECT * FROM $anmalda WHERE fnamn='$fnamn' AND enamn='$enamn' AND adress='$adress' AND postnummer='$postnummer' AND ort='$ort' AND fodelse='$fodelse'");
  if(mysql_fetch_array($dubbel))
  {
    message_ok("Du finns redan redan registrerad!");
  }
?>

  </td>
</tr>
</table>

<?
mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, avgift, diplom, starttid, antal, epost, betalt, datum, tid) VALUES ('$id', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$avgift', '$diplom', '$starttid', '{$_POST['antal']}', '$epost', 'nej', NOW(), NOW())");

mysql_query("UPDATE $lopare SET antal = '{$_POST['antal']}' WHERE id = {$id}");

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
    Namn: <b>{$fnamn} {$enamn}</b>\r\n
    <br>
    Postadress: <b>{$adress}</b>\r\n
    <br>
    Postnummer: <b>{$postnummer}</b>\r\n
    <br>
    Ort: <b>{$ort}</b>\r\n
    <br>
    Land: <b>{$land}</b>\r\n
    <br>
    Förening: <b>{$forening}</b>\r\n
    <br>
    Födelseår: <b>{$fodelse}</b>\r\n
    <br>
    Klass: <b>{$klass}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Ditt marknadslopps-id är:  <b>{$id} </b>\r\n
    <br>
    <br>
    Betalningen gör du genom att sätta in <b>{$_POST['avgift']} kr</b> på pg nr: <b>162 78 46-7</b> senast <b>fredagen den 17 juni.</b>\r\n
    Ange ditt marknadsloppsid som meddelande.\r\n
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
 
message_ok("Vi har mottagit din anmälan och skickat ett mail med dina uppgifter!");
}  
?>

</TD>
</TR>
</TABLE>
</BODY
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
