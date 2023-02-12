<?php

namespace BrainGames\Games\Brain\Even;

use function BrainGames\Engine\askName;
use function BrainGames\Engine\showTask;
use function BrainGames\Engine\askQuestions;
use function BrainGames\Engine\farewell;

function getQnAForEven($count)
// Возвращает вопросы и правильные ответы для игры "Проверка на чётность" в 
// формате массива из двух массивов: в первом массиве вопросы (задания), во
// втором - правильные ответы на них. Аргумент $count определяет количество
// элементов в обоих массивах (количество задаваемых вопросов).
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 20);
        $questions[] = $number;
        if ($number % 2 === 0) {
            $answers[] = "yes";
        } else {
            $answers[] = "no";
        }
    }
    
    return [$questions, $answers];
}

function runEven($count = 3)
// Запускает игру "Проверка на чётность".
// $count - количество раундов
{
    // Приветствие и запрос имени
    $username = askName();
    
    // Показываем условия игры
    showTask('Answer "yes" if the number is even, otherwise answer "no".');
    
    // Генерируем задания
    [$questions, $answers] = getQnAForEven($count);
    
    // Задаем вопросы
    $result = askQuestions($questions, $answers, $count);
    
    // Прощаемся
    farewell($username, $result);
}
