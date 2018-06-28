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
</HEAD>

<BODY bgcolor="#E2C8FB" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<?
#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen 

$query = mysql_query("SELECT * FROM $anmalda WHERE loparid LIKE '$id' ORDER BY loparid DESC LIMIT 0, 20");
while($a = mysql_fetch_array($query))
{
  $fnamn = $a["fnamn"];
  $enamn = $a["enamn"];
  $id = $a["loparid"];
  $adress = $a["adress"];
  $postnummer = $a["postnummer"];
  $ort = $a["ort"];
  $adresstyp = $a["adresstyp"];
  $forening = $a["forening"];
  $ansluten = $a["ansluten"];
  $epost = $a["epost"];
  $fodelse = $a["fodelse"];
  $klass = $a["klass"];
  $avgift = $a["avgift"];
  $antal = $a["antal"];
}
?>

<form ACTION="andra_klass.php?id=<?=$id?>&klass=<?=$klass?>" METHOD="post">
<table WIDTH="550" CELLSPACING="0" CELLPADDING="6" BORDER="0">
<tr height="30">
</tr>

<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Anmälan</b></font><br>
  </td>
</tr>

<tr>
  <td WIDTH="340" colspan="3">   
    <hr>
    <font face="Verdana, Arial, Helvetica, sans-serif" size="1"><b>Anmälningsuppgifter</b></font><b
  </td>
</tr>

<tr>
  <td WIDTH="340">
  <table CELLSPACING="0" CELLPADDING="6" BORDER="0" WIDTH="100%">   
  <tr>
    <td><font face="verdana" size="-2">förnamn</td>
    <td><?=$fnamn?></td>
  </tr>
 
  <tr>
    <td><font face="verdana" size="-2">efternamn</td> 
    <td><?=$enamn?></td>
  </tr>

  <tr>
    <td><font face="verdana" size="-2">marknadslopps-id</td> 
    <td><?=$id?></td>
   </tr>

  <tr>
    <td><font face="verdana" size="-2">postadress</td> 
    <td><?=$adress?></td>
  </tr>

  <tr>
    <td><font face="verdana" size="-2">postnummer</td>
    <td><?=$postnummer?></td>
  </tr>

  <tr>
    <td><font face="verdana" size="-2">ort</td>
    <td><?=$ort?></td>
  </tr>

  <tr>
    <td><font face="verdana" size="-2">adresstyp</td>
    <td><?=$adresstyp?></td>
  </tr>

  <tr>
    <td><font face="verdana" size="-2">förening</td>
    <td><?=$forening?></td>
  </tr>

  <tr>
    <td><font face="verdana" size="-2">föreningen ansluten till friidrottsförbundet</td>
    <td><?=$ansluten?></td>
  </tr>

  <tr>
    <td><font face="verdana" size="-2">födelseår</td>
    <td><?=$fodelse?></td>
  </tr>

  <tr>
    <td><font face="verdana" size="-2">e-postadress</td>
    <td><?=$epost?></td>
  </tr>
 
  <tr>
    <td><font face="verdana" size="-2">klass</td>
    <td><?=$klass?></td>
  </tr>
   
  <tr>
      <td><font face="verdana" size="-2">avgift</td>
      <td><?=$avgift?> kr</td>
  </tr>

  <tr>
      <td><input TYPE="hidden" NAME="starttid" SIZE="4" MAXLENGTH="4" VALUE="" readonly></td>
  </tr>

  <tr>
      <td><font face="verdana" size="-2">antal marknadslopp inklusive detta</td>
      <td><?=$antal?></td>
    </tr>

  </table>
    </td>   
  </tr>

  <tr>
      <td><hr></td>
  </tr>
 
  <tr>
      <td><font face="verdana" size="2">Om ni vill att några uppgifter ska ändras eller några uppgifter är felaktiga, så kan ni skicka ett mail till <a href=mailto:anmalan@marknadsloppet.nu>anmalan@marknadsloppet.nu</a>
                                         där ni anger ert marknadslopps-id samt vad det är som ska ändras.</td>
      
  </tr>

  <tr>
    <td><input TYPE="hidden" value="» ändra klass" id="Submit" name="spara"></td>
  </tr>
</form>

  <tr>
    <td>
      <form ACTION="andra.php?id=<?=$id?>" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="hidden" value="» ändra adressuppgifter">
      </form>
    </td>
  </tr>

  <tr>
    <td><p><a href="JavaScript:history.go(-1);">&#171 Tillbaka</a></td>
  </tr>
  </table>
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
