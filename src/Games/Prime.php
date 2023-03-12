<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_NUMBER = 100;
const MIN_NUMBER = 1;

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    $limit = floor(sqrt($num));
    for ($i = 2; $i <= $limit; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}

function startGame(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];

    for ($i = 0; $i < $count; $i++) {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $questions[] = $number;
        $answers[] = isPrime($number) ? 'yes' : 'no';
    }

    runGame(TASK, $questions, $answers, $count);
}
