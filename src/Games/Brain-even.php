<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\runGame;

function getQnAForEven(int $count): array
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 20);
        $questions[] = $number;
        if ($number % 2 === 0) {
            $answers[] = "yes";
        } else {
            $answers[] = "no";
        }
    }

    return [$questions, $answers];
}

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function runEven(int $count = 3)
{
    $QnA = getQnAForEven($count);
    runGame(TASK, $QnA, $count);
}
