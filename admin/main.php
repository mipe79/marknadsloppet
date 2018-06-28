<?

require "../include/var.php";

session_start(); 

if (!isset($_SESSION['sess_id'])) {
   header("Location: index.php");
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
</HEAD>

<BODY bgcolor="#E2C8FB" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<?
#- Koppla upp till databasen
include "../include/conn.php"; // Databasanslutningen 

$antal_lopare = mysql_num_rows (mysql_query ("SELECT * FROM $lopare"));
$antal_anmalda = mysql_num_rows (mysql_query ("SELECT * FROM $anmalda"));
?>


<tr>
  <td>
    <br>
  </td>
</tr> 

<tr>
  <td ALIGN="CENTER">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><a href="ny_reg_admin.php" target="huvud"><b>Individuell anmälan</b></a></font><br>
  </td>
</tr> 
    
<tr>
  <td ALIGN="CENTER">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><a href="anmalan_forening_admin.php" target="huvud"><b>Anmälan föreningskampen</b></a></font><br>
  </td>
</tr> 

<tr>
  <td ALIGN="CENTER">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><a href="anmalan_foretag_admin.php" target="huvud"><b>Anmälan företagsutmaningen</b></a></font><br>
  </td>
</tr> 

<tr>
  <td>
    <br>
  </td>
</tr>

<tr>
  <td ALIGN="CENTER">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><a href="visa_lopare.php" target="huvud"><b>Registrerade löpare (<?=$antal_lopare?>) st registrerade</b></a></font><br>
  </td>
</tr> 


<tr>
  <td>
    <br>
  </td>
</tr>     

<tr>
  <td ALIGN="CENTER">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><a href="visa_anmalda.php" target="huvud"><b>Anmälda löpare (<?=$antal_anmalda?>) st registrerade</b></a></font><br>
  </td>
</tr>   

<tr>
  <td>
    <hr>
  </td>
</tr>

<form ACTION="sok_lopare.php" METHOD="post">
<tr>
    
    <td ALIGN="CENTER"><font face="verdana" size="2">sök registrerad löpare</td>
    </tr>
    <tr> 
    <td ALIGN="CENTER"><input TYPE="text" name="id" SIZE="10" MAXLENGTH="10"></td>
    </tr>
    <tr>
    <td ALIGN="CENTER"><input TYPE="submit" value="» sök" name="spara"></td>
    </tr>
</tr>    
</form>

<tr>
  <td>
    <hr>
  </td>
</tr>

<form ACTION="sok_anmalda.php" METHOD="post">
<tr>
    <td ALIGN="CENTER"><font face="verdana" size="2">sök anmälda löpare</td>
    </tr>
    <tr> 
    <td ALIGN="CENTER"><input TYPE="text" name="id" SIZE="10" MAXLENGTH="10"></td>
    </tr>
    <tr>
    <td ALIGN="CENTER"><input TYPE="submit" value="» sök" name="spara"></td>
    </tr>
</tr>    
</form>
 
</TABLE>
</BODY>
</HTML>

</form>
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