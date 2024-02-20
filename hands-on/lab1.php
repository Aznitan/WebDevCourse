<html>
<head>
    <title>Lab 1</title>
</head>

<body>
 <h1>Lab 1</h1>   


<?php
echo "<h2 style = 'text-align:center'>Part 1: one tree displayed.</h2>";
echo "<div style = ' width:50%; margin:auto; background-color:slategray;text-align:center;color:maroon;line-height:0.5' >";
drawTree();    
echo "</div>";
echo "<hr>";
?>


<?php
echo "<h2 style = 'text-align:center'>Part 2: four trees displayed.</h2>";
echo "<table style ='background-color:navy; color:navy; width:75%; margin:auto;' >";
    echo "<tr>";
        for($i=0;$i<4;$i++){
        echo "<td>";
            echo "<div style = ' width:50%; margin:auto; background-color:navy;color:mintcream;text-align:center;line-height:0.5' >";
            drawTree();
            echo "</div>";
        echo "</td>";
    }
    echo "</tr>";
echo "</table>";
echo "<hr>";
?>


<?php
echo "<h2 style = 'text-align:center'>Part 3: When you refresh the page, different number (from 1-8)
    of trees displayed.</h2>";
$randomNumber = rand (1,8);
echo "<table style ='background-color:teal; color:teal; width:100%; margin:auto;' >";
    echo "<tr>";
        for ($i=0;$i < $randomNumber ; $i++){
            echo "<td>";
            echo "<div style = ' width:75%; margin:auto; background-color:teal;color:snow;text-align:center;line-height:0.5' >";
            drawTree();
            echo "</div>";
            echo "</td>";
        }
    echo "</tr>";
echo "</table>";
echo "<hr>";
?>


<?php
    function drawTriangles($top, $bottom, $symbol){
        for ($row = $top-1; $row < $bottom ; $row++){
                for ($x= 0; $x < $row; $x++)
                    echo $symbol;
            echo "<br>";
        }
    }

    function drawSquare($length, $width , $symbol){
        for ($row = 0; $row < $width ;$row++){
            for ($x =0; $x < $length; $x++)
                echo $symbol;
            echo "<br>";
        }
    }

    function drawTree(){
        drawTriangles(1,6,"*");
        drawTriangles(3,10,"*");
        drawTriangles(5,15,"*");
        drawSquare(5,5,"*");
        echo "<br>";
    }

  
?>



<p>Submitted by Luis Fabela</p>
</body>
</html>