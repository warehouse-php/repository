<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

interface PaginatedRepositoryInterface {
  public function findAll(CursorInterface $cursor = null): PageInterface;
}
