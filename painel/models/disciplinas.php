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

            public function getDisciplina($id){
                $array = array();
                $sql = "SELECT * FROM disciplina WHERE id='$id'";
                $sql = $this->db->query($sql);

                if($sql->rowCount()> 0){
                    $array = $sql->fetch();
                }
                return $array;
            }





        public function addDisciplina($nome,$id_turma){
            $this->db->query("INSERT INTO disciplina SET nome = '$nome', id_turma = '$id_turma'");
        }

        public function deleteDisciplina($id){
            $sql = "SELECT id_turma FROM disciplina WHERE id = '$id'";
            $sql = $this->db->query($sql);

            if($sql->rowCount()> 0){
                $sql = $sql->fetch();
                $this->db->query("DELETE FROM disciplina WHERE disciplina.id = '$id'");

                return $sql['id_turma'];

            }
        }

        public function updateDisciplina($nome, $id){
            $sql = "SELECT id_turma FROM disciplina WHERE id = '$id'";
            $sql = $this->db->query($sql);

            if($sql->rowCount()> 0){
                $sql = $sql->fetch();
                $this->db->query("UPDATE disciplina SET nome = '$nome' WHERE id = '$id'");

                return $sql['id_turma'];

            }
        }   

    }



?>