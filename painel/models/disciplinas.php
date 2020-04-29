<?php
    class Disciplinas extends model{
        public function getDisciplinas($id_turma){
           $array = array();
           
           $sql = "SELECT * FROM disciplina WHERE id_turma = '$id_turma'";
           $sql = $this->db->query($sql);

           if($sql->rowCount()> 0){
               $array = $sql->fetchAll();

                $aulas = new Aulas();

               foreach($array as $dChave => $dDados){

                    $array[$dChave]['aulas'] = $aulas->getAulasDaDisciplina($dDados['id']);

               }
           }
           return $array;
        }

    }



?>