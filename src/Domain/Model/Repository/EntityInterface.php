<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

interface EntityInterface {
  public function getId(): mixed;
}
