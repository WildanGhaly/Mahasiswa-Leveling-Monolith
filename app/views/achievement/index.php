
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
        <h1>Achievement</h1>
        <br><br>
        <div class="search-container">
            <input type="text" class="searchInput" id="searchInput" placeholder="Search...">
            <div class="filter-container">
                <select class="filterDropdown1" id="filterDropdown1">
                    <option value="semua">Semua</option>
                    <option value="kategori1">Kategori 1</option>
                    <option value="kategori2">Kategori 2</option>
                    <option value="kategori3">Kategori 3</option>
                </select>
                <select class="filterDropdown2" id="filterDropdown2">
                    <option value="semua">Semua</option>
                    <option value="kategori1">Kategori 1</option>
                    <option value="kategori2">Kategori 2</option>
                    <option value="kategori3">Kategori 3</option>
                </select>
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
    <script src="../../../public/js/achievement.js"></script>
</body>
</html>
