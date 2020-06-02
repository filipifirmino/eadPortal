<?php
    require 'environment.php'; #modo de operação

    define("BASE", "http://localhost/ead/");

    global $config; #configuração do banco de dados 
    $config = array();

    if(ENVIRONMENT == 'development') {#dev
            $config['dbname'] = "data_base";
            $config['host'] = 'localhost';
            $config['dbuser'] = 'root';
            $config['dbpass'] = 'Pass';
    }else{#produção

            $config['dbname'] = 'data_base';
            $config['host'] = 'localhost';
            $config['dbuser'] = 'root';
            $config['dbpass'] = 'pass';
    }




?>
