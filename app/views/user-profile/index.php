<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/user-profile.css">
    <title>My Profile</title>
</head>
<body>
<div class="card">

  <div class="ds-top"></div>
  <div class="avatar-holder">
    <img src="../../../public/img/logo.jpg" alt="">
  </div>
  <div class="ds-level">
    <h6>
      LEVEL 
      <?php include "../../../api/profile/get_level.php"?>
    </h6>
    <div class="skill html">
      <h6>
        <?php include "../../../api/profile/get_progress.php"?>
      </h6>
      <div class="bar bar-level" <?php include "../../../api/profile/get_progress_percent_style.php"?>>
        <p>
          <?php include "../../../api/profile/get_progress_percent.php"?>
        </p>

      </div>
    </div>
  </div>
  <div class="name">
    <a href="" target="_blank">
      <?php include "../../../api/profile/get_name.php"?>
    </a>
    <h6 title="Username"> 
      <?php include "../../../api/profile/get_username.php"?>
    </h6>
  </div>
  <div class="button">
    <a href="#" class="btn">Edit </a>
  </div>
  <div class="ds-info">
    <div class="ds achievements">
      <h6 title="Total achievements">Awards</h6>
      <p>
        <?php include "../../../api/profile/get_awards.php"?>
      </p>
    </div>
    <div class="ds quest">
      <h6 title="Total quest completed">Quest </h6>
      <p>
        <?php include "../../../api/profile/get_quest.php"?>
      </p>
    </div>
  </div>
</div>
</body>
</html>
