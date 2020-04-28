<?
    require 'core/Controller.php';
    require 'core/Model.php';
    require 'models/alunos.php';
    require 'models/turmas.php';
    require 'models/aulas.php';
    
    class ajaxController extends controller{
        public function __construct(){
            parent::__construct();
            $alunos = new Alunos();

            if(!$alunos->isLogged()){
                header("Location:".BASE."login");
               
            }
        }
        public function marcar_assistido($id){
            $aulas = new Aulas();
            $aulas->marcarAssistido($id);
        }
    }

?>