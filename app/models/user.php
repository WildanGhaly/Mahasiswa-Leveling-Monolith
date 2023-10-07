<?php

// ini_set('display_errors', 1);

include "../../app/core/database.php";
include "../../config/config.php";

class UserModel
{
  private $table = 'users';
  private $db;

  public function __construct()
  {
    $this->db = Database::getInstance();
  }

  public function findUser($data)
  {
    $query = "SELECT * FROM users WHERE";

    if (isset($data['isAdmin'])){
      $query .= " 1";
    } else {
      $query .= " name IS NOT NULL";
    }  

    if (isset($data['user'])) {
        $query .= " AND (LOWER(name) LIKE ? OR CONVERT(level, CHAR) LIKE ?";
    }

    if (isset($data['isAdmin']) && isset($data['user'])){
      $query .= " OR LOWER(username) LIKE ?)";
    } else if (isset($data['user'])) {
      $query .= ")";
    }  

    if (isset($data['filter'])) {
        if ($data['filter'] === 'level'){
          $query .= " AND level > 5";
        }
        else if ($data['filter'] === 'achievement') {
          $query .= " AND total_achievement > 5";
        } else {
          $query .= "";
        }
      
    }
    if (!isset($data['sort']) || $data['sort'] === 'default') {
      $query .= " ORDER BY LOWER(name)";
    } else {
      $sign = substr($data['sort'], 0, 1);
      $sortby = substr($data['sort'], 1);
      if ($sortby == 'level') {
        $query .= " ORDER BY level";
      } else if ($sortby == 'total_achievement') {
        $query .= " ORDER BY total_achievement";
      }
      if ($sign == '-') {
        $query .= " DESC";
      } else {
        $query .= " ASC";
      }
    }

    if (isset($data['offset'])){
      $offsets = (int)$data['offset'] - 1; 
      $query .= " LIMIT 1 OFFSET {$offsets}";

    } else {
      $query .= " LIMIT 10";
    }

    if (isset($data['page'])) {
      $page = (int)$data['page'];
      $offset = ($page - 1) * 10;
      $query .= " OFFSET " . $offset;
    }

    // echo $query;
    $stmt = $this->db->prepare($query); 
    if (isset($data['user'])) {
      $userInput = '%' . $data['user'] . '%';
      if (isset($data['isAdmin'])){
        $stmt->bind_param("sss", $userInput, $userInput, $userInput);
      }
      else{
        $stmt->bind_param("ss", $userInput, $userInput);
      }
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    $data_final = $result->fetch_all();

    if (isset($data['offset'])){
      $key = "mahasiswa_leveling";
      $data_final[0][4] = openssl_decrypt($data_final[0][4], 'AES-256-CBC', $key, 0, substr(md5($key), 0, 16));

    }
    return $data_final;

  }


}
