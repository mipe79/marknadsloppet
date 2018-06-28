<?php

require "../include/var.php";

if($_POST['exit'])
{
?>
<script type="text/javascript"> 
window.location.href = '/admin/main.php'; 
</script>
<?
}


if($_POST['spara'])
{
#- Koppla upp till databasen
include "../include/conn.php"; // Databasanslutningen 

$adresstyp=$_POST['adresstyp'];

if (empty($forening))
{
}
else
{
  if (strlen($forening)<2)
  {
    echo("Kontrollera förening");
    exit;
  }
}

if (!eregi("^.+\@.+\..+$",$epost))
  {
    echo?> <body bgcolor="#E2C8FB">Ogiltig e-postadress!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit;
  }


if (empty($fnamn)) 
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i förnamnet!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (empty($enamn))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i efternamnet!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (empty($adress))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i postadress!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (strlen($postnummer)<5)
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i postnumret!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (empty($ort))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i din ort!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (empty($land))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i ditt land!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (strlen($fodelse)<4)
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i ditt födelseår!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif ($klass=="0")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i din klass!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif ($ansluten=="nej" && $status=="1")
{
 echo?> <body bgcolor="#E2C8FB">Föreningen måste vara ansluten till Friidrottsförbundet i tävlingsklass!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}


elseif ($avgift=="0" || $avgift == "undefined")
{
  echo?> <body bgcolor="#E2C8FB">Kontrollera din klass!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif ($starttid == "undefined")
{
  echo?> <body bgcolor="#E2C8FB">Kontrollera din klass!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif ($adresstyp == "")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i adresstyp!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif (empty($antal) || $antal=="0")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i antal marknadslopp!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit;
}


 $dubbel = mysql_query("SELECT * FROM $lopare WHERE fnamn='$fnamn' AND enamn='$enamn' AND adress='$adress' AND postnummer='$postnummer' AND ort='$ort' AND fodelse='$fodelse'");
 if(mysql_fetch_array($dubbel))
 {
   echo?> <body bgcolor="#E2C8FB">Du finns redan registrerad!</body>
 <? echo("<br>"); 
 echo("<br>"); 
 echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
 exit;
 }
 
mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$antal', '$epost', NOW(), NOW())");
 
$id = mysql_insert_id();

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, avgift, starttid, antal, epost, betalt, datum, tid) VALUES ('$id', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$avgift', '$starttid', '$antal', '$epost', 'nej', NOW(), NOW())");
 
echo?> <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Vi har mottagit din anmälan och skickat ett mail med dina uppgifter!!</br></font>

<?
 
$fnamn = $_POST['fnamn'];
$enamn = $_POST['enamn'];
$adress = $_POST['adress'];
$postnummer = $_POST['postnummer'];
$ort = $_POST['ort'];
$land = $_POST['land'];
$klass = $_POST['klass'];
$fodelse = $_POST['fodelse'];
$avgift =$_POST['avgift'];


$message = <<<HTML

<html>
<head>
<title>HTML-mail</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>
  
<body style="text-align: left">
<table width="500" cellpadding="0" cellspacing="0" border="0" style="margin-right: auto; margin-left: auto">
<tr>
  <td>
    Tack för din anmälan till <b>Marknadssloppet 2006</b>!
    <br>
    <br>
    Vi har mottagit din anmälan där du uppgav följande uppgifter:
    <br>
    <br>
    Namn: <b>{$_POST['fnamn']} {$_POST['enamn']}</b>\r\n
    <br>
    Postadress: <b>{$_POST['adress']}</b>\r\n
    <br>
    Postnummer: <b>{$_POST['postnummer']}</b>\r\n
    <br>
    Ort: <b>{$_POST['ort']}</b>\r\n
    <br>
    Land: <b>{$_POST['land']}</b>\r\n
    <br>
    Förening: <b>{$_POST['forening']}</b>\r\n
    <br>
    Födelseår: <b>{$_POST['fodelse']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Ditt marknadslopps-id är:  <b>{$id} </b>\r\n
    <br>
    <br>
    Betalningen gör du genom att sätta in <b>{$_POST['avgift']} kr</b> på pg nr: <b>162 78 46-7</b> senast <b>fredagen den 23 juni.</b>\r\n
    Ange ditt marknadsloppsid som meddelande.\r\n
    <br>
    <br>
    <b>Lycka till i loppet önskar Frosta OK!</b>
  </td>
</tr>
</table>
</body>
</html>
HTML;
  
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: php\r\n";
$headers .= "From: Marknadsloppet <anmalan@marknadsloppet.nu>\r\n";
$headers .= "Bcc: anmalan@marknadsloppet.nu\r\n";
$headers .= "Reply-to: anmalan@marknadsloppet.nu\r\n";
$headers .= "Return-path: anmalan@marknadsloppet.nu\r\n"; 
$to = "<$epost>";
$subject = "Anmälan till marknadsloppet";

mail($to , $subject, $message, $headers);

     
$adress="";
$postnummer="";
$ort="";
$land="";
$forening="";
$ansluten="";
$epost="";

}

if($_POST['fler'])
{
#- Koppla upp till databasen
include "../include/conn.php"; // Databasanslutningen 

$adresstyp=$_POST['adresstyp'];

if (empty($forening))
{
}
else
{
  if (strlen($forening)<2)
  {
    echo("Kontrollera förening");
    exit;
  }
}

if (!eregi("^.+\@.+\..+$",$epost))
{
    echo?> <body bgcolor="#E2C8FB">Ogiltig e-postadress!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit;
}


if (empty($fnamn)) 
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i förnamnet!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (empty($enamn))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i efternamnet!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (empty($adress))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i postadress!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (strlen($postnummer)<5)
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i postnumret!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (empty($ort))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i din ort!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (empty($land))
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i ditt land!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif (strlen($fodelse)<4)
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i något av födelseåren eller angivit felaktigt format!!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}
elseif ($klass=="0")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i din klass!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif ($ansluten=="nej" && $status=="1")
{
 echo?> <body bgcolor="#E2C8FB">Föreningen måste vara ansluten till Friidrottsförbundet i tävlingsklass!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif ($avgift=="0" || $avgift == "undefined")
{
  echo?> <body bgcolor="#E2C8FB">Kontrollera din klass!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}



elseif ($starttid == "undefined")
{
  echo?> <body bgcolor="#E2C8FB">Kontrollera din klass!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif ($adresstyp == "")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i adresstyp!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit; 
}

elseif (empty($antal) || $antal=="0")
{
  echo?> <body bgcolor="#E2C8FB">Du glömde fylla i antal marknadslopp!</body>
  <? echo("<br>");
  echo("<br>");  
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit;
}


  $dubbel = mysql_query("SELECT * FROM $lopare WHERE fnamn='$fnamn' AND enamn='$enamn' AND adress='$adress' AND postnummer='$postnummer' AND ort='$ort' AND fodelse='$fodelse'");
  if(mysql_fetch_array($dubbel))
  {
    echo?> <body bgcolor="#E2C8FB">Du finns redan registrerad!</body>
  <? echo("<br>"); 
  echo("<br>"); 
  echo "<a href=\"JavaScript:history.go(-1);\">&#171 Tillbaka</a>";
  exit;
  }
 
mysql_query("INSERT INTO $lopare (id, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, antal, epost, datum, tid) VALUES ('', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$antal', '$epost', NOW(), NOW())");
 
$id = mysql_insert_id();

mysql_query("INSERT INTO $anmalda (loparid, fnamn, enamn, adress, postnummer, ort, land, adresstyp, forening, ansluten, fodelse, klass, avgift, starttid, antal, epost, betalt, datum, tid) VALUES ('$id', '$fnamn', '$enamn', '$adress', '$postnummer', '$ort', '$land', '$adresstyp', '$forening', '$ansluten', '$fodelse', '$klass', '$avgift', '$starttid', '$antal', '$epost', 'nej', NOW(), NOW())");

echo?> <font color="red" face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Vi har mottagit din anmälan och skickat ett mail med dina uppgifter!!</br></font>
<?
 
$fnamn = $_POST['fnamn'];
$enamn = $_POST['enamn'];
$adress = $_POST['adress'];
$postnummer = $_POST['postnummer'];
$ort = $_POST['ort'];
$land = $_POST['land'];
$klass = $_POST['klass'];
$fodelse = $_POST['fodelse'];
$avgift =$_POST['avgift'];


$message = <<<HTML

<html>
<head>
<title>HTML-mail</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>
  
<body style="text-align: left">
<table width="500" cellpadding="0" cellspacing="0" border="0" style="margin-right: auto; margin-left: auto">
<tr>
  <td>
    Tack för din anmälan till <b>Marknadssloppet 2006</b>!
    <br>
    <br>
    Vi har mottagit din anmälan där du uppgav följande uppgifter:
    <br>
    <br>
    Namn: <b>{$_POST['fnamn']} {$_POST['enamn']}</b>\r\n
    <br>
    Postadress: <b>{$_POST['adress']}</b>\r\n
    <br>
    Postnummer: <b>{$_POST['postnummer']}</b>\r\n
    <br>
    Ort: <b>{$_POST['ort']}</b>\r\n
    <br>
    Land: <b>{$_POST['land']}</b>\r\n
    <br>
    Förening: <b>{$_POST['forening']}</b>\r\n
    <br>
    Födelseår: <b>{$_POST['fodelse']}</b>\r\n
    <br>
    Klass: <b>{$_POST['klass']}</b>\r\n
    <br>
    <br>
    Ditt marknadslopps-id kan du använda när du vill anmäla dig till
    kommande år och gå in och kolla vilka uppgifter vi har registrerade,
    <br>
    <br>
    Ditt marknadslopps-id är:  <b>{$id} </b>\r\n
    <br>
    <br>
    Betalningen gör du genom att sätta in <b>{$_POST['avgift']} kr</b> på pg nr: <b>162 78 46-7</b> senast <b>fredagen den 23 juni.</b>\r\n
    Ange ditt marknadsloppsid som meddelande.\r\n
    <br>
    <br>
    <b>Lycka till i loppet önskar Frosta OK!</b>
  </td>
</tr>
</table>
</body>
</html>
HTML;
  
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: php\r\n";
$headers .= "From: Marknadsloppet <anmalan@marknadsloppet.nu>\r\n";
$headers .= "Bcc: anmalan@marknadsloppet.nu\r\n";
$headers .= "Reply-to: anmalan@marknadsloppet.nu\r\n";
$headers .= "Return-path: anmalan@marknadsloppet.nu\r\n"; 
$to = "<$epost>";
$subject = "Anmälan till marknadsloppet";

mail($to , $subject, $message, $headers);

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
<TABLE WIDTH="609" CELLSPACING="0" CELLPADDING="10" BORDER="0"  ALIGN="CENTER">
<TR VALIGN="top">
<TD WIDTH="465">

<form ACTION="<?php echo $PHP_SELF ?>" METHOD="post" id=form1 name=form1>
<table WIDTH="550" CELLSPACING="0" CELLPADDING="0" BORDER="0">
<tr height="30">
</tr>	
<tr>
  <td WIDTH="340">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Fyll i dina personuppgifter:</b></font>
   <br>
   <br>
  </td>	
</tr>

<tr>
  <td colspan ="5">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>
     <hr>
     <u>Instruktioner:</u>
     <br>
     <br>
     Föreningar, familjer och företag som registrerar flera löpare trycker på "Registrera många" för samtliga (även för den sista löparen)  och trycker därefter "Avsluta" när man är klar.
     <br>
     <br>
     Anmäler man bara 1 löpare trycker man på "Registrera en" och därefter "Avsluta"
   </b></font>
  <br>
  <br>
<tr>
  <td colspan="5">
    <hr>
  </td>
</tr>

<tr>
  <td WIDTH="340">
    <br>
    <table CELLSPACING="6" CELLPADDING="0" BORDER="0" WIDTH="100%">
    <tr>
      <td><font face="verdana" size="-2">förnamn (t.ex. Anders)</td>
      <td><input TYPE="Text" NAME="fnamn" value="" SIZE="30" MAXLENGTH="15">*</td>
    </tr>

    <tr>
      <td><font face="verdana" size="-2">efternamn (t.ex. Andersson)</td>
      <td><input TYPE="Text" NAME="enamn" value="" SIZE="30" MAXLENGTH="20">*</td>
    </tr>
		
    <tr>
      <td><font face="verdana" size="-2">postadress (t.ex. Alvägen 1)</td>
      <td><input TYPE="Text" NAME="adress" SIZE="30" MAXLENGTH="30" VALUE="<?=$adress?>">*</td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2">adresstyp</td>
      <td>
	<table>
	<tr>
	  <td><font face="verdana" size="-2">hem: </font></td>
	  <td><input TYPE="radio" NAME="adresstyp"  VALUE="hem" <? if ($adresstyp == "hem") echo(" checked"); ?>></td>
	</tr>
	<tr>
	  <td><font face="verdana" size="-2">företag/förening: </font></td>
	  <td><input TYPE="radio" NAME="adresstyp"  VALUE="företag/förening" <? if ($adresstyp == "företag/förening") echo(" checked"); ?>></td>
	</tr>
	</table>
      </td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2">postnummer (t.ex. 12345)</td>
      <td><input TYPE="Text" NAME="postnummer" SIZE="5" MAXLENGTH="5" VALUE="<?=$postnummer?>">*</td>
    </tr>
	
    <tr>
      <td><font face="verdana" size="-2">ort (t.ex. Löparby)</td>
      <td><input TYPE="Text" NAME="ort" SIZE="30" MAXLENGTH="30" VALUE="<?=$ort?>">*</td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2">land (t.ex. Sverige)</td>
      <td><input TYPE="Text" NAME="land" SIZE="30" MAXLENGTH="30" VALUE="Sverige">*</td>
    </tr>

    <tr>
      <td><font face="verdana" size="-2">förening (t.ex. Löpar IF)</td>
      <td><input TYPE="Text" NAME="forening" SIZE="30" MAXLENGTH="30" VALUE="<?=$forening?>"></td>
    </tr>

    <tr>
      <td><font face="verdana" size="-2">är föreningen ansluten till Friidrottsförbundet?<br>(gäller tävlingsklasser)</td>
      <td>
	<table>
	<tr>
	  <td><font face="verdana" size="-2">ja: </font></td>
	  <td><input TYPE="radio" NAME="ansluten"  VALUE="ja" <? if ($ansluten == "ja") echo(" checked"); ?>></td>
	</tr>
	
        <tr>
	  <td><font face="verdana" size="-2">nej: </font></td>
	  <td><input TYPE="radio" NAME="ansluten"  VALUE="nej" <? if ($ansluten == "nej") echo(" checked"); ?>></td>
	</tr>
	</table>
      </td>
    </tr>
	
    <tr>
      <td><font face="verdana" size="-2">e-postadress <br>
   </td>
      <td><input TYPE="Text" NAME="epost" SIZE="30" MAXLENGTH="70" VALUE="<?=$epost?>">*</td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2">födelseår (t.ex. 1980)</td>
      <td><input TYPE="Text" NAME="fodelse" SIZE="4" MAXLENGTH="4" VALUE="">*</td>
    </tr>
    					
    <tr>
      <td><font face="verdana" size="-1"><b>Välj din klass:</b></td>
      <td>    
        <table border = "0">
        <tr>  
          <td><? echo '<select name="klass" onChange="(this.form.avgift.value=this.options[this.selectedIndex].avgift, this.form.status.value=this.options[this.selectedIndex].status, this.form.starttid.value=this.options[this.selectedIndex].starttid)">'; 
                 echo '<option value="0" avgift="" starttid="">--- Välj här ---</option>'; 

                 #- Koppla upp till databasen
                 include "../include/conn.php"; // Databasanslutningen 
                  
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
      <td><input TYPE="Text" NAME="antal" SIZE="4" MAXLENGTH="4" VALUE="">*</td>
    </tr>
    
    <tr>
      <td><font face="verdana" size="-2"></td>
      <td><input TYPE="hidden" NAME="status" SIZE="4" MAXLENGTH="4" VALUE="" readonly></td>
    </tr>

    <tr>
      <td COLSPAN="2" NOWRAP>* = obligatorisk uppgift</td>
    </tr>

    <tr>
      <td><input TYPE="submit" value="» registrera många" name="fler"></td>
      <td><input TYPE="submit" value="» registrera en" name="spara"></td>
      
    </tr>

    <tr>
      <td><input TYPE="submit" value="» avsluta" name="exit"></td>
    </tr>

    
    </table>
  </td>
</tr>
</table>
</form>

<tr>
      
    <td>
      <form ACTION="/admin/main.php" METHOD="post">  
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <input type="submit" value="<< tillbaka">
      </form>
    </td>
      
    </tr>

</TD>
</TR>
</TABLE>
</BODY>
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


     