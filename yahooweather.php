<!DOCTYPE HTML>

<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
	

</head>
<body>

<form method="post" class="well">	
		<input name="WOEID" type="text" class="span3" placeholder="Enter your location" /><br/>
		<button class="btn btn-primary">Search Weather</button>
	</form>
	
	
	

<?php

$WOEID = $_POST["WOEID"];

if($WOEID != null){
$forecast = "http://weather.yahooapis.com/forecastrss?w=" . $WOEID . "&u=c";
$xml=simplexml_load_file($forecast);
}

echo "<br/> -------- <br/>";

//return the same xml object
$xml_child = $xml->children();




$title = $xml_child->children()[0];
$link = $xml_child->children()[1];
$description = $xml_child->children()[2];
$language = $xml_child->children()[3];
$lastBuildDate = $xml_child->children()[4];
$ttl = $xml_child->children()[5];
$image = $xml_child->children()[6];
$item = $xml_child->children()[7];


foreach ($item as $second_gen) { 
		//echo $second_gen->getName();
		//echo '<br>';
		print ($second_gen);
		echo '<br>';
     
 }

echo "--------<br>";


echo "title <br>"; 
print ($title);
echo "<br>";
echo " link <br>";
print ($link);
echo "<br>";
echo "description <br>";
print ($description);
echo "<br>";
echo "language <br>";
print ($language);
echo "<br>";
echo "lastBuildDate <br>";
print ($lastBuildDate);
echo "<br>";
echo "ttl <br>";
print ($ttl);
echo "<br>";
echo "image <br>";
print ($image);
echo "<br>";
echo "item <br>";
print ($item);

echo "--------<br>";




// yahoo geo 
 
  
?> 

<?php
require("oauth.php");

$url = "http://yboss.yahooapis.com/geo/placefinder";
$cc_key  = "dj0yJmk9YXdhVkZ6RFhtUW5XJmQ9WVdrOVRXdFZjWFJOTnpBbWNHbzlOemMzT0RJd056WXkmcz1jb25zdW1lcnNlY3JldCZ4PTBm";
$cc_secret = "919f0f3f4f001074dd9c20402887085cfd1e52aa";

$args = array();
$args["q"] = "701+first+avenue+sunnnyvale";

$consumer = new OAuthConsumer($cc_key, $cc_secret);
$request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url,
$args);
$request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);

$url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
$ch = curl_init();
$headers = array($request->to_header());
curl_setopt($ch,CURLOPT_ENCODING , "gzip"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//print_r("Request Headers\n");
//print_r($headers);

$rsp = curl_exec($ch);

//print_r("\nHere is the XML response for Placefinder\n");
//print_r($rsp);

?> 


	<script src="js/boostrap.js"></script>

</body>


</html>