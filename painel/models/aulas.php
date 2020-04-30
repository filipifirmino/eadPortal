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
        /*Stand by*/
        public function getAula($id_aula) {
            $array = array();
            #marcar como visto 

                $id_aluno = $_SESSION['lgaluno'];

                $sql = "SELECT tipo, (select count(*) from historico where historico.id_aula = aulas.id and historico.id_aluno  = '$id_aluno') as assistido FROM aulas WHERE id ='$id_aula'";
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
                $array['assistido'] = $row['assistido'];

            }

            return $array;
        }
            
            
    }
    
?>