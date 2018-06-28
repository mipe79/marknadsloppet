<HTML>
<HEAD>
<META http-equiv="Expires" content="0">
<TITLE>Marknadsloppet 2005 - anm&auml;lan</TITLE>

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

<form ACTION="kontrollera.php" METHOD="post" name="form1">
<table WIDTH="550" CELLSPACING="0" CELLPADDING="0" BORDER="0">
<tr height="30">
</tr>
<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Anmälan</b></font><br>
  </td>
</tr>

<tr>
  <td>
    <br>
  </td>
<tr>

<tr>
  <td>
    <hr>
  </td>
<tr>

<tr>
  <td WIDTH="340"> 
     <font face="Verdana, Arial, Helvetica, sans-serif" size="1"><b>Fyll i följande uppgifter:</b></font>
  </td>

<tr>
  <td>
    <br>
  </td>
</tr>      
      <table border="0" cellpadding="0">
        <tr>
	  <td colspan="2">
	    <font face="verdana" size="1">
	    Om du varit anmäld tidigare var vänlig skriv in ditt femsiffriga ID-nummer
	    och tryck vidare. Om du saknar ditt Marknadsloppet-ID eller har glömt det, tryck vidare.
	    </font>
	  </td>
	</tr>
	
        <tr>
	  <td colspan="2">
	    <font face="verdana" size="1">Marknadsloppet-ID</font>
	    <br>
	    <input TYPE="text" name="id" value="" size="15">
	  </td>
	</tr>

	<tr>
          <td colspan="2">
	    <input TYPE="submit" value="» vidare" id="Submit" name="Submit">
	    <br><br>
	  </td>
	</tr>
</form>
	<tr>
          <td colspan="2">
	    <font face="verdana" size="1">Om du inte har varit anmäld tidigare och 
	    är en helt ny löpare. 
	    Tryck ny.</font> 
	  </td>
	</tr>

	<form ACTION="ny_reg.php" METHOD="post" name="form1">
	<tr>
          <td colspan="2"><input TYPE="submit" value="  » ny  " id="Submit" name="knapp"></td>
	</tr>
	</form>
		
      </table>
  </td>
</table>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>

</form>
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