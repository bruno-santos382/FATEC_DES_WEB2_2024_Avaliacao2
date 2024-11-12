<?php

class Conexao extends \PDO
{
    public function __construct()
    {
        $config = include __DIR__.'/../includes/config.php';

        parent::__construct(
            dsn: $config['db.dsn'],
            username: $config['db.user'],
            password: $config['db.password']
        );
    }
}