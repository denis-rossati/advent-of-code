<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

include_once(__DIR__ . '/Entries.php');
include_once(__DIR__ . '/../code/Index.php');

final class IndexTest extends TestCase
{
  public function testFirstPartSimpleInputReturnRigthAnswer(): void
  { 
    $this->assertEquals(
      150,
      Index::resolutionFirstPart(Input::useSimpleEntrie()),
    );
  }

  public function testFirstPartMediumInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      444,
      Index::resolutionFirstPart(Input::useMediumEntrie()),
    );
  }

  public function testFirstPartCompleteInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      1694130,
      Index::resolutionFirstPart(Input::useCompleteEntrie()),
    );
  }

  public function testSecondPartSimpleInputReturnRigthAnswer(): void
  { 
    $this->assertEquals(
      900,
      Index::resolutionSecondPart(Input::useSimpleEntrie()),
    );
  }

  public function testSecondPartMediumInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      5439,
      Index::resolutionSecondPart(Input::useMediumEntrie()),
    );
  }

  public function testSecondPartCompleteInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      1698850445,
      Index::resolutionSecondPart(Input::useCompleteEntrie()),
    );
  }
}
