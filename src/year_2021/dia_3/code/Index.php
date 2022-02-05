<?php

declare(strict_types=1);

class Converter {
  public static function binaryToDecimal(string $binaryNumber): int
  {
    $revertedArray = str_split(strrev($binaryNumber));
    $integersArray = array_map(
      fn(int $bit, int $index) => $bit * pow(2, $index),
      $revertedArray,
      array_keys($revertedArray)
    );

    return array_reduce($integersArray, fn($carry, $number) => $carry += $number, 0);
  }
}

// cool tricks learned here:
// https://stackoverflow.com/questions/30626785/php-most-frequent-value-in-array
class Statistics 
{
  protected static function getMostCommonBinary(string $binaryStr): array
  {
    $arrOfDigits = str_split($binaryStr);
    $numbersOne = 0;
    $numbersZero = 0;
    foreach($arrOfDigits as $number) {
      if ($number === '1') {
        $numbersOne += 1;
      } else {
        $numbersZero += 1;
      }
    }
    return $numbersOne >= $numbersZero
      ? ['common' => '1', 'uncommon' => '0']
      : ['common' => '0', 'uncommon' => '1'];  
  }

  public static function mode(string $strNumber): string
  {
    $countedAlgarisms = Statistics::getMostCommonBinary($strNumber);
    return $countedAlgarisms['common'];
  }

  public static function antimode(string $strNumber): string
  {
    $countedAlgarisms = Statistics::getMostCommonBinary($strNumber);
    return $countedAlgarisms['uncommon'];
  }
}

class Index
{
  public static function resolutionFirstPart(array $binaries): int
  {
    $numberLength = count(str_split($binaries[0]));

    $mostCommonBits = '';
    $leastCommonBits = '';

    for($numberDigit = 0; $numberDigit < $numberLength; $numberDigit += 1) {
      $digitsInIndex = '';
      for($index = 0; $index < count($binaries); $index += 1) {
        $currentDigit = $binaries[$index][$numberDigit];
        $digitsInIndex .= $currentDigit;
      }
      $mostCommonBits .= Statistics::mode($digitsInIndex);
      $leastCommonBits .= Statistics::antimode($digitsInIndex);
    }

    return Converter::binaryToDecimal($mostCommonBits) * Converter::binaryToDecimal($leastCommonBits);
  }

  public static function resolutionSecondPart(array $binaries): int
  {
    $modeBinaries = $binaries;

    $binaryLength = count(str_split($binaries[0]));
    for($bit = 0; $bit < $binaryLength; $bit += 1) {
      $algarismsInRow = '';
      for($number = 0; $number < count($binaries); $number += 1) {
        $algarismsInRow .= $binaries[$number][$bit];

      }
      $modeAlgarism = Statistics::mode($algarismsInRow);

      $modeBinaries = array_values(array_filter(
        $modeBinaries,
        function ($binary) use ($bit, $modeAlgarism, $modeBinaries) {
          if (count($modeBinaries) === 1) {
            return true;
          }
          if ($binary[$bit] === $modeAlgarism) {
            return true;
          }
          return false;
        },
      ));
      var_dump($modeBinaries);
    }
    return 999;
  }
}