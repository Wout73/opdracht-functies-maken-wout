<?php

function getNumber(string $prompt): float
{
    while (true) {
        $input = trim(readline($prompt));

        if (is_numeric($input)) {
            return (float) $input;
        }

        echo "Enter a valid number.\n";
    }
}

function getOperation(): string
{
    $operations = ['+', '-', '*', '/'];

    while (true) {
        $operation = trim(readline("Choose an operation (+, -, *, /): "));

        if (in_array($operation, $operations, true)) {
            return $operation;
        }

        echo "Enter one of the listed operations.\n";
    }
}

function calculate(float $num1, float $num2, string $operation): float
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            if ($num2 == 0.0) {
                throw new InvalidArgumentException("Cannot divide by zero.");
            }

            return $num1 / $num2;
        default:
            throw new InvalidArgumentException("Unsupported operation.");
    }
}

while (true) {
    $num1 = getNumber("Enter first number: ");
    $operation = getOperation();
    $num2 = getNumber("Enter second number: ");

    try {
        $result = calculate($num1, $num2, $operation);
        echo "Result: $result\n";
    } catch (InvalidArgumentException $exception) {
        echo "Error: " . $exception->getMessage() . "\n";
    }
}

?>
