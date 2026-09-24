<?php

// ==================================================
// 🟦 CATEGORIA 1 — CONFIGURAÇÃO DA RESPOSTA
// ==================================================

// Define que a resposta da API será enviada em JSON
header('Content-Type: application/json; charset=utf-8');


// ==================================================
// 🟨 CATEGORIA 2 — IDENTIFICAÇÃO DA REQUISIÇÃO
// ==================================================

// Pega o método HTTP utilizado na requisição
$metodo = $_SERVER['REQUEST_METHOD'];


// ==================================================
// 🟩 CATEGORIA 3 — ROTA GET
// ==================================================

// Verifica se a requisição utilizou o método GET
if ($metodo === 'GET') {

    // Retorna uma resposta informando que a rota existe
    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Rota de chamados funcionando.',
        'metodo' => 'GET'
    ]);

    // Encerra a execução
    exit;
}


// ==================================================
// 🟧 CATEGORIA 4 — ROTA POST
// ==================================================

// Verifica se a requisição utilizou o método POST
if ($metodo === 'POST') {

    // Retorna uma resposta informando que a criação de chamado
    // ainda será implementada
    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Rota para criação de chamado funcionando.',
        'metodo' => 'POST'
    ]);

    // Encerra a execução
    exit;
}


// ==================================================
// 🟥 CATEGORIA 5 — MÉTODO NÃO PERMITIDO
// ==================================================

// Define o código HTTP 405 para métodos não permitidos
http_response_code(405);

// Retorna uma mensagem de erro em JSON
echo json_encode([
    'sucesso' => false,
    'erro' => 'Método HTTP não permitido.'
]);