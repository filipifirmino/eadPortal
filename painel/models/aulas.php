<?php

    class Aulas extends model{

       
        public function getAulasDaDisciplina($id){
            $array = array();
            $sql = "SELECT * FROM aulas WHERE id_disciplina = '$id' ORDER BY ordem";
            $sql=$this->db->query($sql);

            if($sql->rowCount()>0){
                $array=$sql->fetchAll();

                foreach($array as $aulachave => $aula) {
                    if($aula['tipo']== '1'){
                        $sql = "SELECT nome from video WHERE id_aula = '".($aula['id'])."'";
                        $sql = $this->db->query($sql)->fetch();
                        
                        $array[$aulachave]['nome'] = $sql['nome'];
                    }
                    elseif($aula['tipo'] == 0){
                        $array[$aulachave]['nome'] = "Questionario";
                    }   
                }



            }
            return $array;
        }
        #editar video
        public function updateAula($id,$nome_video,$url){
            
            $this->db->query("UPDATE video SET nome = '$nome_video', url_video = '$url' WHERE id_aula = '$id'");
            return $this-> getTurmaDeAula($id);
        }
        #editar questionario
        public function updateQuestionario($id,$pergunta,$op1,$op2,$op3,$op4,$op5,$resposta){
                    
            $this->db->query("UPDATE exercicios SET pergunta = '$pergunta', op1 = '$op1', op2 = '$op2',op3 = '$op3',op4 = '$op4',op5 = '$op5', resposta = '$resposta' WHERE id_aula='$id'");                
            return $this->getTurmaDeAula($id);
            
        }

        public function getTurmaDeAula($id_aula){

                $sql = "SELECT id_turma FROM aulas WHERE id = '$id_aula'";
                $sql = $this->db->query($sql);

                if($sql->rowCount() > 0){
                    $row = $sql->fetch();
                    return $row['id_turma'];
                }else{
                    return 0;
                }

        }
        public function getAula($id_aula) {
            $array = array();
            #marcar como visto 
                $sql = "SELECT tipo FROM aulas WHERE id='$id_aula'";
                $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
                $row = $sql->fetch();
                
                    #logica: 0 = para atividade e 1 para video.
                if($row['tipo'] == 1){

                    $sql = "SELECT * FROM video WHERE id_aula = '$id_aula'";
                    $sql = $this->db->query($sql);

                    $array = $sql->fetch();
                    $array['tipo'] = 1; #retorna para o view a informação do tipo de aula 

                }elseif($row['tipo'] == 0){
                    
                    $sql = "SELECT * FROM exercicios WHERE id_aula = '$id_aula'";
                    $sql = $this->db->query($sql);

                    $array = $sql->fetch(); #alterar para fetchAll -> para capturar todas as perguntas.
                    $array['tipo'] = 0; #retorna para o view a informação do tipo de aula 

                }
              

            }

            return $array;  
        }
        
  
        
            #deletar aula
            public function deleteAula($id){
                
                $sql = "SELECT id_turma FROM aulas WHERE id = '$id'";
                $sql = $this->db->query($sql);
                
                if($sql->rowCount() > 0){
                    $sql = $sql->fetch();
                    $this->db->query("DELETE FROM aulas WHERE id = '$id'");
                    $this->db->query("DELETE FROM exercicios WHERE id_aula = '$id'");
                    $this->db->query("DELETE FROM video WHERE id_aula = '$id'");
                    $this->db->query("DELETE FROM historico WHERE id_aula = '$id'");
                    
                    return $sql['id_turma'];
                }

            }
            #adcionar aula

            public function addAula($id_tuma,$id_disciplina,$nome, $tipo, $video){
                $sql = "SELECT ordem FROM aulas WHERE id_disciplina = 'id_disciplina' ORDER BY ordem DESC LIMIT 1";
                $sql = $this->db->query($sql);
                $ordem= 1;
                if($sql->rowCount() > 0){
                    #ordenamento de aula
                    $sql = $sql->fetch();
                    $ordem = intval($sql['ordem']);
                    $ordem++;
                    }
                    $sql= "INSERT INTO aulas SET id_disciplina = '$id_disciplina',id_turma = '$id_tuma',ordem = '$ordem', tipo = '$tipo', nome = '$nome'";
                    $this->db->query($sql);
                    $id_aula = $this->db->lastInsertId();
                    
                    if($tipo == 1) {
                        $this->db->query("INSERT INTO video SET id_aula = '$id_aula', nome = '$nome' , url_video = '$video'");
                    }else{
                        $this->db->query("INSERT INTO exercicios SET id_aula = '$id_aula' ");
                    
                    }
            }
            
           
    }
    
?>