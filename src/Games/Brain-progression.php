<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\runGame;

const TASK = 'What number is missing in the progression?';

function getQnAForProgression(int $count): array
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $count; $i++) {
        $start = rand(1, 20);
        $increment = rand(1, 9);
        $position = rand(1, 8); // Скрываем число между 2 и 9 включительно (из 10)

        $question = '';
        for ($j = 0, $number = $start; $j < 10; $j++, $number += $increment) {
            if ($j == $position) {
                $question .= '.. ';
                $answers[] = $number;
            } else {
                $question .= $number . ' ';
            }
        }
        $questions[] = $question;
    }

    return [$questions, $answers];
}

function runProgression(int $count = 3)
{
    $QnA = getQnAForProgression($count);
    runGame(TASK, $QnA, $count);
}
