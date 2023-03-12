<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'What number is missing in the progression?';
const PROGRESSION_COUNT = 10;
const MAX_START_NUMBER = 20;
const MIN_START_NUMBER = 1;
const MAX_INCREMENT = 9;
const MIN_INCREMENT = 1;

function startGame(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];

    for ($i = 0; $i < $count; $i++) {
        $start = rand(MIN_START_NUMBER, MAX_START_NUMBER);
        $increment = rand(MIN_INCREMENT, MAX_INCREMENT);
        $answerPosition = rand(0, PROGRESSION_COUNT - 1);
        $end = $start + $increment * PROGRESSION_COUNT;
        $progression = range($start, $end, $increment);
        $progression[$answerPosition] = '..';
        $questions[] = implode(' ', $progression);
        $answers[] = $start + $increment * $answerPosition;
    }

    runGame(TASK, $questions, $answers, $count);
}
