<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function askName(): string
{
    line("Welcome to the Brain Games!");
    $name = '';
    while ($name === '') {
        $name = prompt("May I have your name?", "", " ");
    }
    line("Hello, %s!", $name);
    return $name;
}
