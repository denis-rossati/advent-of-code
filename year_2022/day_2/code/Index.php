<?php

declare(strict_types=1);

include_once('./input.php');

class Index
{
    public static function resolutionFirstPart(array $itemsCalories): int
    {
        $mostCaloriesQuantity = 0;
        $caloriesCount = 0;
        foreach ($itemsCalories as $calories) {
            if ($calories !== '') {
                $caloriesCount += $calories;
            } elseif ($caloriesCount > $mostCaloriesQuantity) {
                $mostCaloriesQuantity = $caloriesCount;

                $caloriesCount = 0;
            } else {
                $caloriesCount = 0;
            }

        }

        return $mostCaloriesQuantity;
    }

    public static function resolutionSecondPart(array $itemsCalories): int
    {
        $mostCaloriesQuantity = [0, 0, 0];
        $caloriesCount = 0;

        foreach ($itemsCalories as $calories) {
            if ($calories !== '') {
                $caloriesCount += $calories;
            } else {
                foreach ($mostCaloriesQuantity as $key => $podium) {
                    if ($caloriesCount > $podium) {
                        $mostCaloriesQuantity[$key] = $caloriesCount;
                        break;
                    }
                }

                $caloriesCount = 0;
            }

        }

        return array_reduce($mostCaloriesQuantity, static fn($carry, $item) => $carry + $item, 0);
    }
}


var_dump(Index::resolutionSecondPart($second_problem_input));