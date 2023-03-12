<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';
const MAX_NUMBER = 30;
const MIN_NUMBER = 1;

function startGame(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];

    for ($i = 0; $i < $count; $i++) {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $questions[] = $number;
        $answers[] = ($number % 2 === 0) ? 'yes' : 'no';
    }

    runGame(TASK, $questions, $answers, $count);
}
