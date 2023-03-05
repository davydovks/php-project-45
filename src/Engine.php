<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\askName;

function askQuestions(array $questions, array $answers, int $count, string $name)
{
    for ($i = 0; $i < $count; $i++) {
        line('Question: %s', $questions[$i]);
        $userAnswer = prompt("Your answer");
        if ($userAnswer == $answers[$i]) {
            line("Correct!");
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '{$answers[$i]}'.");
            line("Let's try again, %s!", $name);
            return false;
        }
    }

    line("Congratulations, %s!", $name);
    return true;
}

function runGame(string $task, array $QnA, int $count)
{
    $username = askName();
    line($task);
    [$questions, $answers] = $QnA;
    askQuestions($questions, $answers, $count, $username);
}
