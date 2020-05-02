<?php
    require 'core/Controller.php';
    require 'core/Model.php';
    require 'models/disciplinas.php';
    require 'models/aulas.php';
    require 'models/turmas.php';
    require 'models/usuarios.php';
    require 'models/alunos.php';
    
    class alunoController extends controller{
        public function __construct(){
            parent::__construct();
            $usuarios = new Usuarios();

            #verifica se o usuario está logado
            if(!$usuarios->isLogged()){
                header("Location: ".BASE."login");
            }
        }

        public function index(){
            $dados = array(
                'alunos'=>array(),

            );

            $alunos = new Alunos();
            $dados['alunos'] = $alunos->getAlunos();


            $this->loadTemplate('aluno', $dados);
        }
    }
?>