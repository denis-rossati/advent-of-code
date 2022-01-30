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
      'ANSWER HERE',
      Index::resolutionFirstPart(),
    );
  }

  public function testFirstPartMediumInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      'ANSWER HERE',
      Index::resolutionFirstPart(),
    );
  }

  public function testFirstPartCompleteInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      'ANSWER HERE',
      Index::resolutionFirstPart(),
    );
  }
}
