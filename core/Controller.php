<?php
    class controller{
        protected $db;

        public function __contruct(){
            global $config;
            $this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'],$config['dbpass']); 
            #configuração de acesso ao banco de dados 

        }

        public function loadView($viewName, $viewData = array()){
            extract($viewData);
            include 'views/'.$viewName.'.php';
        }
        public function loadTemplate($viewName, $viewData = array()){
            include 'views/template.php';
            
        }
        public function loadViewInTemplate($viewName,$viewData){
            extract($viewData);
            include 'views/'.$viewName.'.php';
        }
    }

?>