<html >
<head>
    <title>Lab 2</title>
</head>
<body>
<h1 style = 'text-align :center'>Lab2</h1>   
<p style = 'text-align :center'>Submitted by Luis Fabela</p>

<h2>Lab2 display a multiplication table of random size from 5*5 to 20*20</h2>
<?php

$x=rand(5,20);

$rowSize= $x; 
$colSize =$x;
$alternate=0;
echo "<table border= '1' style ='width:40%;margin:auto;' >";
echo "This is a multiplication table of ".$x."*".$x."<br>";
    for ($i = 1 ; $i<= $rowSize ; $i++){
        echo "<tr>";
            for ($j=1;$j<=$colSize;$j++){
                $product = $i * $j;
                if($i%2 == 0)
                   echo "<td style = 'background-color:lightblue' >"; 
                else
                   echo "<td style = 'background-color:lightgreen'>";
                echo $product;
                echo "</td>";
            }
            
            $alternate =!$alternate;
        echo "</tr>";
    }
?>

    
</body>
</html>