<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\runGame;

const TASK = 'What is the result of the expression?';

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
            default:
                throw new \Exception("Unknown operation: '${operation}'!");
        }
    }

    return [$questions, $answers];
}

function runCalc(int $count = 3)
{
    $QnA = getQnAForCalc($count);
    runGame(TASK, $QnA, $count);
}
