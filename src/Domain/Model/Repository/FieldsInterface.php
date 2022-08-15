<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

use Countable;

interface FieldsInterface extends Countable {
  /**
   * Add a new field to the list
   */
  public function add(string $fieldName): static;
  /**
   * Return the list of fields
   *
   * @return string[]
   */
  public function get(): array;
}
