<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\runGame;
use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'What is the result of the expression?';

function getQnA(int $num1, int $num2, string $operation): array
{
    switch ($operation) {
        case '+':
            $question = $num1 . ' + ' . $num2;
            $answer = $num1 + $num2;
            break;
        case '*':
            $question = $num1 . ' * ' . $num2;
            $answer = $num1 * $num2;
            break;
        case '-':
            if ($num1 < $num2) {
                $temp = $num1;
                $num1 = $num2;
                $num2 = $temp;
            }
            $question = $num1 . ' - ' . $num2;
            $answer = $num1 - $num2;
            break;
        default:
            throw new \Exception("Unknown operation: '${operation}'!");
    }

    return [$question, $answer];
}

function getQnAForCalc(int $count): array
{
    $operations = ['+', '*', '-'];
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $count; $i++) {
        $num1 = rand(1, 30);
        $num2 = rand(1, 30);
        $operation = $operations[rand(0, 2)];
        [$questions[], $answers[]] = getQnA($num1, $num2, $operation);
    }

    return [$questions, $answers];
}

function runCalc(int $count = ROUND_COUNT)
{
    $QnA = getQnAForCalc($count);
    runGame(TASK, $QnA, $count);
}
