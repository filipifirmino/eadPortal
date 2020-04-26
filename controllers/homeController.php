<?php
    require 'core/Controller.php';
    require 'core/Model.php';
    require 'models/alunos.php';
    require 'models/turmas.php';
    
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
                'info' => array(),
                'turmas' => array()

            );

            $alunos = new Alunos();
            $alunos -> setAluno($_SESSION['lgaluno']);
            $dados['info'] = $alunos;
            
            $turmas = new Turmas();
            $dados['turma'] = $turmas->getTurmaDoAluno($alunos->getId()); #pode ser usado para listar disciplinas
            

            $this->loadTemplate('home',$dados);
        }
    }

    



?>