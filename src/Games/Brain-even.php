<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\runGame;
use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function getQnAForEven(int $count): array
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $count; $i++) {
        $number = rand(1, 20);
        $questions[] = $number;
        $answers[] = ($number % 2 === 0) ? "yes" : "no";
    }

    return [$questions, $answers];
}

function runEven(int $count = ROUND_COUNT)
{
    $QnA = getQnAForEven($count);
    runGame(TASK, $QnA, $count);
}
