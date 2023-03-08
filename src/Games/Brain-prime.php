<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    $result = true;
    $highestIntegralSquareRoot = floor(sqrt($num));

    for ($i = 2; $i <= $highestIntegralSquareRoot; $i++) {
        if ($num % $i == 0) {
            $result = false;
            break;
        }
    }

    return $result;
}

function runPrime(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];

    for ($i = 0; $i < $count; $i++) {
        $number = rand(1, 100);
        $questions[] = $number;
        $answers[] = isPrime($number) ? "yes" : "no";
    }

    runGame(TASK, $questions, $answers, $count);
}
