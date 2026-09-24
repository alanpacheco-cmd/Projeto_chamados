<?php

// ==================================================
// 🟦 CATEGORIA 1 — CONFIGURAÇÃO DA RESPOSTA
// ==================================================

// Define que a resposta será enviada em formato JSON
header('Content-Type: application/json; charset=utf-8');


// ==================================================
// 🟨 CATEGORIA 2 — CLASSE DO CONTROLLER
// ==================================================

// Controller responsável pelas operações relacionadas aos chamados
class ChamadoController
{

    // ==================================================
    // 🟩 CATEGORIA 3 — CRIAÇÃO DE CHAMADO
    // ==================================================

    // Responsável por receber os dados de um novo chamado
    public function criar()
    {
        // Recebe os dados enviados no corpo da requisição
        $dados = json_decode(file_get_contents('php://input'), true);

        // Verifica se os dados foram recebidos corretamente
        if (!$dados) {

            http_response_code(400);

            echo json_encode([
                'sucesso' => false,
                'erro' => 'Dados do chamado não foram enviados.'
            ]);

            exit;
        }


        // ==================================================
        // 🟧 CATEGORIA 4 — VALIDAÇÃO DOS DADOS
        // ==================================================

        // Verifica se a descrição foi informada
        if (empty($dados['descricao'])) {

            http_response_code(400);

            echo json_encode([
                'sucesso' => false,
                'erro' => 'A descrição do chamado é obrigatória.'
            ]);

            exit;
        }


        // ==================================================
        // 🟥 CATEGORIA 5 — RESPOSTA DA CRIAÇÃO
        // ==================================================

        // Retorna os dados recebidos
        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Dados do chamado recebidos com sucesso.',
            'dados' => $dados
        ]);
    }


    // ==================================================
    // 🟪 CATEGORIA 6 — CONSULTA DE CHAMADOS
    // ==================================================

    // Responsável pela consulta dos chamados
    public function listar()
    {
        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Consulta de chamados disponível.'
        ]);
    }
}