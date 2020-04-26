

<div class="turmas">
    <div class="turmasitem">
    <?php  foreach($turma as $turmas):  ?>

        <li><a href="<?php echo BASE;?>turmas/entrar/<?php echo $turmas['id_turma'];?>">
        <img src="<?php echo BASE;?>/asset/image/<?php echo $turmas['imagem'];?>" border="0" width="15px"/>
        <strong><?php echo $turmas['nome'];?></strong>
        </a>
        </li>
    <?php endforeach;?>
    </div>
</div>

    
   
