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
    $query = "SELECT * FROM users WHERE name IS NOT NULL";
    if (isset($data['user'])) {
        $query .= " AND (LOWER(name) LIKE ? OR CONVERT(level, CHAR) LIKE ?)";
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
    if (!isset($data['sort']) || $data['sort'] === 'Default') {
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

    $query .= " LIMIT 10";

    if (isset($data['page'])) {
      $page = (int)$data['page'];
      $offset = ($page - 1) * 10;
      $query .= " OFFSET " . $offset;
    }

    // echo $query;
    $stmt = $this->db->prepare($query); 
    if (isset($data['user'])) {
      $userInput = '%' . $data['user'] . '%';
      $stmt->bind_param("ss", $userInput, $userInput);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all();
    

    return $data;

  }


}
