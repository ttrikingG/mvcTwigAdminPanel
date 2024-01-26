<?php
return[
    "database" => [
        'host' => 'localhost',
        'dbname' => 'db_cursoMVC',
        'username' => 'tomtom',
        'password' => '7244',
        'charset' => 'utf8',
        
        'options' =>[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]
    ]
];
