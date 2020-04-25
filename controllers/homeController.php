<?php
    require 'core/Controller.php';
    require 'core/Model.php';
    require 'models/alunos.php';
    
    class homeController extends controller{
        public function __construct(){
            parent::__construct();
            $alunos = new Alunos();

            if(!$alunos->isLogged()){
                header("Location:".BASE."login");
               
            }
        }
        public function index(){
            $dados = array(
                'info' => array()

            );

            $alunos = new Alunos();
            $alunos = setAluno($_SESSION['lgaluno']);
            $dados['info'] = $alunos;
    
            $this->loadTemplate('home',$dados);
        }
    }

    



?>