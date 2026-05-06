<?php
require_once './controllers/ProdutoController.php';

$controller = new UnicornioController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update();
} else {
    include_once './views/index.html';
}