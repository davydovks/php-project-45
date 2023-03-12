<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'Find the greatest common divisor of given numbers.';
const MAX_NUMBER = 100;
const MIN_NUMBER = 1;

function getGCD(int $num1, int $num2): int
{
    while ($num2 != 0) {
        $remainder = $num1 % $num2;
        $num1 = $num2;
        $num2 = $remainder;
    }

    return $num1;
}

function startGame(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];

    for ($i = 0; $i < $count; $i++) {
        $num1 = rand(MIN_NUMBER, MAX_NUMBER);
        $num2 = rand(MIN_NUMBER, MAX_NUMBER);
        $questions[] = $num1 . ' ' . $num2;
        $answers[] = getGCD($num1, $num2);
    }

    runGame(TASK, $questions, $answers, $count);
}
