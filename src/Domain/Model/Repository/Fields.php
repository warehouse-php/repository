<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

final class Fields implements FieldsInterface {
  /**
   * @var string[]
   */
  private array $fields = [];

  public function __construct(string ...$fields) {
    foreach ($fields as $field) {
      $this->add($field);
    }
  }

  public function add(string $fieldName): static {
    $this->fields[] = $fieldName;

    return $this;
  }

  public function get(): array {
    return $this->fields;
  }

  public function count(): int {
    return count($this->fields);
  }
}
