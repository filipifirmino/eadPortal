<div class="turmainfo">

<h2>Sala - <?php  echo $turmas->getNome(); ?></h2>

</div>
<div class="left-aulas">
   <?php foreach($disciplinas as $disciplina):    ?>
    <div class="disciplina"> <?php echo utf8_encode( $disciplina['nome']) ; ?></div>
        <?php foreach($disciplina['aulas'] as $aula):?>
                <a href="<?php echo BASE;?>turmas/aula/<?php echo $aula['id'];?>">
                    <div class="aula">
                        <?php echo utf8_encode($aula['nome']); ?>
                    </div>
                </a>
            </a>
        <?php endforeach;?>
   <?php endforeach; ?>
</div>
<div class="right-conteudo">
            
            <h2 class="titulo-duvida">Questionario</h2>
                <!--tentativas-->
                <? if($_SESSION['exercicio'.$aula_info['id_aula']] > 2){
                        echo "<h1 class='alert_quest'>Você atingiu o limite de tentativas!</h1>";
                }else{
                   echo  "Tentativa:" . $_SESSION['exercicio'.$aula_info['id_aula']] .' de 2';
                
                
                ?>
                              
            <h4><? echo $aula_info['pergunta']  ?></h4>
            
            <form method="POST">
                <input type="radio" name="op" id="op1" value="op1">
                <label for="op1"><?echo $aula_info['op1'];?></label><br/><br/>
                <input type="radio" name="op" id="op2" value="op2">
                <label for="op2"><?echo $aula_info['op2'];?></label><br/><br/>
                <input type="radio" name="op" id="op3" value="op3">
                <label for="op3"><?echo $aula_info['op3'];?></label><br/><br/>
                <input type="radio" name="op" id="op4" value="op4">
                <label for="op4"><?echo $aula_info['op4'];?></label><br/><br/>
                <input type="radio" name="op" id="op5" value="op5">
                <label for="op5"><?echo $aula_info['op5'];?></label><br/><br/>

            <input type="submit" value="Enviar Resposta">
            </form>
            <?
                if(isset($resposta)){
                    if($resposta === true){
                        echo "Resposta correta!";
                    }else{
                        echo "Resposta Incorreta!";
                    }
                }
            ?>
            <? } ?>
</div>