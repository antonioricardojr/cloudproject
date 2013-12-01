<!DOCTYPE HTML>

<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
	

</head>
<body>

<form method="post" class="well">	
		<input name="location" type="text" class="span3" placeholder="Enter your city" /><br/>
		<button class="btn btn-primary">Search Weather</button>
</form>
	
<?php

// //Yahoo! application ID
$appId = "5cHUpHrIkY31Hwc7X8Kr9t9fZ7Xg15OoBcKcTuXz2l8IOgrlQfxb55PNcrimKpUf";

if(isset($_POST["location"]) and $_POST["location"] != ""){

	$location = $_POST["location"];
	$location = str_replace(' ', '+', $location);
	if($location != null){

	$request = "http://where.yahooapis.com/v1/places.q('" . $location . "')?appid=" . $appId;

	$xml_request = simplexml_load_file($request);

	$item = $xml_request->children();		
	$a_item = $item[0];
		



	$count = 0;

	foreach ($a_item as $second_gen){
		if($count == 0){
			$WOEID = $second_gen;
			$count = $count + 1;
		}
	
	}
	$forecast = "http://weather.yahooapis.com/forecastrss?w=" . $WOEID . "&u=c";
	$xml=simplexml_load_file($forecast);
	
} else {

}

echo "<br/> -------- <br/>";

//return the same xml object
$xml_child = $xml->children();
$second_xml_child = $xml_child->children();

$title = $second_xml_child[0];
$link = $second_xml_child[1];
$description = $second_xml_child[2];
$language = $second_xml_child[3];
$lastBuildDate = $second_xml_child[4];
$ttl = $second_xml_child[5];
$image = $second_xml_child[6];
$item = $second_xml_child[7];


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
}
?> 
	<script src="js/boostrap.js"></script>

</body>
</html>