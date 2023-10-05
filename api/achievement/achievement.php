<?php
include_once __DIR__."/../session.php";

$conn = Database::getInstance();

$page       = isset($_GET['page']) ? $_GET['page'] : 1;
$limit      = isset($_COOKIE['achievement-limit']) ? $_COOKIE['achievement-limit'] : 5;
$difficulty = isset($_COOKIE['achievement-difficulty']) ? $_COOKIE['achievement-difficulty'] : 'semua';
$type       = isset($_COOKIE['achievement-type']) ? $_COOKIE['achievement-type'] : 0;
$search     = isset($_COOKIE['achievement-search']) ? $_COOKIE['achievement-search'] : '';
$start      = ($page - 1) * $limit;

$sql1 = "SELECT * FROM achievement a 
         JOIN achievement_group g ON a.group_id = g.group_id";

$whereClauses = [];

if ($difficulty !== 'semua') {
    $whereClauses[] = "a.difficulty = '$difficulty'";
}

if ($type != 0) {
    $whereClauses[] = "a.group_id = $type";
}

if ($search !== '') {
    $whereClauses[] = "a.name LIKE '%$search%'";
}

if (!empty($whereClauses)) {
    $sql1 .= " WHERE " . implode(' AND ', $whereClauses);
}

$sql1 .= " LIMIT $start, $limit";

$sql2 = "SELECT COUNT(id) AS id FROM achievement";

$whereClauses = [];

if ($difficulty !== 'semua') {
    $whereClauses[] = "difficulty = '$difficulty'";
}

if ($type != 0) {
    $whereClauses[] = "group_id = $type";
}

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
    $achievementList .= '<td>'.$item["description"].'</td>   ';
    $achievementList .= '<td>'.$item["threshold"].'</td>';
    $achievementList .= '<td>'.$item["difficulty"].'</td>';
    $achievementList .= '<td>'.$item["group_name"].'</td>'; 
    $achievementList .= '</tr>';
}

// Buat tombol pagination
$previous   = ($page == 1) ? 1 : $page - 1;
$next       = ($page == $pages) ? $pages : $page + 1;
$first      = 1;
$last       = $pages;
$paginationButtons = '<ul class="achievement">';
$paginationButtons .= "<li><a href='?page=$first' class='pagination-link' data-page='$first'>&lt;&lt;</a></li>";
$paginationButtons .= "<li><a href='?page=$previous' class='pagination-link' data-page='$Previous'>&lt;</a></li>";
for ($i = 1; $i <= $pages; $i++) {
    $activeClass = ($i == $page) ? 'active' : '';
    $paginationButtons .= "<li><a href='?page=$i' class='pagination-link $activeClass' data-page='$i'>$i</a></li>";
}
$paginationButtons .= "<li><a href='?page=$next' class='pagination-link' data-page='$Next'>&gt;</a></li>";
$paginationButtons .= "<li><a href='?page=$last' class='pagination-link' data-page='$last'>&gt;&gt;</a></li>";
$paginationButtons .= '</ul>';

$response = [
    'achievementList' => $achievementList,
    'paginationButtons' => $paginationButtons,
    'query1' => $sql1,
    'query2' => $sql2,

];

echo json_encode($response);
?>
