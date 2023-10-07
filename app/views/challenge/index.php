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
    <title>Challenge</title>
    <link rel="stylesheet" href="../../../public/css/achievement.css">
    <link rel="stylesheet" href="../../../public/css/challenge.css">
    <script src="../../../public/js/challenge.js"></script> 
</head>
<body>
    <?php include "../dashboard/index.php" ?>
    <div class="achievement-container">
        <div id="overlay" class="overlay"></div>
        <h1 id="challenge-title"><b>CHALLENGE</b></h1>
        <progress value="0" max="100" style="display: none;"></progress>
        <div class="status" id="status"></div>
        <br><br>
        <div class="search-container">
            <div class="full-search-container">
                <input type="text" class="searchInput" id="searchInput" placeholder="Search...">
                <select class="search-attribute" id="search-attribute" aria-labelledby="challenge-title">
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                    <option value="description">Description</option>
                    <option value="threshold">Threshold</option>
                </select>
            </div>
            <div class="filter-sort-container">
                <div class="sort-container">
                    <h2 id="challenge-sort">Sort:   </h2>
                    <select class="sort-by" id="sort-by" aria-labelledby="challenge-sort">
                        <option value="default">Sort</option>
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="description">Description</option>
                        <option value="threshold">Threshold</option>
                    </select>
                    <select class="sort-type" id="sort-type" aria-labelledby="challenge-sort">
                        <option value="default">Sort-Type</option>
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
            </div>
        </div>
        <br><br>
        <div class="filter-box">
            <select class="page-limit" id="page-limit" aria-labelledby="challenge-title">
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
                    <th>Status</th>
                    <th>Claim</th>
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
