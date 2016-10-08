<?php

$server="localhost";
//$server="";

//$db="catalog";
$db="container";

$user="root";
//$user="";

$pwd="";
//$pwd="";

$dbhandle = mysql_connect($server, $user, $pwd)
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
$selected = mysql_select_db($db,$dbhandle);
$result = mysql_query("SELECT * FROM orders");
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
  echo "<pre>";
  print_r($row);
  exit;
}


?>