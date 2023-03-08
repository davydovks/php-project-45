<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\askName;

const ROUND_COUNT = 3;

function runGame(string $task, array $questions, array $answers, int $count)
{
    $username = askName();
    line($task);

    for ($i = 0; $i < $count; $i++) {
        line('Question: %s', $questions[$i]);
        $userAnswer = prompt("Your answer");
        if ($userAnswer != $answers[$i]) {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '{$answers[$i]}'.");
            line("Let's try again, %s!", $username);
            return false;
        }
        line("Correct!");
    }

    line("Congratulations, %s!", $username);
    return true;
}
