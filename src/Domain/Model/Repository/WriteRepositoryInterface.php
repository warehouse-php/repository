<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

interface WriteRepositoryInterface extends RepositoryInterface {
  public function add(EntityInterface ...$entities): static;

  public function remove(EntityInterface ...$entities): static;

  public function inTransaction(callable $transaction): static;
}
