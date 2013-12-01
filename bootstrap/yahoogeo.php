<!DOCTYPE HTML>
<html>

<head>

</head>
<body>


<?php


$request = "http://where.yahooapis.com/geocode?q=1600+Pennsylvania+Avenue,+Washington,+DC
&appid=nD9Y3OPV34GXQ_1IWo8_tbQ9Sg6c9gnMashV.Z4VD_B0uQ39uIzLw09XEWfpPAGQvL8Q.u4AlwB6rVTIl5gLmz44QDVyXZY-";

$xml=simplexml_load_file($request);

print gettype($xml);




?>

</body>

</html>
