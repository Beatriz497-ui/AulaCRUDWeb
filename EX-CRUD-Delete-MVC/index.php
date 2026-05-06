<?php
require_once './controllers/ProdutoController.php';

$action = $_GET['action'] ?? ''; //Se existe o valor do action, ele usa se não deixa vazio

$controller = new ProdutoController();

switch ($action) {
    case 'deletar':
        $controller->excluir();
        break;
    default:
        // Se não houver ação, apenas carrega a página inicial
        include './views/index.html';
        break;
}