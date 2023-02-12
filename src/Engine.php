<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function askName(): string
// Приветствие пользователя, запрос имени
// Возвращает имя пользователя
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?", false, " ");
    line("Hello, %s!", $name);
    return $name;
}

function showTask($text)
// Вывод задания игры и перевод строки
{
    line($text);
}

function askOne($question, $answer): bool
// Задает вопрос и проверяет введенный ответ
// Возвращает TRUE при правильном ответе, FALSE при неправильном
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

function askQuestions($questions, $answers, $count = 3): bool
// $questions - массив вопросов
// $answers - массив правильных ответов
// $count - количество элементов в обоих массивах
// Возвращает TRUE, если все ответы правильные
// При неправильном ответе возвращает FALSE и прекращает задавать вопросы
{
    for ($i = 0; $i < $count; $i++) {
        $result = askOne($questions[$i], $answers[$i]);
        if (!$result) {
            return false;
        }
    }
    return true;
}

function farewell($name, $success)
// Прощание с пользователем
{
    if ($success) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}