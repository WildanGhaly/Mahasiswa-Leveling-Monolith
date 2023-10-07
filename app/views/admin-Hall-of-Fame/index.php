<?php
session_start();

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== '1') {
    header('Location: go+away+you+hackers');
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall-of-Fame</title>
    <link rel="stylesheet" href="../../../public/css/add-Hall-of-Fame.css">
    <script src="../../../public/js/register.js"></script>
    <script src="../../../public/js/admin-Hall-of-Fame.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    

</head>

<body>
    <?php include "../dashboard/index.php" ?>
    <h1>Add User</h1>
    <div id="form">
        <form  class="form-grid" id="userForm">

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
        </div>
            
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
        </div>


        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required><br>
        </div>

        <div class="form-group">
            <label for="isAdmin">Is Admin:</label>
            <input type="text" id="isAdmin" name="isAdmin" required><br>
         </div>

        <div class="form-group">
            <label for="image_path">Image Path:</label>
            <input type="text" id="image_path" name="image_path" required><br>
         </div>

        <div class="form-group">
            <label for="total_achievement">Total Achievement:</label>
            <input type="text" id="total_achievement" name="total_achievement" required><br>
         </div>

        <div class="form-group">
            <label for="total_quest">Total Quest:</label>
            <input type="text" id="total_quest" name="total_quest" required ><br>
         </div>

        <div class="form-group">
            <label for="level">Level:</label>
            <input type="text" id="level" name="level" required><br>
         </div>

        <div class="form-group">
            <label for="current_experience">Current Experience:</label>
            <input type="text" id="current_experience" name="current_experience" required><br>
         </div>

        <div class="form-group">
            <label for="target_experience">Target Experience:</label>
            <input type="text" id="target_experience" name="target_experience" required><br>
         </div>

        <div class="form-group">
            <input type="submit" value="Add User">
         </div>
            
        </form>
    </div>
</body>
</html>