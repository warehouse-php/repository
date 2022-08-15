<?php
declare(strict_types = 1);

namespace Warehouse\Test\Domain\Model\Repository;

use PHPUnit\Framework\TestCase;
use Warehouse\Domain\Model\Repository\Fields;

final class FieldsTest extends TestCase {
  public function testConstructor(): void {
    $input = ['a', 'b', 'c'];
    $fields = new Fields(...$input);
    $this->assertSame($input, $fields->get());
    $this->assertCount(3, $fields);
  }

  public function testAdd(): void {
    $fields = new Fields();
    $this->assertEmpty($fields->get());
    $this->assertCount(0, $fields);

    $fields->add('a');
    $this->assertSame(['a'], $fields->get());
    $this->assertCount(1, $fields);
  }
}
