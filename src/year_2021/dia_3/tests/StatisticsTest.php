<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

include_once(__DIR__ . '/Entries.php');
include_once(__DIR__ . '/../code/Index.php');

class StatisticsTest extends TestCase
{
  public function getTestsForMostCommonInt(): array
  {
    return [
      ['binary' => '00100', 'result' => 0],
      ['binary' => '11110', 'result' => 1],
      ['binary' => '10110', 'result' => 1],
      ['binary' => '10111', 'result' => 1],
      ['binary' => '10101', 'result' => 1],
      ['binary' => '01111', 'result' => 1],
      ['binary' => '00111', 'result' => 1],
      ['binary' => '11100', 'result' => 1],
      ['binary' => '10000', 'result' => 0],
      ['binary' => '11001', 'result' => 1],
      ['binary' => '00010', 'result' => 0],
      ['binary' => '01010', 'result' => 0],
    ];
  }

  public function getTestsForLeastCommonInt(): array
  {
    return [
      ['binary' => '00100', 'result' => 1],
      ['binary' => '11110', 'result' => 0],
      ['binary' => '10110', 'result' => 0],
      ['binary' => '10111', 'result' => 0],
      ['binary' => '10101', 'result' => 0],
      ['binary' => '01111', 'result' => 0],
      ['binary' => '00111', 'result' => 0],
      ['binary' => '11100', 'result' => 0],
      ['binary' => '10000', 'result' => 1],
      ['binary' => '11001', 'result' => 0],
      ['binary' => '00010', 'result' => 1],
      ['binary' => '01010', 'result' => 1],
    ];
  }

  /**
   * @dataProvider getTestsForMostCommonInt
   */ 
  public function testTheMostCommonBit(string $binary, int $result)
  {
    $this->assertEquals(
      $result,
      Statistics::mode($binary),
    );
  }

    /**
   * @dataProvider getTestsForLeastCommonInt
   */ 
  public function testTheLeastCommonBit(string $binary, int $result)
  {
    $this->assertEquals(
      $result,
      Statistics::antimode($binary),
    );
  }
}