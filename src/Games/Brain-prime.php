<?php

namespace BrainGames\Games\Brain\Prime;

use function BrainGames\Engine\runGame;

function isPrime($num)
{
    $result = True;
    $highestIntegralSquareRoot = floor(sqrt($num));

    for ($i = 2; $i <= $highestIntegralSquareRoot; $i++) {
        if ($num % $i == 0) {
            $result = False;
            break;
        }               
    }

    return $result;
}       

function getQnAForPrime($count)
// Возвращает вопросы и правильные ответы для игры "Простое ли число?"  
// в формате массива из двух массивов: в первом массиве вопросы (задания), во
// втором - правильные ответы на них. Аргумент $count определяет количество
// элементов в обоих массивах (количество задаваемых вопросов).
{
    $questions = [];
    $answers = [];

    for ($i = 0; $i < $count; $i++) {
        $number = rand(1, 100);
        $questions[] = $number;
        if (isPrime($number)) {
            $answers[] = "yes";
        } else {
            $answers[] = "no";
        }
    }

    return [$questions, $answers];
}

function runPrime($count = 3)
// Запускает игру "Простое ли число?"
// $count - количество раундов
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $QnA = getQnAForPrime($count);
    runGame($task, $QnA, $count);
}
