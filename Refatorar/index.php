<?php

header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_unicornio'])) {
    
    try {
        $id = $_POST['id_unicornio'];
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

        if ($response === "") {
            echo "<h3>Sucesso!</h3>";
            echo "O unicórnio com ID <strong>$id</strong> foi removido.";
        } else {
            echo "<h3>Erro ao deletar</h3>";
            echo "Resposta da API: " . $response;
        }

    } catch (Exception $e) {
        echo "<h3>Erro no Servidor</h3>";
        echo $e->getMessage();
    }

} else {
    echo "Nenhum dado enviado.";
}

echo '<br><br><a href="index.html">Voltar</a>';
?>