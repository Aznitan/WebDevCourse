<html>
<head>
<title> First Activity </title>
</head>
<body>
<h1> Activity 1 - Jan 9, 2024 </h1>
<hr>
<?php
     echo "<span style = 'color:red;'>My first php activity </span>";

?>
<h2> Some additional PHP code</h2>

<?php
	// This is single line comment
	$school = "GGC";
	echo "I like ".$school."!<br>";
	/*
	This is a block 
	comment
	*/

	// about numbers 

	$n= 1234.5678 ;
	echo "This number is ".$n."<br>";
	printf("The number in float is: %f <br>",$n);
	printf("The number in float with 3 digit decimal point is : %.3f",$n);

?>
<h2>If-Else</h2>
<?php
	$t = date("H"); // return time in 24 hour format
	echo "The time is: ".$t."<br";
	if($t < 10) {
		echo "Have a good morning! <br>";
	} elseif ($t<20){
		echo "Have a good day <br>";
	}
	else{
		echo "Good night!<br>";
	}

?>


<p> Submited by Luis Fabela </p>
</body>
</html>