<?php
class Alunos extends model{
  
    public function getAlunos(){
        $array = array();
        
        $sql = "SELECT *, (Select count(*) from aluno_turma where aluno_turma.id_aluno = alunos.id) as turma FROM alunos";
        $sql= $this->db->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }
}
?>