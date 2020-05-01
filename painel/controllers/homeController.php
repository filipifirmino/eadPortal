<?php
    require 'core/Controller.php';
    require 'core/Model.php';
    require 'models/disciplinas.php';
    require 'models/aulas.php';
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
        public function editar($id){
            $dados = array(

                'turma' => array(),
                'disciplinas' => array()
            );

            if(isset($_POST['nome'])&& !empty($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $imagem = $_FILES['imagem'];

                $this->db->query("UPDATE turmas SET nome ='$nome' WHERE id='$id' ");

                if(!empty($imagem['temp_name'])){
                    $md5name = md5(time().rand(0,9999)).'.jpg';
                        $types = array('image/jpeg','image/jpg', 'image/png');
                        if(in_array($imagem['type'], $types)){
                            move_uploaded_file($imagem['tmp_name'],"../painel/asset/image/".$md5name);

                            $this->db->query("UPDATE turmas SET imagem = '$md5name' WHERE id = '$id'");

                            
                        }
                }
            }
            
            $disciplinas = new Disciplinas();

            //usuario adcionou uma nova aula
            if(isset($_POST['nome_aula']) && !empty($_POST['nome_aula'])){
                
                $aula = addslashes($_POST['nome_aula']);
                $disciplina_aula = addslashes($_POST['disciplina_aula']);
                $tipo = addslashes($_POST['tipo']);
                $video = addslashes($_POST['url-video']);

                $aulas = new Aulas();

                $aulas->addAula($id,$disciplina_aula,$aula,$tipo,$video);
               


            }


            //usuario adcionou uma nova disciplina

            if(isset($_POST['disciplina']) && !empty($_POST['disciplina'])){

                $disciplina = utf8_decode(addslashes($_POST['disciplina']));
                $disciplinas->addDisciplina($disciplina, $id);
            }
           
            
            $turmas = new Turmas();
            $dados['turma'] = $turmas->getTurma($id);
            $dados['disciplinas'] = $disciplinas->getDisciplinas($id);
            $this->loadTemplate('turma_edit', $dados);
        }

        #deletar disciplinas
        public function del_disciplina($id){

            if(!empty($id)){
                $id = addslashes($id);
                $disciplinas = new Disciplinas();
                
               $id_turma =  $disciplinas->deleteDisciplina($id);
                
                header("Location: ".BASE."home/editar/".$id_turma);
                exit;
            }
            header("Location: ".BASE);
           
        }

        public function edit_disciplina($id){
            $array  = array();
            $disciplinas = new Disciplinas();

                if(isset($_POST['disciplina'])&& !empty($_POST['disciplina'])){
                    $nome = utf8_decode(addslashes($_POST['disciplina']));
                    $id_turma = $disciplinas->updateDisciplina($nome, $id);
                    header("Location: ".BASE."home/editar/".$id_turma);
                exit;
                }


            
            $array['disciplina'] = $disciplinas->getDisciplina($id);
            $this->loadTemplate('edit_disciplina', $array);
        }

        public function del_aula($id){
            if(!empty($id)){
                $id_aula = addslashes($id);
                $aulas = new Aulas();
                
               $id_turma =  $aulas->deleteAula($id);
                
                header("Location: ".BASE."home/editar/".$id_turma);
                exit;
            }
            header("Location: ".BASE);



            
        }

        public function edit_aula($id_aula){
            $array = array();
        }







    }
?>