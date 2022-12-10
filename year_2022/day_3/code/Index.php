<?php

declare(strict_types=1);

include_once('./input.php');

class Index
{
    public static function resolutionFirstPart(array $rucksackList): int
    {
        $isLowerCase = static fn($letter) => $letter === strtolower($letter);
        $itemToPriority = static fn($item) => ($isLowerCase($item) ? ord($item) - 96 : ord($item) - 38);


        $prioritySum = 0;

        foreach ($rucksackList as $rucksack) {
            $itemList = str_split($rucksack);
            $secondCompartmentStart = count($itemList) / 2;

            $firstCompartment = array_slice($itemList, 0, $secondCompartmentStart);
            $secondCompartment = array_slice($itemList, $secondCompartmentStart);

            foreach ($firstCompartment as $item) {
                $index = array_search($item, $secondCompartment, true);

                if ($index !== false) {
                    $item = $secondCompartment[$index];
                    $prioritySum += $itemToPriority($item);
                    break;
                }
            }
        }

        return $prioritySum;
    }

    public static function resolutionSecondPart(array $rucksackList): int
    {
        $isLowerCase = static fn($letter) => $letter === strtolower($letter);
        $itemToPriority = static fn($item) => ($isLowerCase($item) ? ord($item) - 96 : ord($item) - 38);
        $prioritySum = 0;

        foreach ($rucksackList as $index => $rucksack) {
            if (($index + 1) % 3 !== 0) {
                continue;
            }

            $lastIndex = $index - 1;
            $lastButOneIndex = $lastIndex - 1;

            $lastButOne = str_split($rucksackList[$lastButOneIndex]);
            $last = str_split($rucksackList[$lastIndex]);
            $current = str_split($rucksack);

            foreach ($current as $possibleBadge) {
                if (in_array($possibleBadge, $last, true)) {
                    $index = array_search($possibleBadge, $lastButOne, true);

                    if ($index !== false) {
                        $item = $lastButOne[$index];
                        $prioritySum += $itemToPriority($item);
                        break;
                    }
                }
            }
        }

        return $prioritySum;
    }
}
