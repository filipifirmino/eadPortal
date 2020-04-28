<?php
    require 'core/Controller.php';
    require 'core/Model.php';
   # require 'models/alunos.php';
   # require 'models/turmas.php';
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

            );

                                                                                                                  
            
           

            $this->loadTemplate('home',$dados);
        }
    }

    



?>