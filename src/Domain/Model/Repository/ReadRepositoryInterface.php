<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Repository;

interface ReadRepositoryInterface extends RepositoryInterface {
  public function find(mixed $id, FieldsInterface $fields = null): EntityInterface;

  public function findBy(FilterInterface $filter, Sort $sort = null, FieldsInterface $fields = null): CollectionInterface;

  public function findDistinctBy(FieldsInterface $distinctFields, FilterInterface $filter = null, Sort $sort = null, FieldsInterface $fields = null): CollectionInterface;
}
