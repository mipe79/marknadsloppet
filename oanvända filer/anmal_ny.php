<? require "include/var.php"; ?>

<HTML>
<HEAD>
<META http-equiv="Expires" content="0">
<TITLE>Marknadsloppet - anm&auml;lan</TITLE>

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

<p><a href="JavaScript:history.go(-1);">&#171 Tillbaka</a>
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
  <td colspan="2">
    <hr>
  

<?
#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen 

$adresstyp=$_POST['adresstyp'];

if (empty($forening))
{
}
else
{
  if (strlen($forening)<2)
  {
    message("Kontrollera förening");
  }
}

if (!eregi("^.+\@.+\..+$",$epost))
  {
    message("Ogiltlig e-postadress!");
  }

if (strlen($fnamn)<2)
{
  message("Du glömde skriva ditt förnamn!");
}
elseif (strlen($enamn)<2)
{
  message("Du glömde skriva ditt efternamn!");
}
elseif (strlen($adress)<5)
{
  message("Du glömde skriva din postadress!");
}
elseif (strlen($postnummer)<> 5)
{
  message("Du glömde skriva ditt postnummer eller skrev det felaktigt!");
}
elseif (strlen($ort)<2)
{
  message("Du glömde skriva din ort!");
}
elseif (strlen($land)<2)
{
  message("Du glömde fylla i ditt land!");
}
elseif (strlen($fodelse)<4)
{
  message("Du glömde skriva in ditt födelseår!");
}
elseif ($klass=="0")
{
  message("Du glömde fylla i din klass!");
}
elseif ($ansluten=="nej" && $status=="1")
{
 message("Föreningen måste vara ansluten till Friidrottsförbundet i tävlingsklass!")
}
elseif (strlen($fodelse)<4)
{
  message("Du glömde skriva in antal marknadslopp!");
}


  $dubbel = mysql_query("SELECT * FROM $lopare WHERE fnamn='$fnamn' AND enamn='$enamn' AND adress='$adress' AND postnummer='$postnummer' AND ort='$ort' AND fodelse='$fodelse'");
  if(mysql_fetch_array($dubbel))
  {
    message("Du finns redan redan registrerad!");
  }
 
mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, antal, epost) VALUES ('', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$antal', '$epost')");
 
$id = mysql_insert_id();

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, avgift, starttid, epost, betalt) VALUES ('$id', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$avgift', '$starttid', '$epost', 'nej')");
 
$fnamn = $_POST['fnamn'];
$enamn = $_POST['enamn'];
$adress = $_POST['adress'];
$postnummer = $_POST['postnummer'];
$ort = $_POST['ort'];
$land = $_POST['land'];
$klass = $_POST['klass'];
$fodelse = $_POST['fodelse'];
$avgift =$_POST['avgift'];

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
    Tack för din anmälan till <b>Marknadssloppet {$ar}</b>!
    <br>
    <br>
    Vi har mottagit din anmälan där du uppgav följande uppgifter:
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
    Förening: <b>{$_POST['forening']}</b>\r\n
    <br>
    Födelseår: <b>{$_POST['fodelse']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Ditt marknadslopps-id är:  <b>{$id} </b>\r\n
    <br>
    <br>
    Betalningen gör du genom att sätta in <b>{$_POST['avgift']} kr</b> på pg nr: <b>162 78 46-7</b> senast <b>{$datum_betalt}.</b>\r\n
    Ange ditt marknadsloppsid som meddelande.\r\n
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
 
message("Vi har mottagit din anmälan och skickat ett mail med dina uppgifter!");
  
?>

</td>
</tr>
</table>
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
