<?php
    require 'environment.php'; #modo de operação

    define("BASE", "http://localhost/ead/");

    global $config; #configuração do banco de dados 
    $config = array();

    if(ENVIRONMENT == 'development') {#dev
            $config['dbname'] = "ead_anchieta";
            $config['host'] = 'localhost';
            $config['dbuser'] = 'root';
            $config['dbpass'] = '';
    }else{#produção

            $config['dbname'] = 'ead_anchieta';
            $config['host'] = 'localhost';
            $config['dbuser'] = 'root';
            $config['dbpass'] = '';
    }




?>