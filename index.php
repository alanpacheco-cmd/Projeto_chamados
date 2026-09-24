<?php

// ==================================================
// 🟦 CATEGORIA 1 — CONFIGURAÇÃO DA RESPOSTA
// ==================================================

// Define que a resposta da API será enviada em JSON
header('Content-Type: application/json; charset=utf-8');


// ==================================================
// 🟨 CATEGORIA 2 — IDENTIFICAÇÃO DA ROTA
// ==================================================

// Pega o caminho acessado na URL
$rota = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


// ==================================================
// 🟩 CATEGORIA 3 — ROTA DE CHAMADOS
// ==================================================

// Verifica se a requisição pertence à rota de chamados
if (strpos($rota, '/chamados') !== false) {

    // Carrega a rota responsável pelos chamados
    require_once __DIR__ . '/routes/chamados.php';

    // Encerra a execução depois de carregar a rota
    exit;
}


// ==================================================
// 🟧 CATEGORIA 4 — ROTA PRINCIPAL
// ==================================================

// Resposta padrão quando nenhuma rota foi encontrada
echo json_encode([
    'sucesso' => true,
    'mensagem' => 'API do Sistema de Gerenciamento de Chamados funcionando!'
]);