<?php

// ==================================================
// 🟦 CATEGORIA 1 — CONFIGURAÇÕES DO BANCO DE DADOS
// ==================================================

// Endereço do servidor do banco de dados
$host = 'localhost';

// Porta utilizada pelo MariaDB
$porta = '3306';

// Nome do banco de dados
$banco = 'chamados';

// Usuário do banco de dados
$usuario = 'root';

// Senha do banco de dados
$senha = '';


// ==================================================
// 🟨 CATEGORIA 2 — CONFIGURAÇÃO DA CONEXÃO
// ==================================================

// Monta as informações necessárias para conectar ao banco
$dsn = "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8mb4";


// ==================================================
// 🟩 CATEGORIA 3 — TENTATIVA DE CONEXÃO
// ==================================================

try {

    // Cria a conexão com o banco utilizando PDO
    $conexao = new PDO($dsn, $usuario, $senha);

    // Configura o PDO para informar erros através de exceções
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// ==================================================
// 🟥 CATEGORIA 4 — TRATAMENTO DE ERRO
// ==================================================

} catch (PDOException $erro) {

    // Encerra a execução e envia uma resposta em JSON
    die(json_encode([
        'sucesso' => false,
        'erro' => 'Não foi possível conectar ao banco de dados.'
    ]));
}