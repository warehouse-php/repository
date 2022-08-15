<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

use DateTimeInterface;
use InvalidArgumentException;
use LogicException;

final class Filter implements FilterInterface {
  /**
   * @var array<string, array<string, mixed>>
   */
  private array $filter = [];
  private string $currentField = '';
  private bool $or = false;
  private bool $not = false;

  public function field(string $fieldName): static {
    $this->currentField = $fieldName;

    return $this;
  }

  public function or(): static {
    $this->or = true;

    return $this;
  }

  public function not(): static {
    $this->not = true;

    return $this;
  }

  public function startsWith(string $value): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "startsWith" on an empty field name');
    }

    if ($value === '') {
      throw new InvalidArgumentException('Argument "value" must not be empty');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'startsWith',
      'value'  => $value,
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function endsWith(string $value): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "endsWith" on an empty field name');
    }

    if ($value === '') {
      throw new InvalidArgumentException('Argument "value" must not be empty');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'endsWith',
      'value'  => $value,
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function contains(string $value): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "contains" on an empty field name');
    }

    if ($value === '') {
      throw new InvalidArgumentException('Argument "value" must not be empty');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'contains',
      'value'  => $value,
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function isNull(): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "isNull" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'isNull',
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function isEmpty(): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "isEmpty" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'isEmpty',
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function isTrue(): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "isTrue" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'isTrue',
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function isFalse(): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "isFalse" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'isFalse',
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function isEqualTo(string|int|float|DateTimeInterface $value): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "isEqualTo" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'isEqualTo',
      'value'  => $value,
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function isGreaterThan(int|float|DateTimeInterface $value): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "isGreaterThan" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'isGreaterThan',
      'value'  => $value,
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function isGreaterThanOrEqualTo(int|float|DateTimeInterface $value): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "isGreaterThanOrEqualTo" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'isGreaterThanOrEqualTo',
      'value'  => $value,
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function isLessThan(int|float|DateTimeInterface $value): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "isLessThan" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'isLessThan',
      'value'  => $value,
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function isLessThanOrEqualTo(int|float|DateTimeInterface $value): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "isLessThanOrEqualTo" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'isLessThanOrEqualTo',
      'value'  => $value,
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function isBetween(int|float|DateTimeInterface $minValue, int|float|DateTimeInterface $maxValue): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "isBetween" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->or ? 'OR' : 'AND',
      'filter' => 'isBetween',
      'value'  => [$minValue, $maxValue],
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function inArray(array $values): static {
    if ($this->currentField === '') {
      throw new LogicException('Cannot apply the filter "inArray" on an empty field name');
    }

    $this->filter[$this->currentField][] = [
      'glue'   => $this->inArraye,
      'filter' => 'endsWith',
      'value'  => $value,
      'not'    => $this->not
    ];

    $this->or  = false;
    $this->not = false;

    return $this;
  }

  public function get(): array {
    return $this->filter;
  }
}
