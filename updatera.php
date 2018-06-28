<?

require "include/var.php";

session_start(); 

if (!isset($_SESSION['sess_id'])) {
   header("Location: inlogg_andra.php");
   exit;
}

?>
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

<tr>
    <td>
      <form ACTION="andra.php?id=<?=$_GET['id']?>" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="<< tillbaka">
      </form>
    </td>
  </tr>


<?
exit;
}

function message2($mess)
{
?>
<p><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b><?=$mess?></b></font><br>

<tr>
    <td>
      <form ACTION="visa.php?id=<?=$_GET['id']?>" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="<< tillbaka">
      </form>
    </td>
  </tr>

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

#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen 


?>

<table WIDTH="550" CELLSPACING="0" CELLPADDING="6" BORDER="0">
<tr height="30">
</tr>

<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Ändring av adressuppgifter</b></font><br>
  </td>
</tr>
  <td>
    <hr>

<?
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

if (empty($epost))
{
}
else
{
  if (!eregi("^.+\@.+\..+$",$epost))
    {
      message("Ogiltlig e-postadress!");
    }
}

$dubbel = mysql_query("SELECT * FROM $lopare WHERE fnamn='$fnamn' AND enamn='$enamn' AND adress='$adress' AND postnummer='$postnummer' AND ort='$ort' AND forening='$forening' AND fodelse='$fodelse' AND enamn='$enamn' AND epost='$epost'");
if(mysql_fetch_array($dubbel))
{
  message("Dessa uppgifter finns redan redan registrerad!");
}

mysql_query("UPDATE $lopare SET fnamn = '{$_POST['fnamn']}', enamn = '{$_POST['enamn']}', 
 adress = '{$_POST['adress']}', postnummer = '{$_POST['postnummer']}', 
 ort = '{$_POST['ort']}', 
 land = '{$_POST['land']}', adresstyp = '{$_POST['adresstyp']}', forening = '{$_POST['forening']}', 
 ansluten = '{$_POST['ansluten']}', epost = '{$_POST['epost']}', 
 fodelse = '{$_POST['fodelse']}' WHERE id = {$id}"); 
 
mysql_query("UPDATE $anmalda SET fnamn = '{$_POST['fnamn']}', enamn = '{$_POST['enamn']}', 
 adress = '{$_POST['adress']}', postnummer = '{$_POST['postnummer']}', 
 ort = '{$_POST['ort']}', land = '{$_POST['land']}', adresstyp = '{$_POST['adresstyp']}', 
 forening = '{$_POST['forening']}', 
 ansluten = '{$_POST['ansluten']}', epost = '{$_POST['epost']}', 
 fodelse = '{$_POST['fodelse']}' WHERE loparid = {$id}"); 

  message2("Uppgifterna är uppdaterade!");

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