<?php

namespace BrainGames\Games\Brain\GCD;

use function BrainGames\Engine\runGame;

function getGCD($a, $b)
// Возвращает НОД двух чисел
{
    while ($b != 0) {
        $m = $a % $b;
        $a = $b;
        $b = $m;
    }

    return $a;
}

function getQnAForGCD($count)
// Возвращает вопросы и правильные ответы для игры "НОД" в формате 
// массива из двух массивов: в первом массиве вопросы (задания), во
// втором - правильные ответы на них. Аргумент $count определяет количество
// элементов в обоих массивах (количество задаваемых вопросов).
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

function runGCD($count = 3)
// Запускает игру "НОД"
// $count - количество раундов
{
    $task = 'Find the greatest common divisor of given numbers.';
    $QnA = getQnAForGCD($count);
    runGame($task, $QnA, $count);
}
