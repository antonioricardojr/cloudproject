<html>

<body>

<form action="" method="post">
	<input type="text" name="num"><br>
	<input type = "submit" value="number" />
</form>

<?php

$num = $_POST['num'];

//set_time_limit(0);
//$start = microtime(true);

function isPrime($x){
for($i = 2; $i <= pow($x, (1/2)); $i++) {
   //if $i is a divisor of $num, then the number is not prime
   if($x % $i == 0) {
      return false;
   }
}
return true;

}

if( $num != NULL){

if(isPrime($num)){
    echo $num . " is prime!</br>";
}else{
	echo $num . " is not prime!</br>";
}

}

//first prime

function firstPrimeTwelveDigits(){
		
	for($i = 100000000000 ; $i <= 999999999999 ; $i++){
		if(isPrime($i) and strlen( (string) $i ) >= 12){
			return $i;
			exit;
		}
		
	} 	
	
}



set_time_limit(0);
$time_start = microtime(true);
// Find first prime number
$firstPrime = firstPrimeTwelveDigits();
$time_end = microtime(true);
$time = $time_end - $time_start;

	
echo $firstPrime . " is the first prime with 12 digits! </br>";
echo $time;


?>

</body>

</html>