<?php
class UnicornioModel {
    private $token = "db8da14f52f64913b1d002f493cb1d9f"; // Verifique se o token é de hoje!
    private $resource = "unicorns";

    public function atualizar($id, $dados) {
        $url = "https://crudcrud.com/api/{$this->token}/{$this->resource}/{$id}";
        $options = [
            "http" => [
                "method"  => "PUT",
                "header"  => "Content-Type: application/json\r\n",
                "content" => json_encode($dados),
                "ignore_errors" => true
            ]
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return ($response !== false);
    }
}