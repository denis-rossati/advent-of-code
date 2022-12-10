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
      7,
      Index::resolutionFirstPart(Input::useSimpleEntrie()),
    );
  }

  public function testFirstPartMediumInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      16,
      Index::resolutionFirstPart(Input::useMediumEntrie()),
    );
  }

  public function testFirstPartCompleteInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      1301,
      Index::resolutionFirstPart(Input::useCompleteEntrie()),
    );
  }

  public function testSecondPartSimpleInputReturnRigthAnswer(): void
  {
    
    $this->assertEquals(
      5,
      Index::resolutionSecondPart(Input::useSimpleEntrie()),
    );
  }

  public function testSecondPartMediumInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      17,
      Index::resolutionSecondPart(Input::useMediumEntrie()),
    );
  }

  public function testSecondPartCompleteInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      1346,
      Index::resolutionSecondPart(Input::useCompleteEntrie()),
    );
  }
}
