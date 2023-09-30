<?php

class Database {
  private static $instance;
  private $connection;

  private function __construct($host, $username, $password, $dbname) {
      $this->connection = mysqli_connect($host, $username, $password, $dbname);
      if (!$this->connection) {
          die("Koneksi database gagal: " . mysqli_connect_error());
      }
  }

  public static function getInstance($host, $username, $password, $dbname) {
      if (!self::$instance) {
          self::$instance = new self($host, $username, $password, $dbname);
      }
      return self::$instance->connection;
  }
}
