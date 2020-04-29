<?php
    require 'core/Controller.php';
    require 'core/Model.php';
    require 'models/alunos.php';
    require 'models/turmas.php';
    require 'models/aulas.php';
    require 'models/disciplinas.php';

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
            public function aula($id_aula){
                $dados=array(
                    'info'=> array(),
                    'turma'=> array(),
                    'disciplinas'=> array(),
                    'aula' => array()
                );
                $alunos = new Alunos();
                $alunos->setAluno($_SESSION['lgaluno']);
                $dados['info'] = $alunos;

                $aula = new Aulas();
                $id = $aula->getTurmaDeAula($id_aula);
                
                if($alunos->isInscrito($id)){
                    $turma = new Turmas();
                    $turma->setTurma($id);
                    $dados['turmas'] = $turma;

                    $disciplinas = new Disciplinas();
                    $dados['disciplinas'] = $disciplinas->getDisciplinas($id);

                        $dados['aula_info'] = $aula->getAula($id_aula); #retorna as informações do tipo da aula.


                        #identifica o tipo de aula e redireciona para a view adequada.
                        if($dados['aula_info']['tipo'] == 1){
                            $view = 'turma_aula_video';
                        }else{
                            $view = 'turma_aula_exercicio';
                            #tentativas
                            if(!isset($_SESSION['exercicio'.$id_aula])){
                                $_SESSION['exercicio'.$id_aula] = 1;
                            }
                            
                        }

                        if(isset($_POST['duvida']) && !empty($_POST['duvida'])){
                            $duvida = addslashes($_POST['duvida']); #recebe duvida.
                            
                            $aula->setDuvida($duvida,$alunos->getId()); #armazena duvida .
                        }


                        if(isset($_POST['op']) && !empty($_POST['op'])) {
                            $opcao = addslashes($_POST['op']);

                            if($opcao == $dados['aula_info']['resposta']){
                                $dados['resposta'] = true;
                            }else{
                                $dados['resposta'] = false;
                            }
                            $_SESSION['exercicio'.$id_aula]++;
                        }






                                        
                    $this->loadTemplate($view, $dados);
                }else{
                    header("Location: ".BASE);
                    
                }
            }
        }



?>