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
      198,
      Index::resolutionFirstPart(Input::useSimpleEntrie()),
    );
  }

  public function testFirstPartMediumInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      4049750,
      Index::resolutionFirstPart(Input::useMediumEntrie()),
    );
  }

  public function testFirstPartCompleteInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      4103154,
      Index::resolutionFirstPart(Input::useCompleteEntrie()),
    );
  }

  public function testSecondPartSimpleInputReturnRigthAnswer(): void
  { 
    $this->assertEquals(
      345,
      Index::resolutionSecondPart(Input::useSimpleEntrie()),
    );
  }

/*   public function testSecondPartMediumInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      1,
      Index::resolutionSecondPart(Input::useMediumEntrie()),
    );
  }

  public function testSecondPartCompleteInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      1,
      Index::resolutionSecondPart(Input::useCompleteEntrie()),
    );
  } */
}
