<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

interface FilterProcessorInterface {
  /**
   * Apply the filter to the result set
   */
  public function apply(FilterInterface $filter): static;
}
