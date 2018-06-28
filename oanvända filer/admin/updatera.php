<?

require "include/var.php";

session_start(); 

if (!isset($_SESSION['sess_id'])) {
   header("Location: index.php");
   exit;
}

?>
<HTML>
<HEAD>
<META http-equiv="Expires" content="0">
<TITLE>Marknadsloppet - Admin</TITLE>

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

<p><a href="visa_anmalda.php">&#171 Tillbaka till Anmälda löpare</a>
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


$id = $_POST['id'];
$betalt = $_POST['betalt'];
?>

<table WIDTH="550" CELLSPACING="0" CELLPADDING="6" BORDER="0">
<tr height="30">
</tr>

<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Ändring av uppgifter</b></font><br>
  </td>
</tr>

<tr>
  <td>
    <hr>

<?

mysql_query("UPDATE $anmalda SET betalt = '{$_POST['betalt']}', startnr = '{$_POST['startnr']}' WHERE loparid = {$id}"); 

message("Uppgifterna är nu uppdaterade");
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