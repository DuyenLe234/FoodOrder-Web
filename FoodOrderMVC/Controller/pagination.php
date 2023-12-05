<?php
// pagination.php

include '../Model/Database.php';

$database = new Database();
$conn = $database->getConnection();

$results_per_page = 6;

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    // Cast to integer to ensure it's numeric
    $page = (int)$_GET['page'];
}

$start_from = (int)($page - 1) * $results_per_page;



if (!empty($_GET['keyword'])) {
    // Handle search
    $keyword = $_GET['keyword'];

    $query = "SELECT idmonan, tenmonan, gia, hinhanh FROM monan WHERE tenmonan LIKE :keyword LIMIT $start_from, $results_per_page";
    $stmt = $database->conn->prepare($query);
    $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Calculate total pages for search results
    $sql_count = "SELECT COUNT(idmonan) AS total FROM monan WHERE tenmonan LIKE :keyword";
} else {
    // Handle regular pagination
    $query = "SELECT idmonan, tenmonan, gia, hinhanh FROM monan LIMIT $start_from, $results_per_page";
    $rows = $database->executeQuery($query);

    // Calculate total pages for all results
    $sql_count = "SELECT COUNT(idmonan) AS total FROM monan";
}

$stmt_count = $database->conn->prepare($sql_count);
if (isset($keyword)) {
    $stmt_count->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
}
$stmt_count->execute();
$row_count = $stmt_count->fetch(PDO::FETCH_ASSOC);
$total_pages = ceil($row_count['total'] / $results_per_page);

if ($rows) {
    $count = 0;
    foreach ($rows as $row) {
        if ($count % 3 == 0) {
            echo '<div class="row">';
        }

        echo '<div class="col-4 col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="Dish/' . $row['hinhanh'] . '" class="card-img-top" alt="' . $row['tenmonan'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['tenmonan'] . '</h5>';
        echo '<p class="card-text"> ' . $row['gia'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        if ($count % 3 == 2 || $count == count($rows) - 1) {
            echo '</div>';
        }

        $count++;
    }
} else {
    echo "No results found";
}

echo '<div class="pagination">';
for ($i = 1; $i <= $total_pages; $i++) {
    if (!empty($_GET['keyword'])) {
        echo '<a href="?page=' . $i . '&keyword=' . $_GET['keyword'] . '">' . $i . '</a>';
    } else {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }
}

echo '</div>';
?>
