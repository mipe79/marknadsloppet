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

<?    
#- Lägg in värdet i $värde
$mail = $_POST['email'];

#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen  

$query = mysql_query("SELECT * FROM $lopare WHERE epost LIKE '$mail'");

  while($a = mysql_fetch_array($query))
    {
      $fnamn = $a["fnamn"];
      $enamn = $a["enamn"];
      $adress = $a["adress"];
      $postnummer = $a["postnummer"];
      $ort = $a["ort"];
      $forening = $a["forening"];
      $fodelse = $a["fodelse"];
      $id = $a["id"];
      $epost = $a["epost"];
    }
?>    

<table WIDTH="550" CELLSPACING="0" CELLPADDING="10" BORDER="0">
<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Anmälan</b></font><br>
  </td>	
</tr>

<tr>
  <td width="340" colspan="3"> 
    <hr>
  </td>
</tr>
</table>

<?
if (empty($mail))
{
  message("Du måste ange en e-mailadress");
}
else
{
  if (!eregi("^.+\@.+\..+$",$mail))
  {
    message("Ogiltlig e-postadress!");
  }
}
?>

<?
if ($epost)
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
    Dina uppgifter:</b>
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
    Förening: <b>{$forening}</b>\r\n
    <br>
    Födelseår: <b>{$fodelse}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Ditt marknadslopps-id är:  <b>{$id} </b>\r\n
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
$subject = "Uppgifter till marknadsloppet.nu";


mail($to , $subject, $message, $headers); 
 
message("Vi har skickat ett mail med dina uppgifter!");
}
else
{
  message("Din e-mailadress finns inte i vårt register");
}
?>

</TD>
</TR>
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