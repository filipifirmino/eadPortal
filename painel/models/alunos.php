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

    public function getAluno($id){
        $array = array();

        $sql  = "SELECT * FROM alunos WHERE id = '$id'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        return $array;
    }

    public function updataAlunos($id,$nome,$matricula,$senha,$turma){
        $this->db->query("UPDATE alunos SET nome = '$nome' , matricula = '$matricula', senha = '$senha' WHERE id = '$id'");
        $this->db->query("UPDATE aluno_turma SET id_turma = '$turma' WHERE id_aluno = '$id'");
    }
    
    public function addAluno($nome,$matricula,$senha){
        $this->db->query("INSERT INTO alunos SET nome = '$nome', matricula = '$matricula', senha = '$senha'");
        $id = $this->db->lastInsertId();
        $this->db->query("INSERT INTO aluno_turma SET id_aluno = $id");
    }

    public function deleteAluno($id){
        $sql = "DELETE FROM aluno_turma WHERE id_aluno = '$id'";
        $this->db->query($sql);

        $sql = "DELETE FROM alunos WHERE id = '$id'";
        $this->db->query($sql);
    }
}   
?>