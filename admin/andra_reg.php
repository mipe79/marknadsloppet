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
</HEAD>

<BODY bgcolor="#E2C8FB" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<?
#- Koppla upp till databasen
include "../include/conn.php"; // Databasanslutningen 

$query = mysql_query("SELECT * FROM $lopare WHERE id LIKE '$id'");
while($a = mysql_fetch_array($query))
{
  $loparid = $a["id"];
  $fnamn = $a["fnamn"];
  $enamn = $a["enamn"];
  $adress = $a["adress"];
  $postnummer = $a["postnummer"];
  $ort = $a["ort"];
  $land = $a["land"];
  $adresstyp = $a["adresstyp"];
  $forening = $a["forening"];
  $ansluten = $a["ansluten"];
  $antal = $a["antal"];
  $fodelse = $a["fodelse"];
  $epost = $a["epost"];
}
?>

<form ACTION="uppdatera_reg.php?id=<?=$id?>" METHOD="post" name=form1>
<table WIDTH="550" CELLSPACING="0" CELLPADDING="6" BORDER="0">
<tr height="30">
</tr>

<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Registrerade löparuppgifter</b></font><br>
  </td>
</tr>

<tr>
  <td WIDTH="340" colspan="3">   
    <hr>
   </td>
</tr>

<tr>
  <td WIDTH="340">
  <table CELLSPACING="0" CELLPADDING="6" BORDER="0" WIDTH="100%">   
  
  <tr>
    <td><font face="verdana" size="-2">löparid</td>
    <td><input TYPE="Text" NAME="loparid" SIZE="5" MAXLENGTH="5" VALUE="<?=$loparid?>" readonly></td>  
  </tr>

  <tr>
    <td><font face="verdana" size="-2">förnamn</td>
    <td><input TYPE="Text" NAME="fnamn" SIZE="30" MAXLENGTH="30" VALUE="<?=$fnamn?>"></td>     
  </tr>
 
  <tr>
    <td><font face="verdana" size="-2">efternamn</td> 
    <td><input TYPE="Text" NAME="enamn" SIZE="30" MAXLENGTH="30" VALUE="<?=$enamn?>"></td>      
  </tr>

  <tr>
    <td><font face="verdana" size="-2">postadress</td> 
    <td><input TYPE="Text" NAME="adress" SIZE="30" MAXLENGTH="30" VALUE="<?=$adress?>"></td>  
  </tr>

  <tr>
    <td><font face="verdana" size="-2">postnummer</td>
    <td><input TYPE="Text" NAME="postnummer" SIZE="5" MAXLENGTH="5" VALUE="<?=$postnummer?>"></td>  
  </tr>

  <tr>
    <td><font face="verdana" size="-2">ort</td>
    <td><input TYPE="Text" NAME="ort" SIZE="30" MAXLENGTH="30" VALUE="<?=$ort?>"></td>  
  </tr>

  <tr>
    <td><font face="verdana" size="-2">land</td>
    <td><input TYPE="Text" NAME="land" SIZE="30" MAXLENGTH="30" VALUE="<?=$land?>"></td>  
  </tr>

  <tr>
        <td><font face="verdana" size="-2">adresstyp</td>
        <td>
          <table>
	  <tr>
	    <td><font face="verdana" size="-2">hem: </font></td>
	    <td><input TYPE="radio" NAME="adresstyp"  VALUE="hem"<? if ($adresstyp == "hem") echo(" checked"); ?>></td>
	  </tr>
	
          <tr>
	    <td><font face="verdana" size="-2">företag/förening: </font></td>
	    <td><input TYPE="radio" NAME="adresstyp"  VALUE="företag/förening"<? if ($adresstyp == "företag/förening") echo(" checked"); ?>></td>
	  </tr>
	  </table>
        </td>
      </tr>

  <tr>
    <td><font face="verdana" size="-2">förening</td>
    <td><input TYPE="Text" NAME="forening" SIZE="30" MAXLENGTH="30" VALUE="<?=$forening?>"></td> 
  </tr>

  <tr>
      <td><font face="verdana" size="-2">är föreningen ansluten till Friidrottsförbundet? (gäller tävlingsklasser)</td>
      <td>
	<table>
	<tr>
	  <td><font face="verdana" size="-2">ja: </font></td>
	  <td><input TYPE="radio" NAME="ansluten"  VALUE="ja"<? if ($ansluten == "ja") echo(" checked"); ?>></td>
	</tr>
	
        <tr>
	  <td><font face="verdana" size="-2">nej: </font></td>
	  <td><input TYPE="radio" NAME="ansluten"  VALUE="nej"<? if ($ansluten == "nej") echo(" checked"); ?>></td>
	</tr>
	</table>
      </td>
  </tr>

  <tr>
      <td><font face="verdana" size="-2">antal marknadslopp inklusive detta</td>
      <td><input TYPE="Text" NAME="antal" SIZE="4" MAXLENGTH="4" VALUE="<?=$antal?>"></td>
    </tr>

  <tr>
    <td><font face="verdana" size="-2">födelseår</td>
    <td><input TYPE="Text" NAME="fodelse" SIZE="4" MAXLENGTH="4" VALUE="<?=$fodelse?>"></td>  
  </tr>

  <tr>
    <td><font face="verdana" size="-2">e-postadress</td>
    <td><input TYPE="Text" NAME="epost" SIZE="" MAXLENGTH="" VALUE="<?=$epost?>"></td>  
  </tr>

  <tr>
	<td><input TYPE="submit" value="» ändra" id="Submit" name="spara"></td>
  </tr>
	
  <tr>
    <td><p><a href="visa_lopare.php">&#171 Tillbaka</a></td>
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
