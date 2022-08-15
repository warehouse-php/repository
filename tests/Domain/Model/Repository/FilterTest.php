<?php
declare(strict_types = 1);

namespace Warehouse\Test\Domain\Model\Repository;

use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\TestCase;
use Warehouse\Domain\Model\Repository\Filter;

final class FilterTest extends TestCase {
  public function testFilter(): void {
    $list = [
      'a' => [
        [
          'glue'   => 'AND',
          'filter' => 'startsWith',
          'value'  => 'x',
          'not'    => false
        ],
        [
          'glue'   => 'OR',
          'filter' => 'endsWith',
          'value'  => 'y',
          'not'    => true
        ]
      ]
    ];

    $filter = new Filter();
    $filter->field('a')->startsWith('x')->or()->not()->endsWith('y');

    $this->assertSame($list, $filter->get());
  }

  public function testMissingFieldStartsWith(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "startsWith" on an empty field name');

    (new Filter())->startsWith('x');
  }

  public function testInvalidStartsWithParameter(): void {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('Argument "value" must not be empty');

    (new Filter())->field('a')->startsWith('');
  }

  public function testMissingFieldEndsWith(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "endsWith" on an empty field name');

    (new Filter())->endsWith('x');
  }

  public function testInvalidEndsWithParameter(): void {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('Argument "value" must not be empty');

    (new Filter())->field('a')->endsWith('');
  }

  public function testMissingFieldContains(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "contains" on an empty field name');

    (new Filter())->contains('x');
  }

  public function testInvalidContainsParameter(): void {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('Argument "value" must not be empty');

    (new Filter())->field('a')->contains('');
  }

  public function testMissingFieldIsNull(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "isNull" on an empty field name');

    (new Filter())->isNull();
  }

  public function testMissingFieldIsEmpty(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "isEmpty" on an empty field name');

    (new Filter())->isEmpty();
  }

  public function testMissingFieldIsTrue(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "isTrue" on an empty field name');

    (new Filter())->isTrue();
  }

  public function testMissingFieldIsFalse(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "isFalse" on an empty field name');

    (new Filter())->isFalse();
  }

  public function testMissingFieldIsEqualTo(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "isEqualTo" on an empty field name');

    (new Filter())->isEqualTo(1);
  }

  public function testMissingFieldIsGreaterThan(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "isGreaterThan" on an empty field name');

    (new Filter())->isGreaterThan(1);
  }

  public function testMissingFieldIsGreaterThanOrEqualTo(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "isGreaterThanOrEqualTo" on an empty field name');

    (new Filter())->isGreaterThanOrEqualTo(1);
  }

  public function testMissingFieldIsLessThan(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "isLessThan" on an empty field name');

    (new Filter())->isLessThan(1);
  }

  public function testMissingFieldIsLessThanOrEqualTo(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "isLessThanOrEqualTo" on an empty field name');

    (new Filter())->isLessThanOrEqualTo(1);
  }

  public function testMissingFieldIsBetween(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "isBetween" on an empty field name');

    (new Filter())->isBetween(1, 2);
  }

  public function testMissingFieldInArray(): void {
    $this->expectException(LogicException::class);
    $this->expectExceptionMessage('Cannot apply the filter "inArray" on an empty field name');

    (new Filter())->inArray([1, 2, 3]);
  }
}
