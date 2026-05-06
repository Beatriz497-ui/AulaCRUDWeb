<?php



header('Content-Type: application/json; charset=utf-8');



try{

    $endpoint = "https://crudcrud.com/api";

    $token = "db8da14f52f64913b1d002f493cb1d9f";

    $resource = "unicorns";

    $API_BASE = $endpoint . "/" . $token . "/" . $resource;



    $dados = [

        "name" => "Alice",

        "age" => 2,

        "colour" => "Rosa Bebê"

    ];



    $opcoes = ["http" => [

        "header" => "Content-Type:application/json\r\n",

        "method" => "POST",

        "content" => json_encode($dados),

        "ignore_errors" => true

        ]

    ];

    //transformar o array de opcoes em um recurso de contexto do PHP

    $context = stream_context_create($opcoes);

    $response = file_get_contents($API_BASE, false, $context);



    //exibir o JSON

    echo $response;

    http_response_code(200);



}catch(Exception $e){

    http_response_code(500);

    echo json_encode([

        "erro" => true,

        "mensagem" => "Algo deu errado no servidor !",

        "detalhes" => $e->getMessage()

    ]);

}



?>