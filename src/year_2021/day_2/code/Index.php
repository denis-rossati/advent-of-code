<?php

declare(strict_types=1);

class Index
{
  public static function resolutionFirstPart(array $moveList): int
  {
    $horizontalPosition = 0;
    $verticalPosition = 0;
    for($index = 0; $index < count($moveList); $index += 1)
    {
      [$direction, $value] = explode(' ', $moveList[$index]);
      if ($direction === 'up') {
        $verticalPosition -= (int)$value;
      } elseif ($direction === 'down') {
        $verticalPosition += (int)$value;

      } else {
        $horizontalPosition += (int)$value;
      }
    }
    return $horizontalPosition * $verticalPosition;
  }

  public static function resolutionSecondPart(array $moveList): int
  {
    $horizontalPosition = 0;
    $aim = 0;
    $depth = 0;
    for($index = 0; $index < count($moveList); $index += 1)
    {
      [$direction, $value] = explode(' ', $moveList[$index]);
      if ($direction === 'up') {
        $aim -= (int)$value;
      } elseif ($direction === 'down') {
        $aim += (int)$value;
      } else {
        $horizontalPosition += (int)$value;
        $depth += $aim * (int)$value;
      }
    }
    return $horizontalPosition * $depth;
  }
}
