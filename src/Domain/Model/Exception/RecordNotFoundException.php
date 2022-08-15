<?php
declare(strict_types = 1);

namespace Warehouse\Domain\Model\Exception;

class RecordNotFoundException extends ModelException {
  /**
   * @var string
   */
  protected $message = 'Record not found';
}
