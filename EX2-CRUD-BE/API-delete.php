<?php

header('Content-Type: application/json; charset=utf-8');

try{
    $id = "69fb25c8ee62c203e857107f";
    $api_base = "https://crudcrud.com/api/60da988ff626400594cf5695a3e798c8/unicorns/";
    $url = $api_base . $id;

    $option = [
        "http" => [
            "method" => "DELETE",
            "header" => "Content-Type: application/json",
            "ignore_errors" => true
        ],
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false
        ]

    ];
    $context = stream_context_create($option);
    $response = file_get_contents($url, false, $context);
    if($response === ""){
        http_response_code(200);
        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Deletado com Sucesso!",
            "id_removido" => $id
        ]);
    }

    echo $response;

}catch(Exception $e){
    http_response_code(500);
    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Erro no servidor",
        "detalhes" => $e->getMessage()
    ]);
}
?>