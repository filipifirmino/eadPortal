<style>
    
</style>


<h1>Editar turma</h1>

<form method="POST" enctype="multipart/form-data">
    
    <input type="text" name="nome_turma" id="nome_turma" placeholder="Nome da turma" class="input" value="<? echo $turma['nome']?>">
    <br/>
    <span>Imagem da turma:</span>

    <img src="<?echo BASE;?>asset/image/<?echo $turma['imagem'];?>" border='0' height="80" >

    <input type="file" name="imagem_turma" id="imagem_turma"  class="input"><br/>


    <input type="submit" value="Salvar" class="input">
   

</form>
<br>
<hr>

<h2>Aulas</h2>

<fieldset>
    <legend>Adcionar disciplina</legend>
    <form  method="POST">
    <input type="text" name="disciplina" id="disciplina" placeholder="Disciplina">

        <input type="submit" value="Adcionar">
        </form>
</fieldset>

<?foreach($disciplinas as $disciplina):?>

    <h4><?echo utf8_encode($disciplina['nome']) ?><a href="<?echo BASE;?>home/del_disciplina/<?echo $disciplina['id']?>" title="Excluir"><div class="exe">X</div></a>
    <a href="<?echo BASE;?>home/edit_disciplina/<?echo $disciplina['id']?>" title="Editar"><div class="exe_e">Editar</div></a>
    </h4>

    <?foreach($disciplina['aulas'] as $aula):?>
            <h5><?echo $aula['nome'] ?><a href="<?echo BASE;?>home/del_disciplina/<?echo $disciplina['id']?>" title="Excluir"><div class="exe">X</div></a>  <a href="<?echo BASE;?>home/edit_disciplina/<?echo $disciplina['id']?>" title="Editar"><div class="exe_e">Editar</div></a></h5>


    <?endforeach?>





<?endforeach;?>

