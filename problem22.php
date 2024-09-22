<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 2 Problem 2</title>
</head>
<body>
    <h2>Homework 2 Problem 2 </h2>

    <form method="POST" action="">
        <input type="text" name="num1" required>
        <input type="text" name="op1" required>
        <input type="text" name="num2" required>
        <input type="text" name="op2" required>
        <input type="text" name="num3" required>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $op1 = $_POST["op1"];
        $num2 = $_POST["num2"];
        $op2 = $_POST["op2"];
        $num3 = $_POST["num3"];
        $result = 0;
        
        if (is_numeric($num1) && is_numeric($num2) && is_numeric($num3)) {
            $valid_operators = ['+', '-', '*', '/'];
            if (in_array($op1, $valid_operators) && in_array($op2, $valid_operators)) {
                if ($op1 == '*' || $op1 == '/') {
                    if ($op1 == '*') {
                        $intermediateResult = $num1 * $num2;
                    } else {
                        $intermediateResult = $num1 / $num2;
                    }  
                    if ($op2 == '*' || $op2 == '/') {
                        if ($op2 == '*') {
                            $result = $intermediateResult * $num3;
                        } else {
                            $result = $intermediateResult / $num3;
                        }
                    } elseif ($op2 == '+' || $op2 == '-') {
                        if ($op2 == '+') {
                            $result = $intermediateResult + $num3;
                        } else {
                            $result = $intermediateResult - $num3;
                        }
                    }
                } elseif ($op2 == '*' || $op2 == '/') {
                    if ($op2 == '*') {
                        $intermediateResult = $num2 * $num3;
                    } else {
                        $intermediateResult = $num2 / $num3;
                    }
                    if ($op1 == '+') {
                        $result = $intermediateResult + $num1;
                    } else {
                        $result = $num1-$intermediateResult;
                    }
                } else {
                    if ($op1 == '+') {
                        $result = $num1 + $num2;
                    } else {
                        $result = $num1 - $num2;
                    }
                    if ($op2 == '+') {
                        $result += $num3;
                    } else {
                        $result -= $num3;
                    }
                }

                print "Result: " . $result;
            } else {
                print "ERROR: Valid operators are +, -, *, /.";
            }
        } else {
            print "ERROR: All inputs must be numbers.";
        }
    }
    ?>
</body>
</html>
