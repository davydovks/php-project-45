<?php

namespace BrainGames\Games\Brain\Calc;

use function BrainGames\Engine\runGame;

function getQnAForCalc(int $count): array
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $count; $i++) {
        $number1 = rand(1, 30);
        $number2 = rand(1, 30);
        $operationNum = rand(1, 3);
        switch ($operationNum) {
            case 1: // +
                $questions[] = $number1 . ' + ' . $number2;
                $answers[] = $number1 + $number2;
                break;
            case 2: // *
                $questions[] = $number1 . ' * ' . $number2;
                $answers[] = $number1 * $number2;
                break;
            case 3: // -
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
