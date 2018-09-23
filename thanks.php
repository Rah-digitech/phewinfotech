<?php

session_start();

if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{
$name			=$_REQUEST['txtNames'];
$email1			=$_REQUEST['txtEmails'];
$mobile			=$_REQUEST['txtMobiles'];
$sub			=$_REQUEST['subject'];
$message		=$_REQUEST['txtQueries'];



$message1="<font><b>Business Enquiry red-pixels.com</b></font><br>";
$message1.="<br><b>Name :</b><font color='blue'>&nbsp;".$name."</font>";
$message1.="<br><b>Email Id. :</b><font color='blue'>&nbsp;".$email1."</font>";
$message1.="<br><b>Mobile. :</b><font color='blue'>&nbsp;".$mobile."</font>";
$message1.="<br><b>Email Id. :</b><font color='blue'>&nbsp;".$sub."</font>";
$message1.="<br><b>Message :</b><font color='blue'>&nbsp;".$message."</font>";

$email="info.redpix@gmail.com";



$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: noreply@red-pixels.com'. " \r\n";

$res= mail($email,'Business enquiry From red-pixels.com ',$message1,$headers);


$msg='<img src="img/thanks.jpg" class="img-responsive img-thumbnail" alt=""><h4 style="color:#000;">';
	

} else {

$msg='<h3 style="color:#FF0000">Please Enter Correct Captcha Code. </h3>';
}
?>


<!DOCTYPE html>
<html xml:lang="en-US" lang="en-US" dir="ltr">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Graphic | Web Designing | Multimedia Training Course in Delhi (Laxmi Nagar)</title>
    <meta name="description" content="Delhi's Best Multimedia Training Institute for Graphic, Web Designing, Desktop Publishing-DTP, C, C++, Java, Sketching, Painting, Photoshop, Illustrator, Indesign, CorelDraw, AutoCAD, Audio/Video Editing.">
    <meta name="keywords" content="red pixels, red pixels contact, contact us, call us, red pixels direction">
	<meta name="abstract" content="Graphic, Web design course with 100% Job placement. Join industry best graphic design course taday." />
    <meta name="author" content="www.red-pixels.com">
	
	<link rel="canonical" href="https://www.red-pixels.com/red-pixels-contact"/>
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
</head>
<body>

<div class="container"><br><br>
<center><?=$msg?></center>	
</div>   
 
<script>
setTimeout(function() {
  window.location.href = "http://www.red-pixels.com/";
}, 4000);
</script>
 
</body>
</html>