<?php 

require "../include/var.php";

session_start(); // Alltid överst på sidan 
 
#- Koppla upp till databasen
include "../include/conn.php"; // Databasanslutningen
 
// Inloggning 
if (isset($_POST['submit']))
   {
   $user = $_POST['user'];
   $pass2 = $_POST['passwd'];
   $passs = md5($pass2);
  
   $sql = "SELECT id FROM $members WHERE user='{$_POST['user']}' AND pass='$pass'";  
  
   $query = mysql_query("SELECT * FROM $members WHERE user LIKE '{$_POST['user']}' ");
   while ($kolumn = mysql_fetch_array($query))
    {
       $user = $kolumn['user'];
       $pass = $kolumn['pass'];
    }
  
   $sql = "SELECT id FROM $members WHERE user='{$_POST['user']}' AND pass='$pass'"; 
       
   $result = mysql_query($sql); 
  
  // Hittades inte användarnamn och lösenord 
  // skicka till formulär med felmeddelande 
   if (mysql_num_rows($result) == 0){ 
    header("Location: index.php?badlogin="); 
    exit; 
   } 
  
  // Sätt sessionen med unikt index 
    $_SESSION['sess_id'] = mysql_result($result, 0); 
    $_SESSION['sess_user'] = $_POST['user']; 
    $_SESSION['sess_pass'] = $pass; 
    
  
  
   header("Location: main.php"); 
   exit; 
 } 
  
 // Utloggning 
 if (isset($_GET['logout'])){ 
   session_unset(); 
   session_destroy(); 
   header("Location: index.php"); 
   exit; 
 } 
?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<html> 
<head> 
<meta http-equiv="Content-Type" 
content="text/html; charset=iso-8859-1"> 
<title>Marknadsloppet - Admin</title> 
</head>
<BODY bgcolor="#E2C8FB" text="#000000" LINK="#0D2C52" VLINK="#0D2C52" ALINK="#000000" LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0>
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<table WIDTH="340" CELLSPACING="0" CELLPADDING="10" BORDER="0" ALIGN="CENTER">  
<body> 
<?php 
  
// Om inte inloggad visa formulär, annars logga ut-länk 
if (!isset($_SESSION['sess_user'])){ 
  
 echo "<h3>Logga in</h3>\n"; 
   
  // Visa felmeddelande vid felaktig inloggning 
  if (isset($_GET['badlogin'])){ 
    echo "Fel användarnamn eller lösenord!<br>\n"; 
    echo "Försök igen!\n"; 
   } 
   
 ?>
 <form action="index.php" method="post"> 
 <tr>
   <td>
     Användarnamn:<br>
     <input type="text" name="user"><br>
   </td>
 </tr>
 
 <tr>
   <td>
     Lösenord:<br> 
     <input type="password" name="passwd"><br> 
   </td>
 </tr>

 <tr>
   <td>     
     <input type="submit" name="submit" value="Logga in">
   </td>
 </tr> 
     </form>
   </td>
 </tr>
 </table> 
 <?php 
  
 } else { 
  
   echo "<a href=\"index.php?logout=\">Logga ut</a>\n"; 
  
 } 
  
 ?> 
 </body> 
</html> 