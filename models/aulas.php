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
        
    }
    
?>