<?php

require __DIR__.'/classes/Cadastro.php';

try { 
    $cadastro = new Cadastro();

    $handlers = [
        'vagas/cadastrar' => [$cadastro, 'cadastrarVaga'],
        'vagas/remover' => [$cadastro, 'removerVaga'],
    ];

    $route = filter_input(INPUT_GET, 'route');
    if (!isset($handlers[$route])) {
        throw new \Exception('Rota não definida.');
    }

    $retorno = call_user_func($handlers[$route]);
    echo json_encode($retorno);
} catch (\Throwable $th) {
    error_log('Error: ' 
        . $th->getMessage() 
        . ' in ' 
        . $th->getFile() 
        . ' on line ' 
        . $th->getLine() 
        . "\nStack trace:\n" . $th->getTraceAsString()
    );

    echo json_encode([
        'status' => 'erro', 
        'mensagem' => $th->getMessage()
    ]);
}