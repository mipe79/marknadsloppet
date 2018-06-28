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
<TITLE>Marknadsloppet - Anmälda löpare</TITLE>

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
<form ACTION="<?php echo $PHP_SELF ?>" METHOD="post">
<TABLE WIDTH="100%" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD>

<?php

#- Koppla upp till databasen
include "../include/conn.php"; // Databasanslutningen 

// Sortering
switch(isset($_GET['order']) ? $_GET['order'] : "") {
   case "loparid":
      $sql_order = "loparid";
   break;
   case "startnr":
      $sql_order = "startnr";
   break;
   case "fnamn":
      $sql_order = "fnamn";
   break;
   case "enamn":
      $sql_order = "enamn";
   break;
   case "adress":
      $sql_order = "adress";
   break;
   case "postnummer":
      $sql_order = "postnummer";
   break;
   case "ort":
      $sql_order = "ort";
   break;
   case "forening":
      $sql_order = "forening";
   break;
   case "antal":
      $sql_order = "antal";
   break;
   case "fodelse":
      $sql_order = "fodelse";
   break;
   case "epost":
      $sql_order = "epost";
   break;
   case "klass":
      $sql_order = "klass";
   break;
   case "starttid":
      $sql_order = "starttid";
   break;
   case "betalt":
      $sql_order = "betalt";
   break;
   case "datum":
      $sql_order = "datum";
   break;
   case "tid":
      $sql_order = "tid";
   break;
   default:
      $sql_order = "loparid";
   break;
 }



?>


<table WIDTH="75%" CELLSPACING="3" CELLPADDING="5" BORDER="0">
<tr height="30">
</tr>


<tr>
  <td colspan="3" ALIGN="CENTER">
    
  </td>
  <td colspan="3" ALIGN="CENTER">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Anmälda löpare</b></font><br>
  </td>
</tr>

<tr>
  <td colspan="3" ALIGN="CENTER">
  </td>
  <td WIDTH="340" colspan="3" ALIGN="CENTER">    
    <hr>


<tr>

<?php
 
// Rubriker på kolumner
$headlines = array('loparid'=>'Löpar-id', 'startnr'=>'Startnummer', 'fnamn'=>'Namn', 'betalt'=>'Betalt', 'adress'=>'Adress', 'postnummer'=>'Postnr', 'ort'=>'Ort', 'land'=>'Land', 'adresstyp'=>'Adresstyp', 'forening'=>'Förening', 'ansluten'=>'Ansluten förening', 'klass'=>'Klass', 'lag_foretag'=>'Lag företag', 'lag_forening'=>'Lag förening', 'starttid'=>'Starttid', 'antal'=>'Antal', 'fodelse'=>'Födelseår', 'epost'=>'E-post', 'datum'=>'Reg. datum', 'tid'=>'Reg. tid'); 
 
// Första sorteringsordning
$default_sortorder = array('loparid'=>'ASC', 'startnr'=>'ASC', 'fnamn'=>'ASC', 'betalt'=>'ASC', 'adress'=>'ASC', 'postnummer'=>'ASC', 'ort'=>'ASC', 'land'=>'ASC', 'adresstyp'=>'ASC', 'forening'=>'ASC', 'ansluten'=>'ASC', 'klass'=>'ASC', 'lag_foretag'=>'ASC', 'lag_forening'=>'ASC', 'starttid'=>'ASC', 'antal'=>'ASC', 'fodelse'=>'ASC', 'epost'=>'ASC', 'datum'=>'ASC', 'tid'=>'ASC'); 
 
// Lopar ut rubrikerna/länkarna för tabellen
foreach ($headlines as $key => $val) {
 
   // Vänder på sorteringsordningen om man klickar på samma länk
   if (isset($_GET['order']) && $_GET['order'] == $key && isset($_GET['sortorder']) && in_array($_GET['sortorder'], array('ASC', 'DESC'))) {
       $sort_order = ($_GET['sortorder'] == 'ASC') ? 'DESC' : 'ASC'; 
   } else {
      $sort_order = $default_sortorder[$key];
   }
 
   $width = $key == 'loparid' ? ' WIDTH="10%"' : '';
   
   // Skriver ut rubrik/länk
  echo "<td$width><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><a href=\"visa_anmalda.php?order=$key&sortorder=$sort_order\"><b>$val</b></a></font></td>\n";
}
 
?>
</tr>

 

<?php

   $sort_order = isset($_GET['sortorder']) && in_array($_GET['sortorder'], array('ASC', 'DESC')) ? $_GET['sortorder'] : 'ASC';

   // Anger det som är gemensamt för båda sql-frågorna.
   // ex. $sql_common = "FROM tabell WHERE kolumn1 = 42 ORDER BY kolumn2";
   $sql_common = "FROM $anmalda ORDER BY $sql_order $sort_order";

   $limit = 1000; // Avgör hur många rader som visas per sida.
   if (isset ($_GET['page']) ) {
      $page = $_GET['page'];
   } else {
      $page = 0;
   }
   $offset = $page * $limit;

   // Kör första sql-frågan som tar reda på antalet rader.
   $sql = "SELECT COUNT(*) AS rows_tot " . $sql_common;
   $result = mysql_query($sql)
      or die(mysql_error());
   $row = mysql_fetch_array ($result);
   if ($row['rows_tot'] > 0 ) { // Kolla om det finns någon data i tabellen
      $pages_tot = (ceil($row['rows_tot'] / $limit) - 1); // Räknar ut hur många sidor det blir.

      echo "Sidan " . ($page + 1) . " av " . ($pages_tot + 1) . "<br>";

      
      // Kör andra sql-frågan som hämtar valda rader.
      $sql = "SELECT * " . $sql_common . " LIMIT $offset, $limit";
      $result = mysql_query($sql)
         or die(mysql_error());
      while ( $row = mysql_fetch_array ($result) ) { // Här lägger du till dom kolumner som ska skrivas ut
         $loparid[] = $row["loparid"];
	 $startnr[] = $row["startnr"];
         $fnamn[] = $row["fnamn"];
  	 $enamn[] = $row["enamn"];
  	 $betalt[] = $row["betalt"];
         $adress[] = $row["adress"];
         $postnummer[] = $row["postnummer"];
         $ort[] = $row["ort"];
         $land[] = $row["land"];
         $adresstyp[] = $row["adresstyp"];
         $forening[] = $row["forening"];
         $ansluten[] = $row["ansluten"];
         $klass[] = $row["klass"];
         $lag_foretag[] = $row["lag_foretag"];
         $lag_forening[] = $row["lag_forening"];
 	 $starttid[] = $row["starttid"];
         $antalm[] = $row["antal"];
         $epost[] = $row["epost"];
         $fodelse[] = $row["fodelse"];
         $datum[] = $row["datum"];
         $tid[] = $row["tid"];
        }
        $antal = count($loparid);
      
        for ($i = 0; $i<$antal; $i++) {
 
 	
  ?>
 

     
  <tr>
  <td WIDTH="10%"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$loparid[$i]?></font></td>

  <td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><input TYPE="Text" NAME="startnr[]" SIZE="5" MAXLENGTH="5" VALUE="<?=$startnr[$i]?>"></font></td>
  
  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="andra_anmalda.php?id=<?=$loparid[$i]?>"><?=$fnamn[$i]?>&nbsp<?=$enamn[$i]?></a></font></td>

  <td>
    <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
    <select name="betalt[]">
    <option value="ja"<?=($betalt[$i] =="ja")?' selected="selected"':''?>>ja</option>
    <option value="nej"<?=($betalt[$i] =="nej")?' selected="selected"':''?>>nej</option>
    </select>
    </font>
  </td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$adress[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$postnummer[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$ort[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$land[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$adresstyp[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$forening[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$ansluten[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$klass[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$lag_foretag[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$lag_forening[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$starttid[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$antalm[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$fodelse[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$epost[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$datum[$i]?></font></td>

  <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?=$tid[$i]?></font></td>
      
  <td><input type="hidden" name="sent" value="1" /></td>


  <?
  
  }
   
?>

  </tr>

  



<?php
      if ($page > 0) { // Om man inte är på första sidan visas dom här länkarna
         echo "<a href=\"{$_SERVER['PHP_SELF']}?order=$sql_order&sortorder=$sort_order\">Första</a> ";
         echo "<a href=\"{$_SERVER['PHP_SELF']}?page=" . ($page - 1) . "?order=$sql_order&sortorder=$sort_order\">Föregående</a> | ";
      } else {
         echo "Första ";
         echo "Föregående | ";
      }

      if($pages_tot > 0) { // Skriver ut länkar till alla sidor om det är fler än 1 sida
         for($i = 0; $i <= $pages_tot; $i++) {
            if($i == $page) {
               echo " " . ($i + 1) . " ";
            } else {
               echo " <a href=\"{$_SERVER['PHP_SELF']}?page=$i?order=$sql_order&sortorder=$sort_order\">" . ($i + 1) . "</a> ";
            }
         }
      } else {
         echo " 1 ";
      }

      if ($page < $pages_tot) { // Om man inte är på sista sidan visas dom här länkarna
         echo " | <a href=\"{$_SERVER['PHP_SELF']}?page=" . ($page + 1) . "?order=$sql_order&sortorder=$sort_order\">Nästa</a> ";
         echo "<a href=\"{$_SERVER['PHP_SELF']}?page=$pages_tot?order=$sql_order&sortorder=$sort_order\">Sista</a>";
      } else {
         echo " | Nästa ";
         echo "Sista";
      }
   } else { // Ingen data fanns i tabellen
      echo "Hittade ingen data i tabellen";
   }
?>

<tr>
  <td colspan="16">
    <hr>
  </td>
</tr>

<tr>
  <td ALIGN="CENTER" COLSPAN="5">
    <?
     if( isset($_POST['sent']))
      {
        for ($i=0; $i<sizeof($loparid); $i++) 
      { 
        mysql_query("UPDATE $anmalda SET betalt = '$betalt[$i]', startnr = '$startnr[$i]' WHERE loparid = '$loparid[$i]'");  
      }
    ?>  
   <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Uppgifterna är uppdaterade!</br></font>
<?
}
?>
   <td align="center"><input TYPE="submit" value="» uppdatera" name="uppdatera"></td>
</td>
</tr>  
  </form>

<tr>
    <td colspan="10"><p><a href="main.php">&#171 Tillbaka till admin sidan</a></td>
     
  </tr>
	
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

