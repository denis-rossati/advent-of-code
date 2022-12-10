<?php

declare(strict_types=1);

include_once('./input.php');

class Index
{
    public static function resolutionFirstPart(array $strategyGuide): int
    {
        // rock -> A or X
        // paper -> B or Y
        // scissors -> C or Z
        $equivalenceMap = [
            'A' => 'X',
            'B' => 'Y',
            'C' => 'Z',
        ];

        // Mapping the weak spot of each move
        $decryptionMap = [
            'A' => 'Y',
            'B' => 'Z',
            'C' => 'X',
            'X' => 'B',
            'Y' => 'C',
            'Z' => 'A',
        ];

        $scoreMap = [
            'X' => 1,
            'Y' => 2,
            'Z' => 3,
        ];

        $totalScore = 0;

        foreach ($strategyGuide as $match) {
            [$enemyMove, $myMove] = explode(' ', $match);

            $tie = $equivalenceMap[$enemyMove] === $myMove;
            $win = $decryptionMap[$enemyMove] === $myMove;

            $moveScore = $scoreMap[$myMove];

            if ($tie) {
                $totalScore += $moveScore + 3;
            } elseif ($win) {
                $totalScore += $moveScore + 6;
            } else {
                $totalScore += $moveScore;
            }
        }

        return $totalScore;
    }

    public static function resolutionSecondPart(array $strategyGuide): int

    {
        // Mapping the weak spot of each move
        // rock -> A
        // paper -> B
        // scissors -> C
        $decryptionMap = [
            'A' => 'B',
            'B' => 'C',
            'C' => 'A',
        ];

        $scoreMap = [
            'A' => 1,
            'B' => 2,
            'C' => 3,
        ];

        $totalScore = 0;

        foreach ($strategyGuide as $match) {
            [$enemyMove, $matchResult] = explode(' ', $match);

            $tie = $matchResult === 'Y';
            $win = $matchResult === 'Z';

            $winMove = static fn(string $enemyMove) => $decryptionMap[$enemyMove];
            // The enemy's strong spot is my weak spot. That is: scissors returns the key of the strong spot of my enemy.
            $lossMove = static fn(string $enemyMove) => $decryptionMap[$decryptionMap[$enemyMove]];

            $moveScore = static fn(string $myMove) => $scoreMap[$myMove];

            if ($tie) {
                $myMove = $enemyMove;
                $totalScore += $moveScore($myMove) + 3;
            } elseif ($win) {
                $myMove = $winMove($enemyMove);
                $totalScore += $moveScore($myMove) + 6;
            } else {
                $myMove = $lossMove($enemyMove);
                $totalScore += $moveScore($myMove);
            }
        }

        return $totalScore;
    }
}
