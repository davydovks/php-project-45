<?php

namespace BrainGames\Games\Brain\Progression;

use function BrainGames\Engine\runGame;

// Возвращает вопросы и правильные ответы для игры "Арифметическая прогрессия"
// в формате массива из двух массивов: в первом массиве вопросы (задания), во
// втором - правильные ответы на них. Аргумент $count определяет количество
// элементов в обоих массивах (количество задаваемых вопросов).
function getQnAForProgression($count)
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
                // Скрываем загаданное число
                $question .= '.. ';
                $answers[] = $number;
            } else {
                // Добавляем число в строку
                $question .= $number . ' ';
            }
        }
        $questions[] = $question;
    }

    return [$questions, $answers];
}

// Запускает игру "Арифметическая прогрессия"
// $count - количество раундов
function runProgression($count = 3)
{
    $task = 'What number is missing in the progression?';
    $QnA = getQnAForProgression($count);
    runGame($task, $QnA, $count);
}
