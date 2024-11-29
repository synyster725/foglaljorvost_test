<?php
require 'vendor/autoload.php';
$config = require __DIR__ . '/src/config/config.php';

use src\controller\DoctorController;

$controller = new DoctorController($config);
$controller->index();

