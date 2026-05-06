<?php

// ETAPA.1) EX-CRUD-Update-BE: arquivo API-Update.php



header('Content-Type: application/json; charset=utf-8');



//o ID de registro a ser atualizado

$id = "69f1e96eee62c203e8570a73";



$endpoint = "https://crudcrud.com/api";

$token = "db8da14f52f64913b1d002f493cb1d9f";

$resource = "unicorns";

$API_BASE = $endpoint . "/" . $token . "/" . $resource;

$url = $API_BASE . "/" . $id;

try {

    $dados = [

        "name" => "Beatriz",

        "age" => 17,

        "colour" => "Rosa"

    ];



    $options = [

        "http" => [

            "method" => "PUT",

            "header" => "Content-Type: application/json",

            "content" => json_encode($dados),

            "ignore_errors" => true

        ]

    ];

    $context = stream_context_create($options);

    $response = file_get_contents($url, false, $context);

    http_response_code(200);

    echo $response;

    var_dump($response);

    if ($response === "") {

        http_response_code(200);

        echo json_encode([

            "erro" => false,

            "mensagem" => "Registro atualizado com sucesso.",

            "detalhes" => "Registro atualizado."

        ]);

    } else {

        http_response_code(500);

        echo json_encode([

            "erro" => true,

            "mensagem" => "Erro ao atualizar registro.",

            "detalhes" => "Erro ao atualizar registro."

        ]);

    }



} catch (Exception $e){

    http_response_code(500);

    echo json_encode([

        "erro" => true,

        "mensagem" => "Algo deu errado no servidor!",

        "detalhes" => $e->getMessage()

    ]);

}

?>



