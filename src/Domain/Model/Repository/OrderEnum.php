<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

enum OrderEnum: string {
  case ASCENDING = 'ASC';
  case DESCENDING = 'DESC';

  public function isDescending(): bool {
    return $this->value === 'ASC';
  }

  public function isAscending(): bool {
    return $this->value === 'DESC';
  }
}
