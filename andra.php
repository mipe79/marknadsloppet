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
</HEAD>

<BODY bgcolor="#E2C8FB" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="0" BORDER="0"  ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<?
#- Lägg in värdet i $värde
$varde = $_POST['id'];

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
?>

<form ACTION="updatera.php?id=<?=$id?>" METHOD="post" name=form1>
<table WIDTH="550" CELLSPACING="10" CELLPADDING="0" BORDER="0">
<tr HEIGHT="30">
</tr>
	
<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Ändra adressuppgifter</b></font><br>
  </td>	
</tr>

<tr>
  <td WIDTH="340">
    <hr>
    <table CELLSPACING="6" CELLPADDING="0" BORDER="0" WIDTH="100%">
     
     <tr>
        <td><font face="verdana" size="-2">förnamn</td>
	<td><input TYPE="Text" NAME="fnamn" value="<?=$fnamn?>" SIZE="30" MAXLENGTH="15">*</td>
      </tr>

      <tr>
	<td><font face="verdana" size="-2">efternamn</td>
	<td><input TYPE="Text" NAME="enamn" value="<?=$enamn?>" SIZE="30" MAXLENGTH="20">*</td>
      </tr>

      <tr>
	<td><input TYPE="hidden" NAME="id" value="<?=$id?>" SIZE="30" MAXLENGTH="20" disabled></td>
      </tr>
      
      <tr>
	<td><font face="verdana" size="-2">postadress</td>
	<td><input TYPE="Text" NAME="adress" SIZE="30" MAXLENGTH="30" VALUE="<?=$adress?>">*</td>
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
	    <td><input TYPE="radio" NAME="adresstyp"  VALUE="företag/förening"<? if ($adresstyp == "for") echo(" checked"); ?>></td>
	  </tr>
	  </table>
        </td>
      </tr>


      <tr>
        <td><font face="verdana" size="-2">postnummer</td>
	<td><input TYPE="Text" NAME="postnummer" SIZE="5" MAXLENGTH="5" VALUE="<?=$postnummer?>">*</td>
      </tr>

      <tr>
	<td><font face="verdana" size="-2">ort</td>
	<td><input TYPE="Text" NAME="ort" SIZE="30" MAXLENGTH="30" VALUE="<?=$ort?>">*</td>
      </tr>

      <tr>
	<td><font face="verdana" size="-2">land</td>
	<td><input TYPE="Text" NAME="land" SIZE="30" MAXLENGTH="30" VALUE="<?=$land?>">*</td>
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
	<td><font face="verdana" size="-2">e-postadress</td>
	<td><input TYPE="Text" NAME="epost" SIZE="30" MAXLENGTH="70" VALUE="<?=$epost?>">*</td>
      </tr>

      <tr>
	<td><font face="verdana" size="-2">födelseår</td>
	<td><input TYPE="Text" NAME="fodelse" SIZE="4" MAXLENGTH="4" VALUE="<?=$fodelse?>">*</td>
      </tr>

      <tr>
	<td COLSPAN="2" NOWRAP>* = obligatorisk uppgift</td>
      </tr>

      <tr>
	<td><input TYPE="submit" value="» ändra" id="Submit" name="spara"></td>
      </tr>
  </td>
  </table>
</tr>
</table>
</form>
<tr>
    <td>
      <form ACTION="visa.php?id=<?=$id?>" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="<< tillbaka">
      </form>
    </td>
  </tr>
  <tr>
    <td>
      <form ACTION="inlogg_andra.php?logout=\" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="<< avbryt/logga ut">
      </form>
    </td>
  </tr>
  

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
