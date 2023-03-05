<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\askName;

function askOneQuestion(string $question, string $answer): bool
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

function askQuestions(array $questions, array $answers, int $count): bool
{
    for ($i = 0; $i < $count; $i++) {
        $result = askOneQuestion($questions[$i], $answers[$i]);
        if (!$result) {
            return false;
        }
    }
    return true;
}

function farewell(string $name, bool $success)
{
    if ($success) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}

function runGame(string $task, array $QnA, int $count)
{
    $username = askName();
    line($task);
    [$questions, $answers] = $QnA;
    $result = askQuestions($questions, $answers, $count);
    farewell($username, $result);
}
