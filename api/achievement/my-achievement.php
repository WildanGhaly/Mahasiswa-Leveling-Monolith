<?php
include_once __DIR__."/../session.php";
session_start();

$username = $_SESSION['username'];

$conn = Database::getInstance();

$page       = isset($_GET['page']) ? $_GET['page'] : 1;
$limit      = isset($_COOKIE['my-achievement-limit']) ? $_COOKIE['my-achievement-limit'] : 5;
$search     = isset($_COOKIE['my-achievement-search']) ? $_COOKIE['my-achievement-search'] : '';
$sort       = isset($_COOKIE['my-achievement-sort']) ? $_COOKIE['my-achievement-sort'] : '';
$sortType   = isset($_COOKIE['my-achievement-order']) ? $_COOKIE['my-achievement-order'] : 'asc';
$sortType   = $sortType == 'desc' ? 'desc' : 'asc';
$sort       = $sort == 'default' ? '' : $sort;
$start      = ($page - 1) * $limit;

$sql1 = "SELECT * FROM users u
         JOIN user_achievement ua ON u.id = ua.user_id
         JOIN achievement a ON ua.achievement_id = a.id
         WHERE u.username = '$username'";

$whereClauses = [];

if ($search !== '') {
    $whereClauses[] = "a.name LIKE '%$search%'";
}

if (!empty($whereClauses)) {
    $sql1 .= " " . implode(' AND ', $whereClauses);
}

if ($sort !== '') {
    $sql1 .= " ORDER BY $sort $sortType";
}

$sql1 .= " LIMIT $start, $limit";

$sql2 = "SELECT COUNT(ua.user_id) AS id FROM user_achievement ua
         WHERE ua.user_id = (SELECT id FROM users WHERE username = '$username')";

$whereClauses = [];

if ($search !== '') {
    $whereClauses[] = "name LIKE '%$search%'";
}

if (!empty($whereClauses)) {
    $sql2 .= " WHERE " . implode(' AND ', $whereClauses);
}

$result = $conn->query($sql1);
$customers = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query($sql2);
$custCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $custCount[0]['id'];
$pages = ceil( $total / $limit );

$Previous = $page - 1;
$Next = $page + 1;

$achievementList = '';
foreach ($customers as $item) {
    $achievementList .= '<tr>';
    $achievementList .= '<td>'.$item["id"].'</td>   ';
    $achievementList .= '<td>'.$item["name"].'</td>   ';
    $achievementList .= '<td>'.$item["time_get"].'</td>   ';
    $achievementList .= '</tr>';
}

// Buat tombol pagination
$previous   = ($page == 1) ? 1 : $page - 1;
$next       = ($page == $pages) ? $pages : $page + 1;
$first      = 1;
$last       = $pages;

$paginationButtons = '<ul class="achievement">';

if ($page > 1){
    $paginationButtons .= "<li><a href='?page=$first' class='pagination-link' data-page='$first'><b>&lt;&lt;</b></a></li>";
    $paginationButtons .= "<li><a href='?page=$previous' class='pagination-link' data-page='$previous'><b>&lt;</b></a></li>";
}

$range = 5; 
$start = max(1, $page - $range);
$end = min($pages, $page + $range);

for ($i = $start; $i <= $end; $i++) {
    $activeClass = ($i == $page) ? 'active' : '';
    $paginationButtons .= "<li><a href='?page=$i' class='pagination-link $activeClass' data-page='$i'>$i</a></li>";
}

if ($page < $pages){
    $paginationButtons .= "<li><a href='?page=$next' class='pagination-link' data-page='$next'><b>&gt;</b></a></li>";
    $paginationButtons .= "<li><a href='?page=$last' class='pagination-link' data-page='$last'><b>&gt;&gt;</b></a></li>";
}

$paginationButtons .= '</ul>';

$response = [
    'achievementList' => $achievementList,
    'paginationButtons' => $paginationButtons,
    'query1' => $sql1,
    'query2' => $sql2,

];

echo json_encode($response);
?>
