<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'What is the result of the expression?';
const MAX_NUMBER = 30;
const MIN_NUMBER = 1;

function getCalcAnswer(int $num1, string $operation, int $num2)
{
    switch ($operation) {
        case '+':
            $answer = $num1 + $num2;
            break;
        case '*':
            $answer = $num1 * $num2;
            break;
        case '-':
            $answer = $num1 - $num2;
            break;
        default:
            throw new \Exception("Unknown operation: '${operation}'!");
    }

    return $answer;
}

function startGame(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];
    $operations = ['+', '*', '-'];

    for ($i = 0; $i < $count; $i++) {
        $num1 = rand(MIN_NUMBER, MAX_NUMBER);
        $num2 = rand(MIN_NUMBER, MAX_NUMBER);
        $operation = $operations[array_rand($operations)];
        $questions[] = implode(' ', [$num1, $operation, $num2]);
        $answers[] = getCalcAnswer($num1, $operation, $num2);
    }

    runGame(TASK, $questions, $answers, $count);
}
