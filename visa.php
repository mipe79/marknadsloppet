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
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="5" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">
<?
#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen

$query = mysql_query("SELECT * FROM $lopare WHERE id LIKE '$id' ORDER BY id DESC LIMIT 0, 20");
while($a = mysql_fetch_array($query))
{
  $fnamn = $a["fnamn"];
  $enamn = $a["enamn"];
  $id = $a["id"];
  $adress = $a["adress"];
  $postnummer = $a["postnummer"];
  $ort = $a["ort"];
  $adresstyp = $a["adresstyp"];
  $forening = $a["forening"];
  $ansluten = $a["ansluten"];
  $epost = $a["epost"];
  $fodelse = $a["fodelse"];
  $klass = $a["klass"];
  $antal = $a["antal"];
}
?>

<form ACTION="anmal_reg.php?id=<?=$id?>" METHOD="post">
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
      <td><font face="verdana" size="-1"><b>Välj din klass:</b></td>
      <td>
        <table border = "0">
        <tr>
          <td><? echo '<select name="klass" onClick="(this.form.avgift.value=this.options[this.selectedIndex].avgift, this.form.status.value=this.options[this.selectedIndex].status, this.form.starttid.value=this.options[this.selectedIndex].starttid)">';
                 echo '<option value="0" avgift="" starttid="">--- Välj här ---</option>';

                 #- Koppla upp till databasen
                 include "include/conn.php"; // Databasanslutningen

                 $sql = "SELECT klass, value, avgift, starttid, status FROM klasser";
                 $result = mysql_query($sql);

                 while ($row = mysql_fetch_array($result))
                 {
                  $value = $row['value'];
                  $klass = $row['klass'];
                  $avgift = $row['avgift'];
                  $starttid = $row['starttid'];
                  $status = $row['status'];

                   echo "<option value='$value' avgift = '$avgift' starttid = '$starttid' status = '$status'>$klass</option>";

                }



                 echo '</select>'

            ?>
          </td>
          <td>*</td>
        </tr>
        </table>
      </td>
    </tr>

    <tr>
         <td><font face="verdana" size="-2">avgift</td>
         <td><input TYPE="Text" NAME="avgift" SIZE="4" MAXLENGTH="4" VALUE="" readonly> kr</td>
   </tr>

    <tr>
      <td><font face="verdana" size="-2">starttid</td>
      <td><input TYPE="Text" NAME="starttid" SIZE="4" MAXLENGTH="4" VALUE="" readonly></td>
    </tr>


  <tr>
      <td><font face="verdana" size="-2">antal marknadslopp inklusive detta</td>
      <td><input TYPE="Text" NAME="antal" SIZE="4" MAXLENGTH="4" VALUE="<?=$antal+1?>" readonly></td>
    </tr>

  <tr>
      <td><font face="verdana" size="-2"></td>
      <td><input TYPE="Hidden" NAME="status" SIZE="4" MAXLENGTH="4" VALUE="" readonly></td>
    </tr>

  <tr>
    <td COLSPAN="2" NOWRAP>* = obligatorisk uppgift</td>
  </tr>

  <tr>
    <td><input TYPE="submit" value="» skicka" id="Submit" name="spara"></td>
  </tr>
</form>

  <tr>
    <td>
      <form ACTION="andra.php?id=<?=$id?>" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="» ändra adressuppgifter">
      </form>
    </td>
  </tr>

  <tr>
    <td>
      <form ACTION="kontrollera.php?id=<?=$id?>" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="<< tillbaka">
      </form>
    </td>
    <td>
      <form ACTION="inlogg_andra.php?logout=\" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="<< avbryt/logga ut">
      </form>
    </td>
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
