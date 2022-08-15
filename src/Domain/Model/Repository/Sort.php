<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

use InvalidArgumentException;

final class Sort implements SortInterface {
  /**
   * @var array<string, OrderEnum>
   */
  private array $sort = [];

  public function __construct(array $sort = []) {
    foreach ($sort as $fieldName => $order) {
      if (is_string($fieldName) === false) {
        throw new InvalidArgumentException(
          sprintf(
            'Argument "fieldName" must be of type "string", "%s" given',
            is_scalar($fieldName) ? gettype($fieldName) : $fieldName::class
          )
        );
      }

      if (($order instanceof OrderEnum) === false) {
        throw new InvalidArgumentException(
          sprintf(
            'Argument "order" must be an instance of "OrderEnum", "%s" given',
            is_scalar($fieldName) ? gettype($fieldName) : $fieldName::class
          )
        );
      }

      $this->sort[$fieldName] = $order;
    }
  }

  /**
   * Set the order for a field
   */
  public function setOrderFor(string $fieldName, OrderEnum $order) {
    $this->sort[$fieldName] = $order;
  }

  /**
   * Return the sort order for a field
   */
  public function getOrderFor(string $fieldName): OrderEnum {
    if (isset($this->sort[$fieldName])) {
      return $this->sort[$fieldName];
    }

    throw new InvalidArgumentException(
      sprintf(
        'Order for field "%s" has not been set',
        $fieldName
      )
    );
  }

  public function get(): array {
    return $this->sort;
  }

  public function count(): int {
    return count($this->sort);
  }
}
