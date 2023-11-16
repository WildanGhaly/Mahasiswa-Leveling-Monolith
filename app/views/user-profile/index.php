<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login/');
    return;
}
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
  <?php include "../dashboard/index.php" ?>
<div class="card">

  <div class="ds-top"></div>
  <div class="avatar-holder">
    <img src="<?php include "../../../api/profile/get_image.php"?>"  alt="">
  </div>
  <div class="ds-level">
    <h1>
      LEVEL 
      <?php include "../../../api/profile/get_level.php"?>
    </h1>
    <div class="skill html">
      <h1>
        <?php include "../../../api/profile/get_progress.php"?>
      </h1>
      <div class="bar bar-level" <?php include "../../../api/profile/get_progress_percent_style.php"?>>
        <p>
          <?php include "../../../api/profile/get_progress_percent.php"?>
        </p>

      </div>
    </div>
  </div>
  <div class="name">
    <a href="#">
      <?php include "../../../api/profile/get_name.php"?>
    </a>
    <h1 title="Username"> 
      <?php include "../../../api/profile/get_username.php"?>
    </h1>
    <h1 class="code" title="Code">
      <?php include "../../../api/profile/get_code.php"?>
    </h1>
  </div>
  <div class="button">
    <button type="submit" class="btn" onclick="window.location.href='../edit-profile'">Edit</button>
  </div>
  <div class="ds-info">
    <div class="ds achievements">
      <h1 title="Total achievements">Awards</h1>
      <p>
        <?php include "../../../api/profile/get_awards.php"?>
      </p>
    </div>
    <div class="ds quest">
      <h1 title="Total quest completed">Quest </h1>
      <p>
        <?php include "../../../api/profile/get_quest.php"?>
      </p>
    </div>
  </div>
</div>
</body>
</html>
