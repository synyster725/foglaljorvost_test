<?php

namespace src;

use Exception;

class LoadData
{
    public $config;

    public function __construct($config) {
      $this->config = $config;
    }

  public function loadData() {
    $response = $this->curlRequest($this->config['url']);
    return json_decode($response, true);
  }

  private function curlRequest(string $url): string {
    $ch = curl_init($url);

    curl_setopt_array($ch, [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYHOST => 2,
      CURLOPT_SSL_VERIFYPEER => true,
      CURLOPT_TIMEOUT => 30,
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
      throw new Exception('cURL hiba: ' . curl_error($ch));
    }

    curl_close($ch);

    return $response;
  }
}

