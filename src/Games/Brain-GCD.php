<?php

namespace BrainGames\Games\BrainGCD;

use function BrainGames\Engine\runGame;

const TASK = 'Find the greatest common divisor of given numbers.';

function getGCD(int $num1, int $num2): int
{
    while ($num2 != 0) {
        $remainder = $num1 % $num2;
        $num1 = $num2;
        $num2 = $remainder;
    }

    return $num1;
}

function getQnAForGCD(int $count): array
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $count; $i++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);

        $questions[] = $num1 . " " . $num2;
        $answers[] = getGCD($num1, $num2);
    }

    return [$questions, $answers];
}

function runGCD(int $count = 3)
{
    $QnA = getQnAForGCD($count);
    runGame(TASK, $QnA, $count);
}
