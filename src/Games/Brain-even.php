<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function runEven(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];

    for ($i = 0; $i < $count; $i++) {
        $number = rand(1, 20);
        $questions[] = $number;
        $answers[] = ($number % 2 === 0) ? "yes" : "no";
    }

    runGame(TASK, $questions, $answers, $count);
}
