<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

use Countable;

interface SortInterface extends Countable {
  /**
   * Set the order for a field
   */
  public function setOrderFor(string $fieldName, OrderEnum $order);
  /**
   * Return the sort order for a field
   */
  public function getOrderFor(string $fieldName): OrderEnum;
  /**
   * Return the list of sort order
   *
   * @return array<string, OrderEnum>
   */
  public function get(): array;
}
