<?php

namespace BrainGames\Games\Brain\GCD;

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

function runGCD(int $count = 3)
{
    $task = 'Find the greatest common divisor of given numbers.';
    $QnA = getQnAForGCD($count);
    runGame($task, $QnA, $count);
}
