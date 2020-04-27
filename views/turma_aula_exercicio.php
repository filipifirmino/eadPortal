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
            <h2>Questionario</h2>
</div>