<?php

namespace BrainGames\Games\Brain\GCD;

use function BrainGames\Engine\runGame;

// Возвращает НОД двух чисел
function getGCD($a, $b)
{
    while ($b != 0) {
        $m = $a % $b;
        $a = $b;
        $b = $m;
    }

    return $a;
}

// Возвращает вопросы и правильные ответы для игры "НОД" в формате
// массива из двух массивов: в первом массиве вопросы (задания), во
// втором - правильные ответы на них. Аргумент $count определяет количество
// элементов в обоих массивах (количество задаваемых вопросов).
function getQnAForGCD($count)
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $count; $i++) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);

        $questions[] = $number1 . " " . $number2;
        $answers[] = getGCD($number1, $number2);
    }

    return [$questions, $answers];
}

// Запускает игру "НОД"
// $count - количество раундов
function runGCD($count = 3)
{
    $task = 'Find the greatest common divisor of given numbers.';
    $QnA = getQnAForGCD($count);
    runGame($task, $QnA, $count);
}
