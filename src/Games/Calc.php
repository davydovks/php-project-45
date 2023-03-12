<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'What is the result of the expression?';
const MAX_NUMBER = 30;
const MIN_NUMBER = 1;

function runCalc(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];
    $operations = ['+', '*', '-'];

    for ($i = 0; $i < $count; $i++) {
        $num1 = rand(MIN_NUMBER, MAX_NUMBER);
        $num2 = rand(MIN_NUMBER, MAX_NUMBER);
        $operation = $operations[rand(0, count($operations) - 1)];
        $question = implode(' ', [$num1, $operation, $num2]);
        $questions[] = $question;
        eval("\$answers[] = {$question};");
    }

    runGame(TASK, $questions, $answers, $count);
}
