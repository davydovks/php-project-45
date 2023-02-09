<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function askName(): string
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?", false, " ");
    line("Hello, %s!", $name);
    return $name;
}

function showTask($text)
{
    line($text);
}

function askOne($question, $answer): bool
{
    line('Question: %s', $question);
    $userAnswer = prompt("Your answer");
    if ($userAnswer === $answer) {
        line("Correct!");
        return true;
    } else {
        line("'$userAnswer' is wrong answer ;(. Correct answer was '$answer'.");
        return false;
    }
}

function askThree($questions, $answers): bool
// Оба аргумента - массивы трех значений
{
    for ($i = 0; $i < 3; $i++) {
        $result = askOne($questions[$i], $answers[$i]);
        if (!$result) {
            return false;
        }
    }
    return true;
}

function farewell($name, $success)
{
    if ($success) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}