<?php
require_once('./connection/connect.php');






// search handler for a category
if (isset($_POST['search_category']) && !empty($_POST['search_category'])) {
    $search =$_POST['search_category'];
    $query = "SELECT * FROM category WHERE category_name=:search  ORDER BY category_id DESC";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
} else {
    $query = "SELECT * FROM category ORDER BY category_id DESC";
    $stmt = $conn->prepare($query);
}
