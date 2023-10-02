<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/edit-profile.css">
    <script src="../../../public/js/edit-profile.js"></script>
    <title>My Profile</title>
</head>
<body>
  <?php include "../dashboard/index.php" ?>
<div class="card">
  <div class="ds-top"></div>
  <div class="avatar-holder" onclick="selectImage()">
    <input type="file" id="imageInput" onchange="uploadImage()">
    <img id='profile-image' src="<?php include "../../../api/profile/get_image.php";?>" alt="">
    <div class="edit-text">Edit</div>
  </div>
  <form id="updateForm"> 
    <div class="name">
        <h5><label for="username"><?php echo $_SESSION['username'] ?></label></h5><br><br>
        <a><label for="name">Nama:</label></a>
            <input type="text" id="name" name="name" value="<?php include "../../../api/profile/get_name.php"?>" required>
            <br><br>
        <a><label for="email">Email:</label></a>
            <input type="email" id="email" name="email" value="<?php include "../../../api/profile/get_email.php"?>" required>
            <br><br>
        <a><label for="old-password">Old-pw:</label></a>
            <input type="password" id="old-password" name="old-password" value="">
            <br><br>
        <a><label for="new-password">New-pw:</label></a>
            <input type="password" id="new-password" name="new-password" value="">
            <br><br>
    </div>
    <div class="button">
      <button type="submit" class="btn">Save</button>
    </div>
  </form>
</div>

</body>
</html>
