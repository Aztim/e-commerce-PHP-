<?php
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE category='accessory' LIMIT 4");
$stmt->execute();

$featured_products = $stmt->get_result();
?>