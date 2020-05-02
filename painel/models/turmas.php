<?php

    class Turmas extends model{
        

        public function getTurmas(){

            $array = array();

            $sql = "SELECT
            *,
            (SELECT count(*) from  aluno_turma WHERE aluno_turma.id_turma = turmas.id) as qtalunos       
            FROM turmas";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }            

            return $array;
        }

        
        public function getTurma($id){
            $array = array();

            $sql = "SELECT * FROM turmas WHERE id= '$id'";
            $sql = $this->db->query($sql);
            
            if($sql->rowCount()> 0){
                $array = $sql->fetch();
            }
            

            return $array;
        }


        public function getTurmasInscrito($id_aluno){
            $array = array();
            $sql = "SELECT id_turma FROM aluno_turma WHERE id_aluno = '$id_aluno' ";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $rows = $sql->fetchAll();
                foreach($rows as $row){
                    $array[] = $row['id_turma'];
                }
            }
            return $array;
        }

    }
?>