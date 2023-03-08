<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'What is the result of the expression?';
const MAX_NUMBER = 30;

function runCalc(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];
    $operations = ['+', '*', '-'];

    for ($i = 0; $i < $count; $i++) {
        $num1 = rand(1, MAX_NUMBER);
        $num2 = rand(1, MAX_NUMBER);
        $operation = $operations[rand(0, count($operations) - 1)];
        $question = implode(' ', [$num1, $operation, $num2]);
        eval("\$answer = {$question};");

        $questions[] = $question;
        $answers[] = $answer;
    }

    runGame(TASK, $questions, $answers, $count);
}
