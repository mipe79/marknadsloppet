<? require "include/var.php"; ?>

<HTML>
<HEAD>
<META http-equiv="Expires" content="0">
<TITLE>Marknadsloppet - är jag anm&auml;ld?</TITLE>

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
<TABLE WIDTH="90%" HEIGHT="100%" CELLSPACING="0" CELLPADDING="0" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="90%">

    <table WIDTH="100%" CELLSPACING="10" CELLPADDING="0" BORDER="0">
    <tr HEIGHT="30">
    </tr>

    <tr>
      <td WIDTH="340" colspan="3">
	<font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Är jag anmäld?</b></font><br>
      </td>
    </tr>

    <tr>
      <td COLSPAN="3">
	<hr>
      </td>
    </tr>

    <tr>
        <td width="340" colspan="3">
	  <font face="verdana" size="1">
	    OBS!! 
            Finns du med i listan så är du anmäld. 
            <br>
            
          </font>
	</td>
      </tr>
    </tr>

    <tr>
      <td>
        <br>
        <br>
      </td>
    </tr>

   <tr>
     <td ALIGN="CENTER"><b>Namn</b></td>
 
     <td ALIGN="CENTER"><b>Förening</b></td>
 
     <td ALIGN="CENTER"><b>Ort</b></td>

     <td ALIGN="CENTER"><b>Marknadslopps-id</b></td>

     <td ALIGN="CENTER"><b>Klass</b></td>

     <td ALIGN="CENTER"><b>Avgift</b></td>

     <td ALIGN="CENTER"><b>Starttid</b></td>

     <td ALIGN="CENTER"><b>Antal</b></td>
   </tr>
     
   <tr>
     <td colspan = "8">
       <hr>
     </td>
   </tr>

<?
#- Lägg in värdet i $värde
$forening = $_POST['forening'];
   
#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen 
 
   $query = mysql_query("SELECT * FROM $anmalda WHERE loparid BETWEEN $from AND $to ORDER BY loparid"); 
	while($a = mysql_fetch_array($query))
	 {
	    $startnr = $a["startnr"];
	    $fnamn = $a["fnamn"];
	    $enamn = $a["enamn"];
	    $forening = $a["forening"];
	    $ort = $a["ort"];
	    $loparid = $a["loparid"];
	    $klass = $a["klass"];
	    $avgift = $a["avgift"];
	    $starttid = $a["starttid"];
	    $antal = $a["antal"];
?>
    <tr>
     <td ALIGN="CENTER"><?=$fnamn?>&nbsp<?=$enamn?></td>

     <td ALIGN="CENTER"><?=$forening?></td>

     <td ALIGN="CENTER"><?=$ort?></td>

     <td ALIGN="CENTER"><?=$loparid?></td>

     <td ALIGN="CENTER"><?=$klass?></td>

     <td ALIGN="CENTER"><?=$avgift?></td>

     <td ALIGN="CENTER"><?=$starttid?></td>

     <td ALIGN="CENTER"><?=$antal?></td>
   </tr>

<?
  }

?>

   <tr>
      <td COLSPAN="8"><hr></td>
  </tr>
 
  <tr>
      <td COLSPAN="5"><font face="verdana" size="2">Om ni vill att några uppgifter ska ändras eller några uppgifter är felaktiga, så kan ni skicka ett mail till <a href=mailto:anmalan@marknadsloppet.nu>anmalan@marknadsloppet.nu</a>
                                         där ni anger ert marknadslopps-id samt vad det är som ska ändras.</td>
      
  </tr>

   <tr>
     <td COLSPAN="8">
       <br>
       <br>
     </td>
   </tr>

   <tr>
     <td>
       <form ACTION="anmald.php" METHOD="post">
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