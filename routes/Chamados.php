<?php

// ==================================================
// 🟦 CATEGORIA 1 — CONFIGURAÇÃO DA RESPOSTA
// ==================================================

// Define que a resposta da API será enviada em JSON
header('Content-Type: application/json; charset=utf-8');


// ==================================================
// 🟨 CATEGORIA 2 — CARREGAMENTO DO CONTROLLER
// ==================================================

// Carrega o Controller responsável pelos chamados
require_once __DIR__ . '/../controllers/ChamadoController.php';


// Cria um objeto do Controller
$controller = new ChamadoController();


// ==================================================
// 🟩 CATEGORIA 3 — IDENTIFICAÇÃO DA REQUISIÇÃO
// ==================================================

// Pega o método HTTP utilizado na requisição
$metodo = $_SERVER['REQUEST_METHOD'];


// ==================================================
// 🟧 CATEGORIA 4 — ROTA GET
// ==================================================

// Verifica se a requisição utilizou GET
if ($metodo === 'GET') {

    // Chama a função responsável pela consulta
    $controller->listar();

    // Encerra a execução
    exit;
}


// ==================================================
// 🟥 CATEGORIA 5 — ROTA POST
// ==================================================

// Verifica se a requisição utilizou POST
if ($metodo === 'POST') {

    // Chama a função responsável pela criação
    $controller->criar();

    // Encerra a execução
    exit;
}


// ==================================================
// 🟪 CATEGORIA 6 — MÉTODO NÃO PERMITIDO
// ==================================================

// Define o código HTTP 405
http_response_code(405);


// Retorna o erro em JSON
echo json_encode([
    'sucesso' => false,
    'erro' => 'Método HTTP não permitido.'
]);