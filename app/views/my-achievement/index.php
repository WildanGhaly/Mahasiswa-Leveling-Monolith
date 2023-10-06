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
    <title>Achievement</title>
    <link rel="stylesheet" href="../../../public/css/achievement.css">
    <script src="../../../public/js/my-achievement.js"></script>
</head>
<body>
    <?php include "../dashboard/index.php" ?>
    <div class="achievement-container">
        <h1><b>MY-ACHIEVEMENT</b></h1>
        <br>
        <button class="btn" onclick="window.location.href='../achievement'"><b>ACHIEVEMENT</b></button>
        <br><br>
        <div class="search-container">
            <input type="text" class="searchInput" id="searchInput" placeholder="Search...">
            <div class="filter-sort-container">
                <div class="filter-container">
                    <h2>Filter: </h2>
                    <select class="filter-year" id="filter-year">
                        <option value=0>Year</option>
                        <option value=2020>2020</option>
                        <option value=2021>2021</option>
                        <option value=2022>2022</option>
                        <option value=2023>2023</option>
                    </select>
                    <select class="filter-month" id="filter-month">
                        <option value=0>Month</option>
                        <option value=1>January</option>
                        <option value=2>February</option>
                        <option value=3>March</option>
                        <option value=4>April</option>
                        <option value=5>May</option>
                        <option value=6>June</option>
                        <option value=7>July</option>
                        <option value=8>August</option>
                        <option value=9>September</option>
                        <option value=10>October</option>
                        <option value=11>November</option>
                        <option value=12>December</option>
                    </select>
                </div>
                <div class="sort-container">
                    <h2>Sort:   </h2>
                    <select class="sort-by" id="sort-by">
                        <option value="default">Sort</option>
                        <option value="a.id">ID</option>
                        <option value="a.name">Name</option>
                        <option value="time_get">Time</option>
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
                    <th>Time Accuired</th>
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
