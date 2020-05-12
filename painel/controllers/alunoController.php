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
            $sql = "DELETE FROM aluno_turma WHERE id_aluno = '$id'";
            $this->db->query($sql);

            $sql = "DELETE FROM alunos WHERE id = '$id'";
            $this->db->query($sql);

            header("Location: ".BASE."aluno");
        }

        public function adcionar(){
           $dados = array();
           
           if(isset($_POST['nome'])&& !empty($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $matricula = addslashes($_POST['matricula']);
                $senha = md5($_POST['senha']);

                $this->db->query("INSERT INTO alunos SET nome = '$nome', matricula = '$matricula', senha = '$senha'");
                $id = $this->db->lastInsertId();
                $this->db->query("INSERT INTO aluno_turma SET id_aluno = $id");
                header ('Location: '.BASE.'aluno');

           }
           $this->loadTemplate('alunos_add',$dados);
        }

        public function editar($id){
            $dados = array(

                'aluno'=>array(),
                'disciplina' => array()
            );
            if(isset($_POST['nome']) && !empty($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $matricula = addslashes($_POST['matricula']);
                $senha = addslashes($_POST['senha']);
                $turma = addslashes($_POST['turmas']);
                
                #modificar quando adcionar para turmas e cursos 31:44 - 14

                $this->db->query("UPDATE alunos SET nome = '$nome' , matricula = '$matricula', senha = '$senha' WHERE id = '$id'");
                $this->db->query("UPDATE aluno_turma SET id_turma = '$turma' WHERE id_aluno = '$id'");


            }   
            
            $alunos = new Alunos();
            $turmas = new Turmas();
            $dados['aluno'] = $alunos->getAluno($id);
            $dados['turmas'] = $turmas->getTurmas();
            $dados['inscrito'] = $turmas->getTurmasInscrito($id);
            
            $this->loadTemplate('alunos_edit',$dados);
        }
        
    }
?>