<?php
namespace src;

use src\model\Clinic;
use src\model\Doctor;
use src\model\DoctorClinicRelation;

class DataParser
{
  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  private function parseData(array $data, string $className): array
  {
    return array_map(fn($item) => new $className($item), $data);
  }

  public function getDoctors(): array
  {
    return $this->parseData($this->data['doctors'], Doctor::class);
  }

  public function getClinics(): array
  {
    return $this->parseData($this->data['clinics'], Clinic::class);
  }

  public function getDoctorClinicRelations(): array
  {
    return $this->parseData($this->data['doctor-clinic'], DoctorClinicRelation::class);
  }

  public function getDoctorsWithClinics(): array
  {
    $doctors = $this->getDoctors();
    $clinics = $this->getClinics();
    $relations = $this->getDoctorClinicRelations();

    foreach ($doctors as $doctor) {
      $doctorClinics = [];

      foreach ($relations as $relation) {
        if ($relation->getDoctorId() == $doctor->getId()) {
          foreach ($clinics as $clinic) {
            if ($clinic->getId() == $relation->getClinicId()) {
              $doctorClinics[] = $clinic;
            }
          }
        }
      }

      $doctor->setClinics($doctorClinics);
    }

    return $doctors;
  }

}