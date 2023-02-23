<?php

namespace BrainGames\Games\Brain\Prime;

use function BrainGames\Engine\runGame;

// Проверка на то, является ли число простым
function isPrime(int $num): bool
{
    $result = true;
    $highestIntegralSquareRoot = floor(sqrt($num));

    for ($i = 2; $i <= $highestIntegralSquareRoot; $i++) {
        if ($num % $i == 0) {
            $result = false;
            break;
        }
    }

    return $result;
}

// Возвращает вопросы и правильные ответы для игры "Простое ли число?"
// в формате массива из двух массивов: в первом массиве вопросы (задания), во
// втором - правильные ответы на них. Аргумент $count определяет количество
// элементов в обоих массивах (количество задаваемых вопросов).
function getQnAForPrime(int $count): array
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

// Запускает игру "Простое ли число?"
// $count - количество раундов
function runPrime(int $count = 3)
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $QnA = getQnAForPrime($count);
    runGame($task, $QnA, $count);
}
