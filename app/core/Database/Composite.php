<?php

namespace app\core\Database;

use Countable;
use function count;
use function implode;

class Composite implements Countable
{

  public const TYPE_AND = 'AND';
  public const TYPE_OR = 'OR';
  private $type;
  private $parts = [];

  public function __construct($type, array $parts = [])
  {
    $this->type = $type;
    $this->addMultiple($parts);
  }

  public function addMultiple(array $parts = [])
  {
    foreach ($parts as $part) {
      $this->add($part);
    }

    return $this;
  }

  public function add($part)
  {
    if (empty($part)) {
      return $this;
    }

    if ($part instanceof self && count($part) === 0) {
      return $this;
    }

    $this->parts[] = $part;

    return $this;
  }

  public function count()
  {
    return count($this->parts);
  }

  public function __toString()
  {
    if ($this->count() === 1) {
      return (string) $this->parts[0];
    }

    return '(' . implode(') ' . $this->type . ' (', $this->parts) . ')';
  }

  public function getType()
  {
    return $this->type;
  }
}
