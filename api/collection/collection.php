<?php
include_once __DIR__."/../session.php";
session_start();

$username = $_SESSION['username'];

$conn = Database::getInstance();

$page       = isset($_GET['page']) ? $_GET['page'] : 1;
$limit      = isset($_COOKIE['collection-limit']) ?         $_COOKIE['collection-limit'] : 5;
$search     = isset($_COOKIE['collection-search']) ?        $_COOKIE['collection-search'] : '';
$searchAttr = isset($_COOKIE['collection-search-type']) ?   $_COOKIE['collection-search-type'] : 'name';
$sort       = isset($_COOKIE['collection-sort']) ?          $_COOKIE['collection-sort'] : '';
$sortType   = isset($_COOKIE['collection-order']) ?         $_COOKIE['collection-order'] : 'asc';
$sortType   = $sortType == 'desc' ? 'desc' : 'asc';
$sort       = $sort == 'default' ? '' : $sort;
$start      = ($page - 1) * $limit;

$sql1 = "SELECT c.id as id, c.name as name, c.description as description, c.link as link FROM collection c JOIN users u ON c.user_id = u.id WHERE u.username = '$username'";

if ($search !== '') {
    $sql1 .= " AND $searchAttr LIKE '%$search%'";
}

if ($sort !== '') {
    $sql1 .= " ORDER BY $sort $sortType";
}

$sql1 .= " LIMIT $start, $limit";

$sql2 = "SELECT COUNT(c.id) AS id FROM collection c JOIN users u ON c.user_id = u.id WHERE u.username = '$username'";

if ($search !== '') {
    $sql2 .= " AND a.name LIKE '%$search%'";
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
    $achievementList .= '<td>'.'<audio controls>
    <source src="../../../public/audio/'.$item["link"] .'" type="audio/mpeg">Your browser does not support the audio element.</audio></td>';
    $achievementList .= '<td><button onclick="editFunction('.$item["id"].')">Edit</button></td>';
    $achievementList .= '<td><button onclick="deleteFunction('.$item["id"].')">Delete</button></td>';
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
