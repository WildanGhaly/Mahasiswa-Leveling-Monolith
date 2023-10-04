<?php
include_once __DIR__."/../session.php";

$conn = Database::getInstance();
$perPage = 5;

$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : $perPage;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$result = $conn->query("SELECT * FROM achievement LIMIT $start, $limit");
$customers = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query("SELECT count(id) AS id FROM achievement");
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
    $achievementList .= '</tr>';
}

// Data dummy (misalnya dari database)
$dummyData = range(($page - 1) * $perPage + 1, $page * $perPage);

// Buat daftar item achievement
// $achievementList = '<ul>';
// foreach ($dummyData as $item) {
//     $achievementList .= "<li>Achievement $item</li>";
// }
// $achievementList .= '</ul>';

// Buat tombol pagination
$totalPages = 7;
$paginationButtons = '<ul class="achievement">';
for ($i = 1; $i <= $pages; $i++) {
    $activeClass = ($i == $page) ? 'active' : '';
    $paginationButtons .= "<li><a href='?page=$i' class='pagination-link $activeClass' data-page='$i'>$i</a></li>";
}
$paginationButtons .= '</ul>';

$response = [
    'achievementList' => $achievementList,
    'paginationButtons' => $paginationButtons,
    'get' => $_GET['page']
];

header('Content-Type: application/json');
echo json_encode($response);
?>
