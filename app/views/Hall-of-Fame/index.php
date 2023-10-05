<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall-of-Fame</title>
    <link rel="stylesheet" href="../../../public/css/Hall-of-Fame.css">
    <script src="../../../public/js/Hall-of-Fame.js"></script>
</head>
<body>
    <?php include "../dashboard/index.php" ?>
    <div class="head-container">
        <div class="search-container">
            <input type="text" class="search-box" placeholder="Search..." id="search_input">
            
            <!-- <button class="search-button">Search</button> -->

            <select id="Filter" name="filter">
                <option value="default">Filter</option>
                <option value="level">level > 5</option>
                <option value="achievement">Achievment > 5</option>
                
            </select>

            <select id="Sort" name="sort">
                <option value="default">Sort</option>
                <option value="^level">Level Asc</option>
                <option value="^total_achievement">Achievment Asc</option>
                
            </select>

        </div>
        <h1>Hall of Fame</h1>
    </div>
    
    <script>
        searchUser("<?php echo $_SESSION['filter'] ?>","<?php echo $_SESSION['sort'] ?>","<?php echo $_SESSION['user'] ?>");
    </script>


    <div class="body-container">
        <table id="data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Total Achievement</th>
                    <th>Total quest</th>
                </tr>
            </thead>

            <tbody id="data">
                
            </tbody>

        </table>
    </div>

    <div class="pagination-container">
        <ul class="pagination">
            <li><a href="#" id="Previous" class="prev">Prev</a></li>
            <li><a href="#" id="Next" class="next">Next</a></li>
        </ul>
    </div>


</body>