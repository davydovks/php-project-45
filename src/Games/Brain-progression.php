<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'What number is missing in the progression?';
const PROGRESSION_COUNT = 10;
const MAX_START_NUMBER = 20;
const MAX_INCREMENT = 9;

function runProgression(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];

    for ($i = 0; $i < $count; $i++) {
        $start = rand(1, MAX_START_NUMBER);
        $increment = rand(1, MAX_INCREMENT);
        $answerPosition = rand(1, PROGRESSION_COUNT - 2); // Скрываем число между 2 и предпоследним
        $end = $start + $increment * PROGRESSION_COUNT;
        $progression = range($start, $end, $increment);
        $progression[$answerPosition] = '..';
        $questions[] = implode(' ', $progression);
        $answers[] = $start + $increment * $answerPosition;
    }

    runGame(TASK, $questions, $answers, $count);
}
