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
                'alunos'=>array()

            );

            $alunos = new Alunos();
            $dados['alunos'] = $alunos->getAlunos();


            $this->loadTemplate('aluno', $dados);
        }

        public function excluir($id){

            $alunos = new Alunos;
            $alunos->deleteAluno($id);

            header("Location: ".BASE."aluno");
        }

        public function adcionar(){
           $dados = array();
           
           if(isset($_POST['nome'])&& !empty($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $matricula = addslashes($_POST['matricula']);
                $senha = md5($_POST['senha']);
                
                $alunos = new Alunos();

                $alunos->addAluno($nome,$matricula,$senha);
                header ('Location: '.BASE.'aluno');

           }
           $this->loadTemplate('alunos_add',$dados);
        }

        public function editar($id){
            $dados = array(

                'aluno'=>array(),
                'disciplina' => array()
            );

            $alunos = new Alunos();

            if(isset($_POST['nome']) && !empty($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $matricula = addslashes($_POST['matricula']);
                $senha = addslashes($_POST['senha']);
                $turma = addslashes($_POST['turmas']);
                

                $alunos->updataAlunos($id,$nome,$matricula,$senha,$turma);
            }   
            
           
            $turmas = new Turmas();
            $dados['aluno'] = $alunos->getAluno($id);
            $dados['turmas'] = $turmas->getTurmas();
            $dados['inscrito'] = $turmas->getTurmasInscrito($id);
            
            $this->loadTemplate('alunos_edit',$dados);
        }
        
    }
?>