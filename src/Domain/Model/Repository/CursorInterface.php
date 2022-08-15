<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

interface CursorInterface {
  public function getPageNumber(): int;
  public function getPageSize(): int;

  public function getFilter(): FilterInterface;
  public function getSort(): SortInterface;
  public function getFields(): FieldsInterface;
  public function getDistinctFields(): FieldsInterface;

  public function getFirstPage(): CursorInterface;
  public function getLastPage(): CursorInterface;

  public function hasPreviousPage(): bool;
  public function getPreviousPage(): CursorInterface;

  public function hasNextPage(): bool;
  public function getNextPage(): CursorInterface;
}
