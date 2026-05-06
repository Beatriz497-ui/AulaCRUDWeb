<?php
require_once __DIR__ . '/../models/ProdutoModel.php';

class UnicornioController {
    public function update() {
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input || !isset($input['id'])) {
            echo json_encode(["erro" => true, "mensagem" => "ID ausente."]);
            return;
        }

        $model = new UnicornioModel();
        $id = $input['id'];
        $dados = [
            "name"   => $input['name'],
            "age"    => (int)$input['age'],
            "colour" => $input['colour']
        ];

        if ($model->atualizar($id, $dados)) {
            echo json_encode(["erro" => false, "mensagem" => "Sucesso no MVC!"]);
        } else {
            echo json_encode(["erro" => true, "mensagem" => "Erro no Model."]);
        }
    }
}