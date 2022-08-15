<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

interface PageInterface {
  public function isFirst(): bool;
  public function isLast(): bool;

  public function hasPrevious(): bool;
  public function hasNext(): bool;

  public function getPageNumber(): int;
  public function getPageSize(): int;
  public function getPageCount(): int;

  public function getSort(): SortInterface;
  public function getFields(): FieldsInterface;
  public function getDistinctFields(): FieldsInterface;

  public function getContent(): CollectionInterface;
}
