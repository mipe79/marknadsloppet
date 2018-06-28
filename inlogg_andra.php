<?php 

require "include/var.php";

session_start(); // Alltid överst på sidan 
 
#- Koppla upp till databasen
include "include/conn.php"; // Databasanslutningen 
 
// Inloggning 
if (isset($_POST['submit']))
   {
   $mid = $_POST['id'];
   $fodelse = $_POST['fodelse'];
   $passs = md5($fodelse);
  
   $sql = "SELECT id FROM $lopare WHERE id='{$_POST['id']}' AND fodelse='$fodelse'";  
  
   $query = mysql_query("SELECT * FROM $lopare WHERE id LIKE '{$_POST['id']}' ");
   while ($kolumn = mysql_fetch_array($query))
    {
       $mid = $kolumn['id'];
       $fodelse = $kolumn['fodelse'];
    }
  
   $sql = "SELECT id FROM $lopare WHERE id='{$_POST['id']}' AND fodelse='{$_POST['fodelse']}'"; 
       
   $result = mysql_query($sql); 
  
  // Hittades inte marknadslopps-id och postnummer 
  // skicka till formulär med felmeddelande 
   if (mysql_num_rows($result) == 0){ 
    header("Location: inlogg_andra.php?badlogin="); 
    exit; 
   } 
  
  // Sätt sessionen med unikt index 
    $_SESSION['sess_id'] = mysql_result($result, 0); 
    $_SESSION['sess_user'] = $_POST['id']; 
    $_SESSION['sess_pass'] = $fodelse; 
    
  
  
   header("Location: visa.php?id=$mid"); 
   
 } 
  
 // Utloggning 
 if (isset($_GET['logout'])){ 
   session_unset(); 
   session_destroy(); 
   header("Location: huvud.html"); 
   exit; 
 } 
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<html> 
<head> 
<meta http-equiv="Content-Type" 
content="text/html; charset=iso-8859-1"> 
<title>Marknadsloppet - Logga in</title> 
</head> 
<BODY bgcolor="#E2C8FB" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<table WIDTH="340" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER"> 
<tr>
    <td colspan="2">
	    <font face="verdana" size="1">
	      För att kunna anmäla dig om du varit anmäld sedan tidigare krävs att du har ditt
          marknadslopps-id, samt födelseår tillhanda.
          <br>Fyll i de uppgifterna nedan.
	      <br>Tryck sedan på Logga in.
	    </font>
	    </td> 
</tr>
<tr> 
     <td WIDTH="340"> 
        <hr>
</td>
      </tr> 
<?php 
  
// Om inte inloggad visa formulär, annars logga ut-länk 
//if (!isset($_SESSION['sess_user'])){ 
  
 echo "<h3>Logga in</h3>\n"; 
   
  // Visa felmeddelande vid felaktig inloggning 
  if (isset($_GET['badlogin'])){ 
    echo "Fel marknadslopps-id eller födelseår!<br>\n"; 
    echo "Försök igen!\n"; 
   } 
   
 ?>
<form action="inlogg_andra.php" method="post"> 
<tr>
   <td>
     Marknadslopps-id:<br>
     <input type="text" name="id" value="<?=$id?>"><br>
   </td>
 </tr>
 
 <tr>
   <td>
     Födelseår:<br> 
     <input type="password" tabindex="0" name="fodelse"><br> 
   </td>
 </tr>

 <tr>
   <td>     
     <input type="submit" name="submit" value="Logga in">
   </td>
 </tr> 
     
   </td>
 </tr>
</form>

<form ACTION="skicka_mail.php" METHOD="post" name="form2">
<tr>
  <td colspan="3">
    <font face="verdana" size="1"><b>Om du inte kommer ihåg dina uppgifter så 
    kan du fylla i din e-mail, så skickas uppgifterna du registerat hos oss till 
    dig om du har angivit din e-mailadress.</b>
    <br>
    <br>
    e-postadress</font>
    <br>
    <input TYPE="text" name="email" value="" size="30">
    <br>
    <br>
    <input TYPE="submit" value="» skicka" name="skickaemail">
  </td>
</tr>
</form>

</table>

</TD>
</TR>
</TABLE>
</BODY>
 <?php 
  
// } else { 

  
//   echo "<a href=\"inlogg_andra.php?logout=\">Logga ut</a>\n"; 
  
// } 
  
// ?> 
 
</html> 