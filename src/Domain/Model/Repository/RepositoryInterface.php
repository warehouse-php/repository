<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

interface RepositoryInterface {
  public function count(FilterInterface $filter = null): int;

  public function exists(mixed $id): bool;
}
