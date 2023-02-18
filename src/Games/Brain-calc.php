<?php

namespace BrainGames\Games\Brain\Calc;

use function BrainGames\Engine\runGame;

function getQnAForCalc($count)
// Возвращает вопросы и правильные ответы для игры "Калькулятор" в формате 
// массива из двух массивов: в первом массиве вопросы (задания), во
// втором - правильные ответы на них. Аргумент $count определяет количество
// элементов в обоих массивах (количество задаваемых вопросов).
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $count; $i++) {
        $number1 = rand(1, 30);
        $number2 = rand(1, 30);
        $operationNum = rand(1, 3);
        switch ($operationNum) {
            case 1: // +
                $questions[] = $number1 . ' + ' . $number2;
                $answers[] = $number1 + $number2;
                break;
            case 2: // *
                $questions[] = $number1 . ' * ' . $number2;
                $answers[] = $number1 * $number2;
                break;
            case 3: // -
                // Если уменьшаемое меньше вычитаемого, меняем их местами
                if ($number1 < $number2) {
                    $temp = $number1;
                    $number1 = $number2;
                    $number2 = $temp;
                }
                $questions[] = $number1 . ' - ' . $number2;
                $answers[] = $number1 - $number2;
                break;
        }
    }

    return [$questions, $answers];
}

function runCalc($count = 3)
// Запускает игру "Проверка на чётность"
// $count - количество раундов
{
    $task = 'What is the result of the expression?';
    $QnA = getQnAForCalc($count);
    runGame($task, $QnA, $count);
}
