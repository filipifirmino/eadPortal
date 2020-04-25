<div class="turmas">
    <h3>Sua turma</h3>

    <?php  foreach($turmas  as $turma):  ?>

    <div class="turmasitem">
        <img src="" border="0" width="100%"/><br><br>
        <strong><?php echo $turma['nome'];?></strong><br/><br/>

    </div>
</div>

    <?php endforeach;?>