<?php

namespace src\model;

class Clinic
{
  private $id;
  private $name;

  public function __construct(array $data = [])
  {
    $this->setAttributes($data);
  }

  public function setAttributes(array $data): void
  {
    foreach ($data as $key => $value) {
      if (property_exists($this, $key)) {
        $this->$key = $value;
      }
    }
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id): void
  {
    $this->id = $id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name): void
  {
    $this->name = $name;
  }
}