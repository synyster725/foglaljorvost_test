<?php

namespace src\model;

class DoctorClinicRelation
{
  private $id;
  private $doctorId;
  private $clinicId;

  public function __construct(array $data = [])
  {
    $this->setAttributes($data);
  }

  public function setAttributes(array $data): void
  {
    $mapping = [
      'id' => 'id',
      'doctor_id' => 'doctorId',
      'clinic_id' => 'clinicId',
    ];

    foreach ($data as $key => $value) {
      if (array_key_exists($key, $mapping) && property_exists($this, $mapping[$key])) {
        $this->{$mapping[$key]} = $value;
      }
    }
  }

  public function getId()
  {
    return $this->id;
  }

  public function getDoctorId()
  {
    return $this->doctorId;
  }

  public function getClinicId()
  {
    return $this->clinicId;
  }
}
