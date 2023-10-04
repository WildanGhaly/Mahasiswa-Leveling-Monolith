<?php
include_once __DIR__."/../session.php";

$conn = Database::getInstance();
$perPage = 5;

$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : $perPage;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$start = ($page - 1) * $limit;

$sql1 = "SELECT * FROM achievement a JOIN achievement_group g ON a.group_id = g.group_id ";
if ($search != ''){
    $sql1 .= " WHERE name LIKE '%$search%'";
}
$sql1 .= "LIMIT $start, $limit";

$sql2 = "SELECT count(id) AS id FROM achievement";
if ($search != ''){
    $sql2 .= " WHERE name LIKE '%$search%'";
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
$paginationButtons = '<ul class="achievement">';
for ($i = 1; $i <= $pages; $i++) {
    $activeClass = ($i == $page) ? 'active' : '';
    $paginationButtons .= "<li><a href='?page=$i&search=$search' class='pagination-link $activeClass' data-page='$i'>$i</a></li>";
}
$paginationButtons .= '</ul>';

$response = [
    'achievementList' => $achievementList,
    'paginationButtons' => $paginationButtons,
];

echo json_encode($response);
?>
