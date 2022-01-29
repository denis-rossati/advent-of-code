<?php

declare(strict_types=1);

class Index
{
  public static function resolutionFirstPart(array $sweepList): int
  {
    $timesIncreased = 0;
    for($index = 0; $index < count($sweepList); $index += 1) {
      if ($index > 0 && ($sweepList[$index] > $sweepList[$index - 1])) {
        $timesIncreased += 1;
      }
    }
    return $timesIncreased;
  }

  public static function resolutionSecondPart(array $sweepList): int
  {
    $timesIncreased = 0;
    for($index = 0; $index < count($sweepList); $index += 1) {
      if ($index >= 3) {

        $currentSweep = $sweepList[$index];
        $secondSweep = $sweepList[$index - 1];
        $thirdSweep = $sweepList[$index - 2];
        $fourthSweep = $sweepList[$index - 3];

        $currentSlidingWindow = $currentSweep + $secondSweep + $thirdSweep;
        $previousSlidingWindow = $secondSweep + $thirdSweep + $fourthSweep;

        if ($currentSlidingWindow > $previousSlidingWindow) $timesIncreased += 1;
      }
    }
    return $timesIncreased;
  }
}
