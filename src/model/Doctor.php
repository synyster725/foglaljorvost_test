<?php

namespace src\model;

class Doctor
{
  private $id;
  private $name;
  private $specialty;
  private $clinics = [];

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

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getSpecialty() {
    return $this->specialty;
  }

  public function getClinics() {
    return $this->clinics;
  }

  public function setClinics(array $clinics) {
    $this->clinics = $clinics;
  }

  public function getClinicsAsString()
  {
    return implode(', ', array_map(fn($clinic) => $clinic->getName(), $this->clinics));
  }

  public function searchByName(array $doctors, $query): array
  {
    if (empty($query)) {
      return $doctors;
    }

    return array_filter($doctors, function ($doctor) use ($query) {
      return stripos($doctor->getName(), $query) !== false;
    });
  }
}

