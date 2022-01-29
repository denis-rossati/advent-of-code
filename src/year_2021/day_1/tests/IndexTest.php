<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

include_once(__DIR__ . '/Entries.php');
include_once(__DIR__ . '/../code/Index.php');

final class IndexTest extends TestCase
{
  public function testSimpleInputReturnRigthAnswer(): void
  {
    
    $this->assertEquals(
      7,
      Index::resolution(Input::useSimpleEntrie()),
    );
  }

  public function testMediumInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      16,
      Index::resolution(Input::useMediumEntrie()),
    );
  }

  public function testCompleteInputReturnRightAnswer(): void
  {
    $this->assertEquals(
      1301,
      Index::resolution(Input::useCompleteEntrie()),
    );
  }
}