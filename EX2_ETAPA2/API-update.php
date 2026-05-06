<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");

// Captura os dados enviados pelo JavaScript
$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['id'])) {
    http_response_code(400);
    echo json_encode(["erro" => true, "mensagem" => "Dados insuficientes ou ID ausente."]);
    exit;
}

// Configurações da API Externa
$id = $input['id'];
$token = "db8da14f52f64913b1d002f493cb1d9f"; 
$url = "https://crudcrud.com/api/{$token}/unicorns/{$id}";

try {
    $dadosParaAtualizar = [
        "name"   => $input['name'],
        "age"    => (int)$input['age'],
        "colour" => $input['colour']
    ];

    $options = [
        "http" => [
            "method"  => "PUT",
            "header"  => "Content-Type: application/json",
            "content" => json_encode($dadosParaAtualizar),
            "ignore_errors" => true
        ]
    ];

    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    
    // O CrudCrud retorna vazio em caso de sucesso no PUT
    if ($response !== false) {
        echo json_encode([
            "erro" => false, 
            "mensagem" => "Unicórnio atualizado com sucesso!",
            "dados" => $dadosParaAtualizar
        ]);
    } else {
        throw new Exception("Falha na comunicação com a API externa.");
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "erro" => true,
        "mensagem" => "Erro no servidor!",
        "detalhes" => $e->getMessage()
    ]);
}
?>