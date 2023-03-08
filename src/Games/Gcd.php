<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'Find the greatest common divisor of given numbers.';
const MAX_NUMBER = 100;

function getGCD(int $num1, int $num2): int
{
    while ($num2 != 0) {
        $remainder = $num1 % $num2;
        $num1 = $num2;
        $num2 = $remainder;
    }

    return $num1;
}

function runGCD(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];

    for ($i = 0; $i < $count; $i++) {
        $num1 = rand(1, MAX_NUMBER);
        $num2 = rand(1, MAX_NUMBER);
        $questions[] = $num1 . ' ' . $num2;
        $answers[] = getGCD($num1, $num2);
    }

    runGame(TASK, $questions, $answers, $count);
}
