<?php

declare(strict_types=1);

class Index
{
  public static function resolution(array $sonar_sweep_list): int
  {
    $howManyTimesIncreased = 0;
    for($index = 0; $index < count($sonar_sweep_list); $index += 1) {
      if ($index > 0 && ($sonar_sweep_list[$index] > $sonar_sweep_list[$index - 1])) {
        $howManyTimesIncreased += 1;
      }
    }
    return $howManyTimesIncreased;
  }
}
