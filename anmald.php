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

    
    <table WIDTH="550" CELLSPACING="10" CELLPADDING="0" BORDER="0">
    <tr>
      <td WIDTH="550">
        <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Är jag anmäld?</b></font><br>
      </td>	
    </tr> 

    <tr>
      <td WIDTH="550">
        <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Här nedan finns olika alternativ för att
        söka. I fälten förnamn/efternam/förening kan du skriva * för att söka på alla.</font><br>
      </td>	
    </tr> 
   
    <form ACTION="anmald_namn.php" METHOD="post" name="form1">
    <tr HEIGHT="30">
    </tr>
    
    <tr>
      <td WIDTH="550"> 
        <hr>
        <table CELLSPACING="6" CELLPADDING="0" BORDER="0" WIDTH="100%">
          <tr>
	    <td colspan="2">
	    <font face="verdana" size="1">förnamn</font>
	      <br><input TYPE="text" NAME="fnamn" VALUE="" SIZE="15"> 
	    </td>
	  </tr>
	
          <tr>
            <td colspan="2">
	    <font face="verdana" size="1">efternamn</font>
	      <br><input TYPE="text" NAME="enamn" VALUE="" SIZE="20">
	    </td>
	  </tr>
	
          <tr>
            <td colspan="2">
	      <input TYPE="submit" value="» sök" name="Submit">
	      <br>
              <br>
	    </td>
	  </tr>

          </form>
		
          <tr>
            <td colspan="2">
            <font face="verdana" size="1">
              Du kan också välja att istället 
              för att söka på namn, 
              söka på anmälda för en viss förening.
            </font> 
	    </td>
	  </tr>

          <form ACTION="anmald_forening.php" METHOD="post" name="form1">
          <tr>
            <td colspan="2">
	    <font face="verdana" size="1">förening</font>
	      <br><input TYPE="text" NAME="forening" VALUE="" SIZE="20">
	    </td>
	  </tr>	  

          <tr>
	    <td colspan="2">
            <input TYPE="submit" value="  » sök  " name="knapp">
	    <br>          
            <br>
          </td>
	  </tr>
          </form>

          <tr>
            <td colspan="2">
            <font face="verdana" size="1">
              Du kan också välja att istället 
              för att söka på namn eller förening, 
              söka på ditt marknadslopps-id.
            </font> 
	    </td>
	  </tr>

          <form ACTION="anmald_id.php" METHOD="post" name="form1">
          <tr>
            <td colspan="2">
	    <font face="verdana" size="1">marknadslopps-id</font>
	      <br><input TYPE="text" NAME="id" VALUE="" SIZE="20">
	    </td>
	  </tr>	  

          <tr>
	    <td colspan="2"><input TYPE="submit" value="  » sök  " name="knapp">
           <br>          
            <br>   
          </td>
	  </tr>
          </form>

          <tr>
            <td colspan="2">
            <font face="verdana" size="1">
              Du kan också välja mellan ett intervall
	      av marknadslopps-id.
            </font> 
	    </td>
	  </tr>

          <form ACTION="anmald_spann.php" METHOD="post" name="form1">
          <tr>
            <td colspan="2" width="40%">
	    <font face="verdana" size="1">marknadslopps-id</font>
	      <br><font face="verdana" size="1">från: </font><input TYPE="text" NAME="from" VALUE="" SIZE="20">
             </td>
             <td>
              <br><font face="verdana" size="1">till:</font><input TYPE="text" NAME="to" VALUE="" SIZE="20">
	     </td>
	  </tr>	  

          <tr>
	    <td colspan="2"><input TYPE="submit" value="  » sök  " name="knapp"></td>
	  </tr>
          </form>

          <tr>
 	    <td>
              <br>
	      <br>
            </td>
          </tr>

          <tr>
            <td><p><a href="huvud.html">&#171 Tillbaka</a></td>
          </tr>
      </td>
    </table>
    </tr>
    </table>
</TD>
</TR>
</TABLE>
</BODY
</HTML>
