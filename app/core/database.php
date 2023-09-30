<?php

class Database {
  private static $instance;
  private $connection;

  private function __construct() {
      $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      if (!$this->connection) {
          die("Koneksi database gagal: " . mysqli_connect_error());
      }
  }

  public static function getInstance() {
      if (!self::$instance) {
          self::$instance = new self();
      }
      return self::$instance->connection;
  }
}
