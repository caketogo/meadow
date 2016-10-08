<?php
echo date_default_timezone_get();
$sendgrid_apikey ='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';
//$sendgrid = new SendGrid($sendgrid_apikey);
$st = strtotime("+5 min");
$url = 'https://api.sendgrid.com/'; 
$template_id = '0af32410-3977-4618-b53b-e70fd4c23baa';
$js = array(
  'to' => array("jeyakannan@securenext.net","muthaiah@securenext.net","murugan@securenext.net"),
  'sub' => array(':name' => array('Jeyakannan','muthaiah','murugan')),
  'send_at'=>$st,
  'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $template_id)))
);
$to = array("jeyakannan@securenext.net","muthaiah@securenext.net","murugan@securenext.net");
$toname =array("jeyakannan","muthaiah","murugan");
//echo json_encode($js);
$params = array(
	'to' => array("jeyakannan@securenext.net","muthaiah@securenext.net","murugan@securenext.net"),
	'from'      => "dx@sendrid.com",
    'fromname'  => "DX Team",
    'subject'   => "PHP Test", 
    'text'      => "I'm text!",
    'html'      => "<strong>I'm HTML!</strong>",
    'x-smtpapi' => json_encode($js),
  );
$request =  $url.'v3/templates';
$session = curl_init($request);
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
//curl_setopt ($session, CURLOPT_POST, true);
//curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);
echo "<pre>";
print_r($response);


/*$params = array(
    'api_user'        => "Snsmail", 
    'api_key'    => "Saranmnsr124",
    'start_date'      => "2013-01-01",
    'end_date'  => "2017-05-05",
	'data_type' =>'global'
	
   
  );
  
$request =  $url.'api/stats.getAdvanced.json';
$session = curl_init($request);
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);
$s= json_decode($response, true);
echo "<pre>";
print_r($s);
exit;*/


