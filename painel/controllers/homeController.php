<?php
    require 'core/Controller.php';
    require 'core/Model.php';
   # require 'models/alunos.php';
    require 'models/turmas.php';
    require 'models/usuarios.php';
    
    class homeController extends controller{
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
                'turmas'=>array()
            );
                                                                                                                  
            $turmas = new Turmas();
            $dados['turmas'] = $turmas->getTurmas();
           

            $this->loadTemplate('home',$dados);
        }
        #função excluir turma
        public function excluir($id){
            #Selecionas as aulas relacionadas a turma que será removida.
            $sql = "SELECT id FROM aulas WHERE id_turma = '$id'";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
                $aulas = $sql->fetchAll();
                foreach($aulas as $aula){
                    $sqlaula = "DELETE FROM historico WHERE id_aula = '".($aula['id_aula'])."'";
                    $this->db->query($sqlaula);

                    $sqlaula = "DELETE FROM exercicios WHERE id_aula = '".($aula['id_aula'])."'";
                    $this->db->query($sqlaula);

                    $sqlaula = "DELETE FROM videos WHERE id_aula = '".($aula['id_aula'])."'";
                    $this->db->query($sqlaula);

                }
            }
            
            $sql = "DELETE FROM aluno_turma WHERE id_turma = '$id'";
            $this->db->query($sql);
            
            $sql = "DELETE FROM aulas WHERE id_turma = '$id'";
            $this->db->query($sql);

            $sql = "DELETE FROM disciplina WHERE id_turma = '$id'";
            $this->db->query($sql);

            $sql = "DELETE FROM turmas WHERE id = '$id'";
            $this->db->query($sql);

            header("Location:".BASE);

        }
        #função criar turma.
        public function novaturma(){
            
            $dados = array();

                if(isset($_POST['nome_turma']) && !empty($_POST['nome_turma'])){
                    $nome = addslashes($_POST["nome_turma"]);
                    $imagem = $_FILES['imagem_turma'];

                    if(!empty($imagem['tmp_name'])){
                       
                    
                        $md5name = md5(time().rand(0,9999)).'.jpg';
                        $types = array('image/jpeg','image/jpg', 'image/png');

                        

                        if(in_array($imagem['type'], $types)){
                            move_uploaded_file($imagem['tmp_name'],"../painel/asset/image/".$md5name);

                            $this->db->query("INSERT INTO turmas SET nome = '$nome', imagem = '$md5name'");

                            header("Location: ".BASE);
                        }

                    }
                }


            $this->loadTemplate("turma_add", $dados);

        }
    }
?>