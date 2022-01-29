<?php

declare(strict_types=1);

class Index
{
  public static function resolutionFirstPart(array $sweepList): int
  {
    $timesIncreased = 0;
    for($index = 0; $index < count($sweepList); $index += 1) {
      if ($index > 0) {
        $currentSweepIsDeeper = $sweepList[$index] > $sweepList[$index - 1];
        if ($currentSweepIsDeeper) $timesIncreased += 1;
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
        $middleSweep = $sweepList[$index - 1] + $sweepList[$index - 2];
        $fourthSweep = $sweepList[$index - 3];

        $currentSlidingWindow = $currentSweep + $middleSweep;
        $previousSlidingWindow = $middleSweep + $fourthSweep;

        if ($currentSlidingWindow > $previousSlidingWindow) $timesIncreased += 1;
      }
    }
    return $timesIncreased;
  }
}
