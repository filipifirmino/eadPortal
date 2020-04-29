<?php

    class Turmas extends model{
        

        public function getTurmas(){

            $array = array();

            $sql = "SELECT
            *,(SELECT count(*) from  aluno_turma WHERE aluno_turma.id_turma = turmas.id) as qtalunos       
            FROM turmas";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }            

            return $array;
        }

        



    }
?>