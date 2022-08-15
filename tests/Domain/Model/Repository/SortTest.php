<?php
declare(strict_types = 1);

namespace Warehouse\Test\Domain\Model\Repository;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Warehouse\Domain\Model\Repository\OrderEnum;
use Warehouse\Domain\Model\Repository\Sort;

final class SortTest extends TestCase {
  public function testEmptySort(): void {
    $sort = new Sort();
    $this->assertCount(0, $sort);
  }

  public function testConstructor(): void {
    $input = [
      'a' => OrderEnum::ASCENDING,
      'b' => OrderEnum::DESCENDING
    ];
    $sort = new Sort($input);
    $this->assertCount(2, $sort);

    foreach ($input as $fieldName => $order) {
      $this->assertSame($order, $sort->getOrderFor($fieldName));
    }
  }

  public function testInvalidFieldName(): void {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('Argument "fieldName" must be of type "string", "integer" given');

    new Sort([1 => OrderEnum::ASCENDING]);
  }

  public function testInvalidOrder() {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('Argument "order" must be an instance of "OrderEnum", "string" given');

    new Sort(['a' => 'x']);
  }

  public function testSetGetOrderFor(): void {
    $sort = new Sort();
    $sort->setOrderFor('a', OrderEnum::ASCENDING);
    $this->assertSame(OrderEnum::ASCENDING, $sort->getOrderFor('a'));
    $this->assertCount(1, $sort);
  }

  public function testGetOrderForInvalidField(): void {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('Order for field "a" has not been set');

    (new Sort())->getOrderFor('a');
  }

  public function testGet(): void {
    $input = ['a' => OrderEnum::ASCENDING];
    $sort = new Sort($input);
    $this->assertSame($input, $sort->get());
  }
}
