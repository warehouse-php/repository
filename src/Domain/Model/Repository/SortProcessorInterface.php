<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

interface SortProcessorInterface {
  /**
   * Apply the sort to the result set
   */
  public function apply(SortInterface $sort): static;
}
