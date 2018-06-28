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

$query = mysql_query("SELECT * FROM $anmalda WHERE loparid LIKE '$id'");
while($a = mysql_fetch_array($query))
{
  $loparid = $a["loparid"];
  $startnummer = $a["startnr"];
  $fnamn = $a["fnamn"];
  $enamn = $a["enamn"];
  $adress = $a["adress"];
  $postnummer = $a["postnummer"];
  $ort = $a["ort"];
  $land = $a["land"];
  $adresstyp = $a["adresstyp"];
  $forening = $a["forening"];
  $ansluten = $a["ansluten"];
  $klass = $a["klass"];
  $starttid = $a["starttid"];
  $diplom = $a["diplom"];
  $antal = $a["antal"];
  $fodelse = $a["fodelse"];
  $epost = $a["epost"];
  $betalt = $a["betalt"];
}
?>

<form ACTION="uppdatera_anmalda.php?id=<?=$id?>" METHOD="post" name=form1>
<table WIDTH="550" CELLSPACING="0" CELLPADDING="6" BORDER="0">
<tr height="30">
</tr>

<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Registrerade anmälningsuppgifter</b></font><br>
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
    <td><font face="verdana" size="-2">startnummer</td>
    <td><input TYPE="Text" NAME="startnummer" SIZE="10" MAXLENGTH="10" VALUE="<?=$startnummer?>"></td>
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
      <td><font face="verdana" size="-1"><b>Välj din klass:</b></td>
<td>
    <table border = "0">
    <tr>

      <td>
        <select name="klass" onClick="(this.form.avgift.value=this.options[this.selectedIndex].avgift, this.form.starttid.value=this.options[this.selectedIndex].starttid)">
        <option selected avgift="" starttid="" value="0">-- välj här --</option>
        <option value="0"  avgift="" starttid="">** Marknadsloppet 12,6 km **</option>
        <option value="0" avgift="" starttid="">-- Män --</option>
        <option value="M" avgift="100" starttid="19:00"<?=($klass=="M")?' selected="selected"':''?>>M</option>
        <option value="M-22" avgift="100" starttid="19:00"<?=($klass=="M-22")?' selected="selected"':''?>>M-22</option>
        <option value="M35" avgift="100" starttid="19:00"<?=($klass=="M35")?' selected="selected"':''?>>M35</option>
        <option value="M40" avgift="100" starttid="19:00"<?=($klass=="M40")?' selected="selected"':''?>>M40</option>
        <option value="M45" avgift="100" starttid="19:00"<?=($klass=="M45")?' selected="selected"':''?>>M45</option>
        <option value="M50" avgift="100" starttid="19:00"<?=($klass=="M50")?' selected="selected"':''?>>M50</option>
        <option value="M55" avgift="100" starttid="19:00"<?=($klass=="M55")?' selected="selected"':''?>>M55</option>
        <option value="M60" avgift="100" starttid="19:00"<?=($klass=="M60")?' selected="selected"':''?>>M60</option>
        <option value="M65" avgift="100" starttid="19:00"<?=($klass=="M65")?' selected="selected"':''?>>M65</option>
        <option value="M70" avgift="100" starttid="19:00"<?=($klass=="M70")?' selected="selected"':''?>>M70</option>
        <option value="M75" avgift="100" starttid="19:00"<?=($klass=="M75")?' selected="selected"':''?>>M75</option>
        <option value="M80+" avgift="100" starttid="19:00"<?=($klass=="M80+")?' selected="selected"':''?>>M80+</option>
        <option value="0" avgift="" starttid=""></option>
        <option value="0" avgift="" starttid="">-- Kvinnor --</option>
        <option value="K" avgift="100" starttid="19:00"<?=($klass=="K")?' selected="selected"':''?>>K</option>
        <option value="K-22" avgift="100" starttid="19:00"<?=($klass=="K-22")?' selected="selected"':''?>>K-22</option>
        <option value="K35" avgift="100" starttid="19:00"<?=($klass=="K35")?' selected="selected"':''?>>K35</option>
        <option value="K40" avgift="100" starttid="19:00"<?=($klass=="K40")?' selected="selected"':''?>>K40</option>
        <option value="K45" avgift="100" starttid="19:00"<?=($klass=="K45")?' selected="selected"':''?>>K45</option>
        <option value="K50" avgift="100" starttid="19:00"<?=($klass=="K50")?' selected="selected"':''?>>K50</option>
        <option value="K55" avgift="100" starttid="19:00"<?=($klass=="K55")?' selected="selected"':''?>>K55</option>
        <option value="K65" avgift="100" starttid="19:00"<?=($klass=="K65")?' selected="selected"':''?>>K65</option>
        <option value="K70+" avgift="100" starttid="19:00"<?=($klass=="K70+")?' selected="selected"':''?>>K70+</option>
        <option value="0" avgift="" starttid=""></option>
        <option value="0" avgift=""starttid="">-- Motionsklasser --</option>
        <option value="MM" avgift="100" starttid="19:10"<?=($klass=="MM")?' selected="selected"':''?>>MM (Motion män)</option>
        <option value="MK" avgift="100" starttid="19:10"<?=($klass=="MK")?' selected="selected"':''?>>MK (Motion kvinnor)</option>
        <option value="0" avgift="" starttid="">___________________</option>
        <option value="0" avgift="" starttid=""></option>
        <option value="0" avgift="" starttid="">** Bil-Månssonloppet 6,1 km **</option>
        <option value="0" avgift="" starttid="">-- Pojkar --</option>
        <option value="P14" avgift="100" starttid="18:10"<?=($klass=="P14")?' selected="selected"':''?>>P14</option>
        <option value="P16" avgift="100" starttid="18:10"<?=($klass=="P16")?' selected="selected"':''?>>P16</option>
        <option value="P18" avgift="100" starttid="18:10"<?=($klass=="P18")?' selected="selected"':''?>>P18</option>
        <option value="0" avgift="" starttid=""></option>
        <option value="0" avgift="" starttid="">-- Flickor --</option>
        <option value="F14" avgift="100" starttid="18:10"<?=($klass=="F14")?' selected="selected"':''?>>F14</option>
        <option value="F16" avgift="100" starttid="18:10"<?=($klass=="F16")?' selected="selected"':''?>>F16</option>
        <option value="F18" avgift="100" starttid="18:10"<?=($klass=="F18")?' selected="selected"':''?>>F18</option>
        <option value="0" avgift="" starttid=""></option>
        <option value="0" avgift="" starttid="">-- Motionsklasser --</option>
        <option value="MMK" avgift="100" starttid="18:10"<?=($klass=="MMK")?' selected="selected"':''?>>MMK (Motion män kort)</option>
        <option value="MKK" avgift="100" starttid="18:10"<?=($klass=="MKK")?' selected="selected"':''?>>MKK (Motion kvinnor kort)</option>
        <option value="0" avgift="" starttid="">_________________________</option>
        <option value="0" avgift="" starttid=""></option>
        <option value="0" avgift="" starttid="">** Can-Can Loppet 3,4 km **</option>
        <option value="0" avgift="" starttid=""></option>
        <option value="0" avgift="" starttid="">-- Pojkar --</option>
        <option value="P8" avgift="50" starttid="18:00"<?=($klass=="P8")?' selected="selected"':''?>>P8</option>
        <option value="P10" avgift="50" starttid="18:00"<?=($klass=="P10")?' selected="selected"':''?>>P10</option>
        <option value="P12" avgift="50" starttid="18:00"<?=($klass=="P12")?' selected="selected"':''?>>P12</option>
        <option value="0" avgift="" starttid=""></option>
        <option value="0" avgift="" starttid="">-- Flickor --</option>
        <option value="F8" avgift="50" starttid="18:00"<?=($klass=="F8")?' selected="selected"':''?>>F8</option>
        <option value="F10" avgift="50" starttid="18:00"<?=($klass=="F10")?' selected="selected"':''?>>F10</option>
        <option value="F12" avgift="50" starttid="18:00"<?=($klass=="F12")?' selected="selected"':''?>>F12</option>
        <option value="0" avgift="50" starttid=""></option>
        <option value="0" avgift="" starttid="">-- Gå lunka löp --</option>
        <option value="GLL" avgift="50" starttid="18:00"<?=($klass=="GLL")?' selected="selected"':''?>>GLL</option>
        </select>
      </td>

      </tr>
      </table>
    </td>
    </tr>

  <tr>
      <td><font face="verdana" size="-2">avgift</td>
      <td><input TYPE="Text" NAME="avgift" SIZE="4" MAXLENGTH="4" VALUE="<?=$avgift?>" readonly> kr</td>
  </tr>

  <tr>
      <td><font face="verdana" size="-2">starttid</td>
      <td><input TYPE="Text" NAME="starttid" SIZE="4" MAXLENGTH="4" VALUE="<?=$starttid?>" readonly></td>
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
   <td><font face="verdana" size="-2">betalt</td>
   <td>
    <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
    <select name="betalt">
    <option value="ja"<?=($betalt =="ja")?' selected="selected"':''?>>ja</option>
    <option value="nej"<?=($betalt =="nej")?' selected="selected"':''?>>nej</option>
    </select>
    </font>
   </td>
  </tr>

  <tr>
	<td><input TYPE="submit" value="» ändra" id="Submit" name="spara"></td>
  </tr>

  <tr>
    <td><p><a href="visa_anmalda.php">&#171 Tillbaka</a></td>
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
