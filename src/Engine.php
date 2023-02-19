<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

// Приветствие пользователя, запрос имени
// Возвращает имя пользователя
function askName(): string
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?", false, " ");
    line("Hello, %s!", $name);
    return $name;
}

// Вывод задания игры и перевод строки
function showTask($text)
{
    line($text);
}

// Задает вопрос и проверяет введенный ответ
// Возвращает TRUE при правильном ответе, FALSE при неправильном
function askOne($question, $answer): bool
{
    line('Question: %s', $question);
    $userAnswer = prompt("Your answer");
    if ($userAnswer == $answer) {
        line("Correct!");
        return true;
    } else {
        line("'$userAnswer' is wrong answer ;(. Correct answer was '$answer'.");
        return false;
    }
}

// $questions - массив вопросов
// $answers - массив правильных ответов
// $count - количество элементов в обоих массивах
// Возвращает TRUE, если все ответы правильные
// При неправильном ответе возвращает FALSE и прекращает задавать вопросы
function askQuestions($questions, $answers, $count = 3): bool
{
    for ($i = 0; $i < $count; $i++) {
        $result = askOne($questions[$i], $answers[$i]);
        if (!$result) {
            return false;
        }
    }
    return true;
}

// Прощание с пользователем
function farewell($name, $success)
{
    if ($success) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}

// Запуск игры
// Параметры:
// $task - условия игры (string)
// $QnA - вопросы и ответы (массив [$questions, $answers])
//     $questions - массив вопросов
//     $answers - массив ответов
// $count - количество вопросов и ответов, длина массивов $questions и $answers
function runGame($task, $QnA, $count)
{
    // Приветствие и запрос имени
    $username = askName();

    // Показываем условия игры
    showTask($task);

    // Получаем вопросы и правильные ответы
    [$questions, $answers] = $QnA;

    // Задаем вопросы
    $result = askQuestions($questions, $answers, $count);

    // Прощаемся
    farewell($username, $result);
}
