<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login');
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievement-Admin</title>
    <link rel="stylesheet" href="../../../public/css/achievement.css">
    <link rel="stylesheet" href="../../../public/css/achievement-admin.css">
    <script src="../../../public/js/achievement-admin.js"></script>
    <script src="../../../public/js/achievement-crud.js"></script>
</head>
<body>
    <?php include "../dashboard/index.php" ?>
    <div class="achievement-container">
        <div id="achievement-popup" class="achievement-popup">
            <h2>Edit</h2>
            <p>Change the achievement information</p>
            <input type="text" id="achievement-name-input" class="achievement-name-input" placeholder="Name">
            <br>
            <textarea id="achievement-description-input" name="achievement-description-input" rows="5" cols="50" placeholder="Description"></textarea>
            <br>
            <textarea id="achievement-threshold-input" name="achievement-threshold-input" rows="5" cols="50" placeholder="Threshold"></textarea>
            <br>
            <select id="achievement-difficulty-input" name="achievement-difficulty-input">
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
            <br>
            <select id="achievement-type-input" name="achievement-type-input">
                <option value=1>Cardio Achievements</option>
                <option value=2>Strength Achievements</option>
                <option value=3>Flexibility and Balance Achievements</option>
                <option value=4>Variety and Endurance Achievements</option>
                <option value=5>Mindfulness and Wellness Achievements</option>
                <option value=6>General Fitness Achievements</option>
            </select>
            <br>
            <button id="save-achievement-popup" class="save-achievement-popup">Save</button>
            <button id="close-achievement-popup" class="close-achievement-popup">Cancel</button>
        </div>
        <div id="overlay" class="overlay"></div>
        <h1><b>ACHIEVEMENT-ADMIN</b></h1>
        <button class="btn" onclick="window.location.href='../achievement'"><b>ACHIEVEMENT</b></button>
        <button class="btn" id="add-achievement" onclick="window.location.href='#'"><b>ADD ACHIEVEMENT</b></button>
        <button class="btn" onclick="window.location.href='../my-achievement'"><b>MY ACHIEVEMENT</b></button>
        <div class="status" id="status"></div>
        <br><br>
        <div class="search-container">
            <div class="full-search-container">
                <input type="text" class="searchInput" id="searchInput" placeholder="Search...">
                <select class="search-attribute" id="search-attribute" aria-labelledby="achievement-title">
                    <option value="a.id">ID</option>
                    <option value="a.name">Name</option>
                    <option value="a.description">Description</option>
                    <option value="a.threshold">Threshold</option>
                </select>
            </div>
            <div class="filter-sort-container">
                <div class="sort-container">
                    <h2>Sort:   </h2>
                    <select class="sort-by" id="sort-by">
                        <option value="default">Sort</option>
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="description">Description</option>
                        <option value="threshold">Threshold</option>
                    </select>
                    <select class="sort-type" id="sort-type">
                        <option value="default">Sort-Type</option>
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
            </div>
        </div>
        <br><br>
        <div class="filter-box">
            <select class="page-limit" id="page-limit">
                <option value=5>5</option>
                <option value=10>10</option>
                <option value=15>15</option>
                <option value=20>20</option>
            </select>
        </div>
        <table class="achievement-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Threshold</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="achievement-list" id="achievement-list">
                <!-- Data achievement di sini -->
            </tbody>
        </table>
        
        <div class="pagination">
            <div id="pagination-buttons">
                <!-- Tombol pagination akan dimuat di sini menggunakan AJAX -->
            </div>
        </div>
        
    </div>
</body>
</html>
