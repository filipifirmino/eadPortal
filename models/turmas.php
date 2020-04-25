<?php

    class Turmas extends model{

        public function getTurmaDoAluno($id){

            $array = array(); #Acessor de retorno 
            $sql = "
            SELECT 
                aluno_turma.id_turma,
                turmas.nome,
                turmas.imagem
            FROM 
                aluno_turma 
            LEFT JOIN turmas ON aluno_turma.id_turma = turmas.id
            WHERE 
                aluno_turma.id_aluno = '$id'
            ";
            $sql = $this->db->query($sql);

            if($sql->rowCount()> 0){
                $array = $sql->fetchAll();#para buscar a turma do aluno usar o fetch apenas

            }
            return $array;
        }





    }
?>