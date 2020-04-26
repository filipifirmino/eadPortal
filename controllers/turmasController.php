<?php
    require 'core/Controller.php';
    require 'core/Model.php';
    require 'models/alunos.php';
    require 'models/turmas.php';

        class turmasController extends controller{
            public function __construct(){
                parent::__construct();
                $alunos = new Alunos();

                if(!$alunos->isLogged()){
                    header("Location: ".BASE."login");
                }
            }

            public function index(){
                header("Location: "+BASE);
            }

            public function entrar($id){
                $dados=array(
                    'info'=> array(),
                    'turma'=> array(),
                    'disciplinas'=> array()
                );
                $alunos = new Alunos();
                $alunos->setAluno($_SESSION['lgaluno']);
                $dados['info'] = $alunos;

                if($alunos->isInscrito($id)){
                    $turma = new Turmas();
                    $turma->setTurma($id);
                    $dados['turmas'] = $turma;

                    $disciplinas = new Disciplinas();
                    $dados['disciplinas'] = $disciplinas->getDisciplinas($id);
                                        
                    $this->loadTemplate('turma_entrar', $dados);
                }else{
                    header("Location: ".BASE);
                }

                

            }

        }



?>