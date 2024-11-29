<?php

namespace src\controller;

use src\model\Doctor;
use src\DataParser;
use src\LoadData;

class DoctorController
{
  private $config;

  public function __construct($config)
  {
    $this->config = $config;
  }

  public function index()
  {
    try {
      // Adatok betöltése és feldolgozása
      $dataLoader = new LoadData($this->config);
      $jsonData = $dataLoader->loadData();
      $dataParser = new DataParser($jsonData);
      $doctorsWithClinics = $dataParser->getDoctorsWithClinics();

      // Keresés lekérdezés alapján
      $query = isset($_GET['query']) ? trim($_GET['query']) : '';
      $filteredDoctors = (new Doctor())->searchByName($doctorsWithClinics, $query);

      // Nézet betöltése
      $this->loadView('doctors', [
        'query' => $query,
        'doctors' => $filteredDoctors,
      ]);
    } catch (\Exception $e) {
      $this->loadView('error', ['message' => $e->getMessage()]);
    }
  }

  private function loadView($view, $data = [])
  {
    extract($data);
    require __DIR__ . '/../views/' . $view . '.php';
  }
}
