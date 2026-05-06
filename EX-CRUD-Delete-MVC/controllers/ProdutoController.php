<?php
require_once './models/ProdutoModel.php';

class ProdutoController {
    public function excluir() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $model = new ProdutoModel();
            $resultado = $model->deletar($id);

            // Passa o resultado de volta para a View via URL 
            if ($resultado === true) {
                header("Location: index.php?status=sucesso&id=" . $id);
            } else {
                header("Location: index.php?status=erro&msg=" . urlencode($resultado));
            }
            exit;
        }
    }
}