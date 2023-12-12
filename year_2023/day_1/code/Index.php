<?php

declare(strict_types=1);

include_once('./input.php');

class Index
{
    public static function resolutionFirstPart(array $calibrationDocument): int
    {
        $result = 0;

        foreach ($calibrationDocument as $dirtyCoordinates) {
            $result += self::twoPointerTechnique($dirtyCoordinates);
        }

        return $result;
    }

    private static function twoPointerTechnique(string $dirtyCoords): int
    {
        $leftPointer = 0;
        $rightPointer = \strlen($dirtyCoords) - 1;

        $leftCoord = null;
        $rightCoord = null;

        while ($leftCoord === null || $rightCoord === null) {
            $leftCoordCandidate = $dirtyCoords[$leftPointer];
            if (is_numeric($leftCoordCandidate) && $leftCoord === null) {
                $leftCoord = $leftCoordCandidate;
            }

            $rightCoordCandidate = $dirtyCoords[$rightPointer];

            if (is_numeric($rightCoordCandidate) && $rightCoord === null) {
                $rightCoord = $rightCoordCandidate;
            }

            $leftPointer += 1;
            $rightPointer -= 1;
        }

        return intval($leftCoord . $rightCoord);
    }

    const SPELLED_DIGITS = [
        'one' => '1',
        'two' => '2',
        'three' => '3',
        'four' => '4',
        'five' => '5',
        'six' => '6',
        'seven' => '7',
        'eight' => '8',
        'nine' => '9',
    ];

    public static function resolutionSecondPart(array $calibrationDocument): int
    {
        $spelledDigits = \array_keys(self::SPELLED_DIGITS);
        $windowSizes = \array_unique(\array_map(fn ($digit) => \strlen($digit),$spelledDigits));

        $result = 0;

        foreach ($calibrationDocument as $dirtyCoordinates) {
            $result += self::twoPointerTechniqueSubstr($dirtyCoordinates, $windowSizes);
        }

        return $result;
    }

    /**
     * @param array<int> $spelledDigits
     * @param array<int> $windowSizes
     */
    private static function twoPointerTechniqueSubstr(string $dirtyCoords, array $windowSizes): int {
        $leftPointer = 0;
        $rightPointer = \strlen($dirtyCoords) - 1;

        $leftCoord = null;
        $rightCoord = null;

        while ($leftCoord === null || $rightCoord === null) {
            if ($leftCoord === null) {
                $leftCoordCandidate = $dirtyCoords[$leftPointer];

                $isNumeric = \is_numeric($leftCoordCandidate);

                if($isNumeric) {
                    $leftCoord = $leftCoordCandidate;
                }

                if (!$isNumeric) {
                    $spelledDigit = self::checkSubstr($dirtyCoords, $leftPointer, $windowSizes);

                    if($spelledDigit !== null) {
                        $leftCoord = $spelledDigit;
                    }
                }
            }

            if ($rightCoord === null) {
                $rightCoordCandidate = $dirtyCoords[$rightPointer];

                $isNumeric = \is_numeric($rightCoordCandidate);

                if($isNumeric) {
                    $rightCoord = $rightCoordCandidate;
                }

                if(!$isNumeric) {
                    $spelledDigit = self::checkSubstr($dirtyCoords, $rightPointer, $windowSizes);

                    if ($spelledDigit !== null) {
                        $rightCoord = $spelledDigit;
                    }
                }
            }

            $leftPointer += 1;
            $rightPointer -= 1;
        }

        return intval($leftCoord . $rightCoord);
    }

    private static function checkSubstr(string $dirtyCoords, int $pointerPosition, array $windowSizes): ?string {
        foreach ($windowSizes  as $windowSize) {
            $spelledDigit = \substr($dirtyCoords, $pointerPosition, $windowSize);

            if(\array_key_exists($spelledDigit, self::SPELLED_DIGITS)) {
                return self::SPELLED_DIGITS[$spelledDigit];
            }
        }

        return null;
    }
}


var_dump(Index::resolutionSecondPart($second_problem_input));
