<html>
<head>
<title>Activity 4 Jan 23</title>
</head>
<body>
 <h1>Activity 4</h1>   
<p>Submitted by Luis Fabela</p>

<h2>Variable Scope</h2>
<?php
    // global variable 
    $x = 10;
    echo "The value of my global variable x is ".$x.".<br>";

    function myFunction(){
        // access the global variable inside a function
        echo "Access the global variable x inside a function".$x;
        echo " will generate a warning massage<br>";

        global $x;
        echo "Access the global variable x, the value is ".$x."<br>";

        $y = 20;
        echo "The value of the local variable y is ".$y."<br>";

    }

    myFunction();
    echo "Access the local variable y outside of the fucntion".$y;
    echo "will generate a warningn massage. <br>";
?>

<h2>Using Looping to Build Tables</h2>
<p>Table 1</p>

<?php
echo "you can access global variables from another section of php code <br>";
echo "The value of x is ".$x."<br>";

$rowSize = 8;
$colSize = 8;
$alternate=0;
echo "<table border= '1' style ='width:20%;margin:auto;' >";
    for ($i = 0 ; $i< $rowSize ; $i++){
        echo "<tr>";
            for ($j=0;$j<$colSize;$j++){
                if($j%2 == $alternate)
                   echo "<td style = 'background-color:white'>"; 
                else
                   echo "<td style = 'background-color:black'>";
                echo $j;
                echo "</td>";
            }
            $alternate =!$alternate;
        echo "</tr>";
    }
echo "</table>";

echo "<p>Table 2</p>";
echo "<table border= '1' style ='width:20%;margin:auto;' >";
    for ($i = 0 ; $i< $rowSize ; $i++){
        echo "<tr>";
            for ($j=0;$j<$colSize;$j++){
                if($j%2 == $alternate)
                   echo "<td style = 'background-color:black'>"; 
                else
                   echo "<td style = 'background-color:white'>";
                echo $j;
                echo "</td>";
            }
            $alternate =!$alternate;
        echo "</tr>";
    }
echo "</table>";
?>

<hr>
<p>Table 3</p>
<?php
$rowSize = 18;
$colSize = 18;
$alternate=0;
echo "<table border= '1' style ='width:40%;margin:auto;' >";
    for ($i = 0 ; $i< $rowSize ; $i++){
        echo "<tr>";
            for ($j=0;$j<$colSize;$j++){
                if(($i+$j)%3 == 0)
                   echo "<td style = 'background-color:red'>"; 
                elseif(($i+$j)%3 == 1)
                   echo "<td style = 'background-color:green'>";
                else
                   echo "<td style = 'background-color:blue'>";
                echo "&nbsp";
                echo "</td>";
            }
    
        echo "</tr>";
    }
echo "</table>";

?>
<hr>
<p>Table 4: Four different colors</p>
<?php
$rowSize = 18;
$colSize = 18;
$alternate=0;
echo "<table border= '1' style ='width:40%;margin:auto;' >";
    for ($i = 0 ; $i< $rowSize ; $i++){
        echo "<tr>";
            for ($j=0;$j<$colSize;$j++){
                if(($i+$j)%4 == 0)
                   echo "<td style = 'background-color:red'>"; 
                elseif(($i+$j)%4 == 1)
                   echo "<td style = 'background-color:green'>";
                elseif(($i+$j)%4 == 2)
                   echo "<td style = 'background-color:cyan'>";
                else
                   echo "<td style = 'background-color:blue'>";
                echo "&nbsp";
                echo "</td>";
            }
    
        echo "</tr>";
    }
echo "</table>";

?>


<hr>
<p>Table 5: Any number of colors</p>
<?php
//$rowSize = 18;
//$colSize = 18;
$n= 6; // this defines the numbe of colors we want 
$myColor=array("red","green","blue","yellow","cyan","magenta");

echo "<table border= '1' style ='width:40%;margin:auto;' >";
    for ($i = 0 ; $i< $rowSize ; $i++){
        echo "<tr>";
            for ($j=0;$j<$colSize;$j++){
                /*if(($i+$j)%3 == 0)
                   echo "<td style = 'background-color:red'>"; 
                elseif(($i+$j)%3 == 1)
                   echo "<td style = 'background-color:green'>";
                else
                   echo "<td style = 'background-color:blue'>";
                */
                for ($k=0; $k<$n;$k++)
                    if(($i+$j)%$n == $k)
                         echo "<td style = 'background-color:".$myColor[$k]."'>";

                echo "&nbsp";
                echo "</td>";
            }
    
        echo "</tr>";
    }
echo "</table>";

?>


</body>
</html>