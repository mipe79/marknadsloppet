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
        <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>�r jag anm�ld?</b></font><br>
      </td>	
    </tr> 

    <tr>
      <td WIDTH="550">
        <font face="Verdana, Arial, Helvetica, sans-serif" size="2">H�r nedan finns olika alternativ f�r att
        s�ka. I f�lten f�rnamn/efternam/f�rening kan du skriva * f�r att s�ka p� alla.</font><br>
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
	    <font face="verdana" size="1">f�rnamn</font>
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
	      <input TYPE="submit" value="� s�k" name="Submit">
	      <br>
              <br>
	    </td>
	  </tr>

          </form>
		
          <tr>
            <td colspan="2">
            <font face="verdana" size="1">
              Du kan ocks� v�lja att ist�llet 
              f�r att s�ka p� namn, 
              s�ka p� anm�lda f�r en viss f�rening.
            </font> 
	    </td>
	  </tr>

          <form ACTION="anmald_forening.php" METHOD="post" name="form1">
          <tr>
            <td colspan="2">
	    <font face="verdana" size="1">f�rening</font>
	      <br><input TYPE="text" NAME="forening" VALUE="" SIZE="20">
	    </td>
	  </tr>	  

          <tr>
	    <td colspan="2">
            <input TYPE="submit" value="  � s�k  " name="knapp">
	    <br>          
            <br>
          </td>
	  </tr>
          </form>

          <tr>
            <td colspan="2">
            <font face="verdana" size="1">
              Du kan ocks� v�lja att ist�llet 
              f�r att s�ka p� namn eller f�rening, 
              s�ka p� ditt marknadslopps-id.
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
	    <td colspan="2"><input TYPE="submit" value="  � s�k  " name="knapp">
           <br>          
            <br>   
          </td>
	  </tr>
          </form>

          <tr>
            <td colspan="2">
            <font face="verdana" size="1">
              Du kan ocks� v�lja mellan ett intervall
	      av marknadslopps-id.
            </font> 
	    </td>
	  </tr>

          <form ACTION="anmald_spann.php" METHOD="post" name="form1">
          <tr>
            <td colspan="2" width="40%">
	    <font face="verdana" size="1">marknadslopps-id</font>
	      <br><font face="verdana" size="1">fr�n: </font><input TYPE="text" NAME="from" VALUE="" SIZE="20">
             </td>
             <td>
              <br><font face="verdana" size="1">till:</font><input TYPE="text" NAME="to" VALUE="" SIZE="20">
	     </td>
	  </tr>	  

          <tr>
	    <td colspan="2"><input TYPE="submit" value="  � s�k  " name="knapp"></td>
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
