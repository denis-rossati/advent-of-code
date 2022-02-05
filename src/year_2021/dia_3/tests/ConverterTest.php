<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

include_once(__DIR__ . '/../code/Index.php');

final class ConverterTest extends TestCase
{
  public function getTestsForBinaryConversion(): array
  {
    return [
      ['binary' => '1010', 'result' => 10],
      ['binary' => '11001', 'result' => 25],
      ['binary' => '110010', 'result' => 50],
      ['binary' => '1100100', 'result' => 100],
    ];
  }
  
  /**
   * @dataProvider getTestsForBinaryConversion
   */
  public function testBinariesAreCovertedCorrectly(string $binary, int $result): void
  {
    self::assertEquals(
      $result,
      Converter::binaryToDecimal($binary),
    );
  }
}