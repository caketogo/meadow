<?php
//echo 'www.voodoosms.com/vapi/server/sendSMS?dest="somevalue"&orig="somevalue"&msg="somevalue for the Message"&uid="somevalue"&pass="somevalue"&validity="1"&format="php"&cc="countrycode"&tz="time zone"&sd="date and time in future"';

//echo 'www.voodoosms.com/vapi/server/sendSMS?dest=9994558325,9626542332&orig=HIP-Container&msg=This+is+a+test+SMS&uid=smsmanagement&pass=qtij32g&validity=1&format=php&cc=44&tz=+1&sd=2016-12-07T11:15';


$url = "www.voodoosms.com/vapi/server/sendSMS";
//Post variable names should be same as mentioned below example and its case
sensitive as well
$getString .="?dest=9994558325&";
$getString .="orig=Container-API&";
$getString .="msg=".urlencode("Testing The Container SMS API section")."&";
$getString .="uid=smsmanagement&";
$getString .="pass=qtij32g&";
$getString .="validity=1";
$ch = curl_init();
//set the url, GET data
curl_setopt($ch,CURLOPT_URL, $url.$getString);
curl_setopt($ch,CURLOPT_HTTPGET,1); //default
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
//execute post
$result = curl_exec($ch);
echo($result);
//close connection
curl_close($ch);			
?>

	