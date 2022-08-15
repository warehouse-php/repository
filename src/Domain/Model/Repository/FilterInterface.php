<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

use DateTimeInterface;

interface FilterInterface {
  public function field(string $fieldName): static;

  public function or(): static;

  public function not(): static;

  public function startsWith(string $value): static;

  public function endsWith(string $value): static;

  public function contains(string $value): static;

  public function isNull(): static;

  public function isEmpty(): static;

  public function isTrue(): static;

  public function isFalse(): static;

  public function isEqualTo(string|int|float|DateTimeInterface $value): static;

  public function isGreaterThan(int|float|DateTimeInterface $value): static;

  public function isGreaterThanOrEqualTo(int|float|DateTimeInterface $value): static;

  public function isLessThan(int|float|DateTimeInterface $value): static;

  public function isLessThanOrEqualTo(int|float|DateTimeInterface $value): static;

  public function isBetween(int|float|DateTimeInterface $minValue, int|float|DateTimeInterface $maxValue): static;
  /**
   * @param mixed[] $values
   */
  public function inArray(array $values): static;
  /**
   * Return the list of filters
   *
   * @return array<string, array<string, mixed>>
   */
  public function get(): array;
}
