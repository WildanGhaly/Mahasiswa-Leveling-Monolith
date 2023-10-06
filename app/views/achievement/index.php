<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login');
    return;
}
?>

<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievement</title>
    <link rel="stylesheet" href="../../../public/css/achievement.css">
    <script src="../../../public/js/achievement.js"></script>
</head>
<body>
    <?php include "../dashboard/index.php" ?>
    <div class="achievement-container">
        <h1><b>ACHIEVEMENT</b></h1>
        <br>
        <button class="btn" onclick="window.location.href='../my-achievement'"><b>MY ACHIEVEMENT</b></button>
        <br><br>
        <div class="search-container">
            <input type="text" class="searchInput" id="searchInput" placeholder="Search...">
            <div class="filter-sort-container">
                <div class="filter-container">
                    <h2>Filter: </h2>
                    <select class="filter-difficulty" id="filter-difficulty">
                        <option value="semua">Difficulty</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                    </select>
                    <select class="filter-type" id="filter-type">
                        <option value=0>Category</option>
                        <option value=1>Cardio Achievements</option>
                        <option value=2>Strength Achievements</option>
                        <option value=3>Flexibility and Balance Achievements</option>
                        <option value=4>Variety and Endurance Achievements</option>
                        <option value=5>Mindfulness and Wellness Achievements</option>
                        <option value=6>General Fitness Achievements</option>
                    </select>
                </div>
                <div class="sort-container">
                    <h2>Sort:   </h2>
                    <select class="sort-by" id="sort-by">
                        <option value="default">Sort</option>
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="difficulty">Difficulty</option>
                        <option value="a.group_id">Category</option>
                    </select>
                    <select class="sort-type" id="sort-type">
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
                    <th>Difficulty</th>
                    <th>Category</th>
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
