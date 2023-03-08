<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const TASK = 'What number is missing in the progression?';

function runProgression(int $count = ROUND_COUNT)
{
    $questions = [];
    $answers = [];

    for ($i = 0; $i < $count; $i++) {
        $start = rand(1, 20);
        $increment = rand(1, 9);
        $position = rand(1, 8); // Скрываем число между 2 и 9 включительно (из 10)
        $end = $start + $increment * 10;
        $progression = range($start, $end, $increment);
        $progression[$position] = '..';        
        $questions[] = implode(' ', $progression);
        $answers[] = $start + $increment * $position;
    }

    runGame(TASK, $questions, $answers, $count);
}
