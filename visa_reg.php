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
$fornamn   = $_POST['fnamn'];
$efternamn = $_POST['enamn'];
$fodelsear = $_POST['fodelse'];
   
#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen 
?>

<table WIDTH="550" CELLSPACING="0" CELLPADDING="10" BORDER="0">
<tr height="30">
</tr>

<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Anmälan</b></font><br>
  </td>
</tr>

<tr>
  <td colspan="3">
    <hr>

<?
if (strlen($fnamn)<2)
{
  message("Du glömde skriva ditt förnamn!");
}
elseif (strlen($enamn)<2)
{
  message("Du glömde skriva ditt efternamn!");
}
elseif (strlen($fodelse)<4)
{
  message("Du glömde skriva ditt födelseår!");
}	
?>
    
    <tr>
        <td width="340" colspan="3">
        <font face="verdana" size="1">
	OBS!! 
        Finns du med i listan så klicka på namnet. Då får du 
        se dina adressuppgifter och ditt Marknadslopps-ID. 
        Om du inte varit anmäld tidigare, tryck på ny och registrera dig. 
        </font>
      </td>
    </tr>
  </td>
</tr>

<tr>
  <td WIDTH="25%"><b>Namn</b></font></td>
  
  <td WIDTH="25%" ALIGN="CENTER"><b>Förening</b></td>
  
  <td WIDTH="25%" ALIGN="CENTER"><b>Ort</b></td>

  <td WIDTH="25%" ALIGN="CENTER"><b>Marknadslopps-id</b></td>
</tr>
     
<?
$query = mysql_query("SELECT * FROM $lopare WHERE fnamn LIKE '$fornamn' AND enamn LIKE '$efternamn' AND fodelse LIKE '$fodelsear'");
  while($a = mysql_fetch_array($query))
  {
    $fnamn = $a["fnamn"];
    $enamn = $a["enamn"];
    $forening = $a["forening"];
    $ort = $a["ort"];
    $id = $a['id'];
?>

<tr>
  <td colspan = "4"><hr></td>
</tr>

<tr>
  <td>
    <b><a href="visa.php?id=<?=$id?>"><?=$fnamn?>&nbsp<?=$enamn?></a></b>            
  </td>

  <td ALIGN="CENTER"><?=$forening?></td>

  <td ALIGN="CENTER"><?=$ort?></td>

  <td ALIGN="CENTER"><?=$id?></td>
</tr>
<?
  }	
?>

<tr>
  <td COLSPAN="4">
    <br>
  </td>
</tr>

<form ACTION="skicka_mail.php" METHOD="post" name="form2">
<tr>
  <td colspan="3">
    <font face="verdana" size="1"><b>Om du inte finns med i listan och har registrerat dig via hemsidan innan så
    kan du fylla i din e-mail, så skickas uppgifterna du registerat hos oss till dig om du har angivit din e-mailadress.</b>
    <br>
    <br>
    e-postadress</font>
    <br>
    <input TYPE="text" name="email" value="" size="30">
    <br>
    <br>
    <input TYPE="submit" value="» skicka" name="skickaemail">
  </td>
</tr>
</form>

<tr>
  <td colspan="3">
    <font face="verdana" size="1">Om du inte har varit anmäld tidigare och 
    du är helt ny löpare,  
    tryck ny.</font> 
  </td>
</tr>

<form ACTION="ny_reg.php" METHOD="post" name="form1">
<tr>
  <td>
    <input TYPE="submit" value="  » ny  " id="Submit" name="knapp">
  </td>
</tr>
</form>

<tr>
  <td>
      <form ACTION="kontrollera.php" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="<< tillbaka">
      </form>
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