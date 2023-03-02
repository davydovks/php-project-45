<?php

namespace BrainGames\Games\BrainGCD;

use function BrainGames\Engine\runGame;

function getGCD(int $a, int $b): int
{
    while ($b != 0) {
        $m = $a % $b;
        $a = $b;
        $b = $m;
    }

    return $a;
}

function getQnAForGCD(int $count): array
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $count; $i++) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);

        $questions[] = $number1 . " " . $number2;
        $answers[] = getGCD($number1, $number2);
    }

    return [$questions, $answers];
}

const TASK = 'Find the greatest common divisor of given numbers.';

function runGCD(int $count = 3)
{
    $QnA = getQnAForGCD($count);
    runGame(TASK, $QnA, $count);
}
