<?php
include_once __DIR__."/../session.php";
session_start();

$username = $_SESSION['username'];

$conn = Database::getInstance();

$page       = isset($_GET['page']) ? $_GET['page'] : 1;
$limit      = isset($_COOKIE['challenge-limit']) ?         $_COOKIE['challenge-limit'] : 5;
$search     = isset($_COOKIE['challenge-search']) ?        $_COOKIE['challenge-search'] : '';
$searchAttr = isset($_COOKIE['challenge-search-type']) ?   $_COOKIE['challenge-search-type'] : 'name';
$sort       = isset($_COOKIE['challenge-sort']) ?          $_COOKIE['challenge-sort'] : '';
$sortType   = isset($_COOKIE['challenge-order']) ?         $_COOKIE['challenge-order'] : 'asc';
$sortType   = $sortType == 'desc' ? 'desc' : 'asc';
$sort       = $sort == 'default' ? '' : $sort;
$start      = ($page - 1) * $limit;

$sql1 = "SELECT * FROM quest";

if ($search !== '') {
    $sql1 .= " WHERE $searchAttr LIKE '%$search%'";
}

if ($sort !== '') {
    $sql1 .= " ORDER BY $sort $sortType";
}

$sql1 .= " LIMIT $start, $limit";

$sql2 = "SELECT COUNT(id) AS id FROM quest";

if ($search !== '') {
    $sql2 .= " AND name LIKE '%$search%'";
}

$result = $conn->query($sql1);
$customers = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query($sql2);
$custCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $custCount[0]['id'];
$pages = ceil( $total / $limit );

$Previous = $page - 1;
$Next = $page + 1;

function getUserId($username){
    $conn = Database::getInstance();
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    $customers = $result->fetch_all(MYSQLI_ASSOC);
    return $customers[0]['id'];
}

function getStatusClaim($user_id, $quest_id){
    $conn = Database::getInstance();
    $sql = "SELECT * FROM user_quest WHERE user_id = $user_id AND quest_id = $quest_id";
    $result = $conn->query($sql);
    $customers = $result->fetch_all(MYSQLI_ASSOC);
    if (count($customers) > 0){
        return true;
    } else {
        return false;
    }
}

$user_id = getUserId($username);

$achievementList = '';
foreach ($customers as $item) {
    $claimStatus     = getStatusClaim($user_id, $item["id"]);
    $achievementList .= '<tr>';
    $achievementList .= '<td>'.$item["id"].'</td>   ';
    $achievementList .= '<td>'.$item["name"].'</td>   ';
    $achievementList .= '<td>'.$item["description"].'</td>   ';
    $achievementList .= '<td>'.$item["threshold"].'</td>   ';
    $achievementList .= '<td>';
    if ($claimStatus){
        $achievementList .= '<button id="cobtain" onclick=#>Obtained </button>';
    } else {
        $achievementList .= '<button id="obtain-not" onclick=#>Unobtained </button>';
    }
    $achievementList .= '</td><td>';
    if (!$claimStatus){
        $achievementList .= '<button id="claim" onclick=claimFunction(' .$user_id. ',' .$item["id"]. ')>Claim</button>';
    } else {
        $achievementList .= '<button id="claim-not" onclick=unclaimFunction(' .$user_id. ',' .$item["id"]. ')>Unclaim</button>';
    }
    $achievementList .= '</td></tr>';   
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
