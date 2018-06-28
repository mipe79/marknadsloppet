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
<TITLE>Marknadsloppet - Registrerade löpare</TITLE>

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
<TABLE WIDTH="100%" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD>


<table WIDTH="100%" CELLSPACING="5" CELLPADDING="5" BORDER="0">
<tr height="30">
</tr>

<tr>
  <td colspan="3" ALIGN="CENTER">
  </td>
  <td colspan="5" ALIGN="CENTER">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Registrerade löpare</b></font><br>
  </td>
</tr>

<tr>
  <td colspan="3" ALIGN="CENTER">
  </td>
  <td WIDTH="340" colspan="5" ALIGN="CENTER">    
    <hr>
  </td>
</tr>


<tr>
  <td WIDTH="10%"><b>Löpar-id</b></font></td>

  <td><b>Namn</b></font></td>

  <td><b>Adress</b></font></td>

  <td><b>Postnr</b></font></td>

  <td><b>Ort</b></font></td>

  <td><b>Adresstyp</b></font></td>

  <td><b>Förening</b></font></td>

  <td><b>Ansluten förening</b></font></td>

  <td><b>Födelseår</b></font></td>

  <td><b>E-post</b></td>
  </tr>




<?

   $varde = $_POST['id'];

#- Koppla upp till databasen
include "../include/conn.php"; // Databasanslutningen 

    $query = mysql_query("SELECT * FROM $lopare WHERE id LIKE '$varde' ORDER BY id DESC LIMIT 0, 20");
	while($a = mysql_fetch_array($query))
	 {
	  $id = $a["id"];
  	  $fnamn = $a["fnamn"];
  	  $enamn = $a["enamn"];
  	  $adress = $a["adress"];
      $postnummer = $a["postnummer"];
      $ort = $a["ort"];
      $adresstyp = $a["adresstyp"];
      $forening = $a["forening"];
      $ansluten = $a["ansluten"];
      $epost = $a["epost"];
      $fodelse = $a["fodelse"];
     }
?>
     
  <tr>
  <td WIDTH="10%"><?=$id?></td>
  
  <td><a href="andra_reg.php?id=<?=$id?>"><?=$fnamn?>&nbsp<?=$enamn?></a></td>

  <td><?=$adress?></td>

  <td><?=$postnummer?></td>

  <td><?=$ort?></td>

  <td><?=$adresstyp?></td>

  <td><?=$forening?></td>

  <td><?=$ansluten?></td>

  <td><?=$fodelse?></td>

  <td><?=$epost?></td>
  </tr>
 

<tr>
  <td colspan="10">
    <hr>
  </td>
</tr>

<tr>
    <td colspan="3"><p><a href="main.php">&#171 Tillbaka till admin sidan</a></td>
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

