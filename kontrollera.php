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
<?
if ($id == "")
  { 
?>
<BODY bgcolor="#E2C8FB" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

    <form ACTION="visa_reg.php" METHOD="post" name="form1">
    <table WIDTH="550" CELLSPACING="10" CELLPADDING="0" BORDER="0">
    <tr HEIGHT="30">
    </tr>
    
    <tr>
      <td WIDTH="340">
        <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Fyll i följande uppgifter:</b></font><br>
      </td>	
    </tr>
    
    <tr>
      <td WIDTH="340"> 
        <hr>
        <table CELLSPACING="6" CELLPADDING="0" BORDER="0" WIDTH="100%">
          <tr>
	    <td colspan="2">
	    <font face="verdana" size="1">
	      Ange ditt för- och efternamn samt ditt födelseår.
	      Tryck sedan på vidare.
	    </font>
	    </td>
	  </tr>
	    
          <tr>
	    <td colspan="2">
	    <font face="verdana" size="1">förnamn</font><input type="hidden" value="namn" id="sokval" name="sokval">
	      <br><input TYPE="text" NAME="fnamn" id="fornamn" VALUE="" SIZE="15"> 
	    </td>
	  </tr>
	
          <tr>
            <td colspan="2">
	    <font face="verdana" size="1">efternamn</font>
	      <br><input TYPE="text" NAME="enamn" id="efternamn" VALUE="" SIZE="20">
	    </td>
	  </tr>
	
          <tr>
	    <td colspan="2">
	    <font face="verdana" size="1">födelseår (ex. 1979)</font>
	      <br><input TYPE="text" NAME="fodelse" id="fodelsear" VALUE="" SIZE="4"> 
	    </td>
	  </tr>
	
          <tr>
            <td colspan="2">
	      <input TYPE="submit" value="» vidare" id="Submit" name="Submit">
	      <br>
              <br>
	    </td>
	  </tr>

          </form>
		
          <tr>
            <td colspan="2">
            <font face="verdana" size="1">
              Om du inte har varit anmäld tidigare, eller 
	      om du är helt ny löpare,  
	      tryck ny.
            </font> 
	    </td>
	  </tr>

          <form ACTION="ny_reg.php" METHOD="post" id="form1" name="form1">
	  <tr>
	    <td colspan="2"><input TYPE="submit" value="  » ny  " id="Submit" name="knapp"></td>
	  </tr>
          </form>

          <tr>
 	    <td>
              <br>
	      <br>
            </td>
          </tr>
          
    <tr>
    <td>
      <form ACTION="anmalan.php" METHOD="post">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="<< tillbaka">
      </form>
    </td>
    
  </tr>
      </td>
    </table>
    </tr>
    </table>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>
<?
  }
else
  {
?>
<BODY bgcolor="#E2C8FB" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" HEIGHT="100%" CELLSPACING="0" CELLPADDING="0" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<?
   #- Lägg in värdet i $värde
   $värde = $_POST['id'];

   #- Koppla upp till databasen
   include "include/conn.php"; // Databasanslutningen 
 
   $query = mysql_query("SELECT * FROM $lopare WHERE id LIKE '$id' ORDER BY id DESC LIMIT 0, 20");
	while($a = mysql_fetch_array($query))
	 {
	  $fnamn = $a["fnamn"];
      $enamn = $a["enamn"];
      $forening = $a["forening"];
	  $ort = $a["ort"];
         }
?>

    <table WIDTH="550" CELLSPACING="10" CELLPADDING="0" BORDER="0">
    <tr HEIGHT="30">
    </tr>

    <tr>
      <td WIDTH="340">
	<font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Anmälan</b></font><br>
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
            Finns du med i listan så klicka på namnet. Då får du 
            se dina adressuppgifter och ditt Marknadslopps-ID. 
            Om du inte varit anmäld tidigare, tryck på ny och registrera dig. 
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
     <td WIDTH="25%"><b>Namn</b></td>
 
     <td WIDTH="25%" ALIGN="CENTER"><b>Förening</b></td>
 
     <td WIDTH="25%" ALIGN="CENTER"><b>Ort</b></td>

     <td WIDTH="25%" ALIGN="CENTER"><b>Marknadslopps-id</b></td>
   </tr>
     
   <tr>
     <td colspan = "4">
       <hr>
     </td>
   </tr>

   <tr>
     <td>
         <b><a href="inlogg_andra.php?id=<?=$id?>"><?=$fnamn?>&nbsp<?=$enamn?></a></b>
         
     </td>

     <td ALIGN="CENTER"><?=$forening?></td>

     <td ALIGN="CENTER"><?=$ort?></td>

     <td ALIGN="CENTER"><?=$id?></td>
   </tr>

   <tr>
     <td COLSPAN="4">
       <br>
       <br>
     </td>
   </tr>

   <form ACTION="ny_reg.php" METHOD="post" id="form1" name="form1">
	  <tr>
	    <td colspan="2"><input TYPE="submit" value="  » ny  " id="Submit" name="knapp"></td>
	  </tr>
   </form>

   <tr>
    <td>
      <form ACTION="anmalan.php" METHOD="post">
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
</TD>
</TR>
</TABLE>
</BODY
</HTML>

<?
  }
?>


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