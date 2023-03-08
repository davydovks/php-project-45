<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\runGame;
use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'What is the result of the expression?';

function runCalc(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];
    $operations = ['+', '*', '-'];

    for ($i = 0; $i < $count; $i++) {
        $num1 = rand(1, 30);
        $num2 = rand(1, 30);
        $operation = $operations[rand(0, 2)];
        $question = implode(' ', [$num1, $operation, $num2]);
        eval("\$answer = {$question};"); 

        $questions[] = $question;
        $answers[] = $answer;
    }

    runGame(TASK, [$questions, $answers], $count);
}
