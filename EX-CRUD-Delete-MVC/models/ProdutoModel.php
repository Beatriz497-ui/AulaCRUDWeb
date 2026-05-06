<?php
class ProdutoModel {
    private $api_url = "https://crudcrud.com/api/60da988ff626400594cf5695a3e798c8/unicorns/";

    public function deletar($id) {
        $url = $this->api_url . $id;
        $option = [
            "http" => [
                "method" => "DELETE",
                "header" => "Content-Type: application/json",
                "ignore_errors" => true
            ],
            "ssl" => ["verify_peer" => false, "verify_peer_name" => false]
        ];

        $context = stream_context_create($option);
        $response = file_get_contents($url, false, $context);

        // Retorna true se deletado (string vazia), ou a mensagem de erro
        return ($response === "") ? true : "Erro ao remover: " . $response;
    }
}