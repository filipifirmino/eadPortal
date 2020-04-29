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
    <h2 class="titulo-duvida">Vídeo - <?php echo $aula_info['nome']; ?></h2>
    
    <iframe  id="video" width="100%"frameborder="0" src="https://player.vimeo.com/video/<?php echo $aula_info['url_video'];?>"></iframe><br>

       
        <!--verifica se foi assistido-->
        
        <?if($aula_info['assistido'] == '1'):?>
            <img src="<?echo BASE.'asset/image/ok.svg?>';?>" width="30" height="30" class="ok_aula"alt="Aula já assistida"/> 
        <?else: ?>
            <button onclick="marcarAssistido(this)" data-id="<?php echo $aula_info['id'];?>">Marcar como assistido</button>
        <?endif;?>
    <hr/>
    <h3 class="titulo-duvida">Duvidas? Envie sua pergunta!</h3>
    <form  method="POST" class="form_duvida">
            <textarea name="duvida" ></textarea><br/><br/>
            <input type="submit" value="Enviar Dúvida"/>
    </form>

</div>