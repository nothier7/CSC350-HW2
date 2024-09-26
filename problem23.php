<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 2 Problem 3</title>
    <style>
        table {
            border-collapse: collapse;
            font-family: Arial;
        }
        td {
            padding: 0 5px; 
            margin: 0;
            text-align: center;
        }
        .edge {
            color: pink; 
        }
        .middle {
            color: black; 
        }
    </style>
</head>
<body>

<?php
$size = 9; 

if ($size % 2 != 0 && $size >= 5) {
    echo "<table>"; 

    for ($i = 0; $i < $size; $i++) {
        echo "<tr>";

        for ($j = 0; $j < $size; $j++) {
            
            
            if (($i == 0 && $j == 0) || ($i == $size - 1 && $j == $size - 1)) {
                echo "<td class='edge'>/</td>";
            }
            
            elseif (($i == 0 && $j == $size - 1) || ($i == $size - 1 && $j == 0)) {
                echo "<td class='edge'>\\</td>";  
            }
            
            elseif ($i == 0) {
                echo "<td class='edge'>-</td>"; 
            } elseif ($i == $size - 1) {
                echo "<td class='edge'>_</td>";
            }
            
            elseif ($j == 0 || $j == $size - 1) {
                echo "<td class='edge'>|</td>";
            }
            
            elseif ($i == ($size - 1) / 2 && $j == ($size - 1) / 2) {
                echo "<td class='middle'>+</td>"; 
            }
            
            elseif ($j == ($size - 1) / 2) {
                echo "<td class='middle'>|</td>"; 
            }
            
            elseif ($i == ($size - 1) / 2) {
                echo "<td class='middle'>-</td>"; 
            }
            
            else {
                echo "<td> </td>"; 
            }
        }

        echo "</tr>"; 
    }

    echo "</table>"; 
}
?>

</body>
</html>
