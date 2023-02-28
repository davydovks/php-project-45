<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\runGame;

function getQnAForCalc(int $count): array
{
    $operations = ['+', '*', '-'];
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $count; $i++) {
        $number1 = rand(1, 30);
        $number2 = rand(1, 30);
        $operation = $operations[rand(0, 2)];
        switch ($operation) {
            case '+':
                $questions[] = $number1 . ' + ' . $number2;
                $answers[] = $number1 + $number2;
                break;
            case '*':
                $questions[] = $number1 . ' * ' . $number2;
                $answers[] = $number1 * $number2;
                break;
            case '-':
                if ($number1 < $number2) {
                    $temp = $number1;
                    $number1 = $number2;
                    $number2 = $temp;
                }
                $questions[] = $number1 . ' - ' . $number2;
                $answers[] = $number1 - $number2;
                break;
        }
    }

    return [$questions, $answers];
}

function runCalc(int $count = 3)
{
    $task = 'What is the result of the expression?';
    $QnA = getQnAForCalc($count);
    runGame($task, $QnA, $count);
}
