<!DOCTYPE HTML>

<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
	

</head>
<body>

<form method="post" class="well">	
		<input name="location" type="text" class="span3" placeholder="Enter your location" /><br/>
		<button class="btn btn-primary">Search Weather</button>
	</form>
	
<?php

// //Yahoo! application ID
$appId = "5cHUpHrIkY31Hwc7X8Kr9t9fZ7Xg15OoBcKcTuXz2l8IOgrlQfxb55PNcrimKpUf";

$location = $_POST["location"];

if($location != null){

$request = "http://where.yahooapis.com/v1/places.q('" . $location . "')?appid=" . $appId;

$xml_request = simplexml_load_file($request);

$item = $xml_request->children()[0];
$count = 0;

foreach ($item as $second_gen){
	if($count == 0){
		$WOEID = $second_gen;
		$count = $count + 1;
	}
}

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
echo "--------<br>";
  
?> 
	<script src="js/boostrap.js"></script>

</body>
</html>