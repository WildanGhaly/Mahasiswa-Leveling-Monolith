<?php
// load_achievement.php
$perPage = 5; // Jumlah item per halaman
$page = $_GET['page'];

// Data dummy (misalnya dari database)
$dummyData = range(($page - 1) * $perPage + 1, $page * $perPage);

// Buat daftar item achievement
$achievementList = '<ul>';
foreach ($dummyData as $item) {
    $achievementList .= "<li>Achievement $item</li>";
}
$achievementList .= '</ul>';

// Buat tombol pagination
$totalPages = 7;
$paginationButtons = '<ul class="achievement">';
for ($i = 1; $i <= $totalPages; $i++) {
    $activeClass = ($i == $page) ? 'active' : '';
    $paginationButtons .= "<li><a href='?page=$i' class='pagination-link $activeClass' data-page='$i'>$i</a></li>";
}
$paginationButtons .= '</ul>';

$response = [
    'achievementList' => $achievementList,
    'paginationButtons' => $paginationButtons
];

header('Content-Type: application/json');
echo json_encode($response);
?>
