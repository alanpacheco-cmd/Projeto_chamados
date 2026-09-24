<?php

// ==================================================
// 🟦 CATEGORIA 1 — CONFIGURAÇÃO DA RESPOSTA
// ==================================================

// Define que a resposta será enviada em formato JSON
header('Content-Type: application/json; charset=utf-8');


// ==================================================
// 🟨 CATEGORIA 2 — CONTROLLER DE CHAMADOS
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


        // ==================================================
        // 🟧 CATEGORIA 4 — VERIFICAÇÃO DOS DADOS
        // ==================================================

        // Verifica se os dados foram enviados corretamente
        if (!$dados || !is_array($dados)) {

            // Define o código HTTP de requisição inválida
            http_response_code(400);

            // Retorna o erro em JSON
            echo json_encode([
                'sucesso' => false,
                'erro' => 'Dados do chamado não foram enviados corretamente.'
            ]);

            // Encerra a execução
            exit;
        }


        // ==================================================
        // 🟥 CATEGORIA 5 — VALIDAÇÃO DA DESCRIÇÃO
        // ==================================================

        // Verifica se a descrição do problema foi informada
        if (empty($dados['descricao'])) {

            // Define o código HTTP de requisição inválida
            http_response_code(400);

            // Retorna o erro em JSON
            echo json_encode([
                'sucesso' => false,
                'erro' => 'A descrição do problema é obrigatória.'
            ]);

            // Encerra a execução
            exit;
        }


        // ==================================================
        // 🟪 CATEGORIA 6 — IDENTIFICAÇÃO DO CHAMADO
        // ==================================================

        // Gera um número identificador para o chamado
        $numeroChamado = 'CHM-' . strtoupper(uniqid());


        // ==================================================
        // 🟫 CATEGORIA 7 — DATA DE ABERTURA
        // ==================================================

        // Registra a data e hora da criação do chamado
        $dataAbertura = date('Y-m-d H:i:s');


        // ==================================================
        // 🟦 CATEGORIA 8 — ORGANIZAÇÃO DOS DADOS
        // ==================================================

        // Monta os dados do chamado recebido pela API
        $chamado = [
            'numero_chamado' => $numeroChamado,
            'titulo' => $dados['titulo'] ?? null,
            'descricao' => $dados['descricao'],
            'data_abertura' => $dataAbertura
        ];


        // ==================================================
        // 🟩 CATEGORIA 9 — RESPOSTA DA API
        // ==================================================

        // Define que o chamado foi recebido com sucesso
        http_response_code(201);

        // Retorna os dados do chamado em JSON
        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Chamado criado com sucesso.',
            'chamado' => $chamado
        ]);
    }


    // ==================================================
    // 🟨 CATEGORIA 10 — CONSULTA DE CHAMADOS
    // ==================================================

    // Responsável pela consulta dos chamados
    public function listar()
    {

        // Retorna uma resposta informando que a consulta existe
        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Consulta de chamados disponível.'
        ]);
    }
}