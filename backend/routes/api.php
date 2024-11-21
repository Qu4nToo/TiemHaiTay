<?php
require_once '../controllers/productController.php';

$action = $_GET['action'] ?? '';
handleRequest($action);
?>
