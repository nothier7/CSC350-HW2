<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the inputs
    $num1 = $_POST["num1"];
    $op1 = $_POST["op1"];
    $num2 = $_POST["num2"];
    $op2 = $_POST["op2"];
    $num3 = $_POST["num3"];

    // Validate that inputs are numbers and operators are valid
    if (!is_numeric($num1) || !is_numeric($num2) || !is_numeric($num3)) {
        echo "ERROR: Invalid number input!";
        exit;
    }

    $valid_operators = ['+', '-', '*', '/'];
    if (!in_array($op1, $valid_operators) || !in_array($op2, $valid_operators)) {
        echo "ERROR: Invalid operator!";
        exit;
    }

    // Handle multiplication and division first (operator precedence)
    if ($op1 == '*' || $op1 == '/') {
        if ($op1 == '*') {
            $result = $num1 * $num2;
        } elseif ($op1 == '/') {
            if ($num2 == 0) {
                echo "ERROR: Division by zero!";
                exit;
            }
            $result = $num1 / $num2;
        }
        // Then apply the second operator
        if ($op2 == '+') {
            $result += $num3;
        } elseif ($op2 == '-') {
            $result -= $num3;
        } elseif ($op2 == '*') {
            $result *= $num3;
        } elseif ($op2 == '/') {
            if ($num3 == 0) {
                echo "ERROR: Division by zero!";
                exit;
            }
            $result /= $num3;
        }
    } else {
        // Handle addition or subtraction first, then apply multiplication or division
        if ($op1 == '+') {
            $result = $num1 + $num2;
        } elseif ($op1 == '-') {
            $result = $num1 - $num2;
        }

        if ($op2 == '*') {
            $result *= $num3;
        } elseif ($op2 == '/') {
            if ($num3 == 0) {
                echo "ERROR: Division by zero!";
                exit;
            }
            $result /= $num3;
        } elseif ($op2 == '+') {
            $result += $num3;
        } elseif ($op2 == '-') {
            $result -= $num3;
        }
    }

    // Output the result
    echo "Result: " . $result;
}
?>
