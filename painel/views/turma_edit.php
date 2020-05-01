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

<fieldset class="cadAula">
    <legend>Adcionar aula</legend>
    <form  method="POST">
    <input type="text" name="nome_aula" id="aula" placeholder="Titulo ou tema da aula"><br>
    Disciplina:
    <select name="disciplina_aula" id="selc_disc">
    <option ></option>
        <?foreach($disciplinas as $materia):?>
            <option value="<?echo $materia['id'];?>"><?echo utf8_encode($materia['nome']);?></option>
        <?endforeach;?>

    </select><br>
    Tipo da aula:
    <select name="tipo" id="tipo" onchange="mostraCampoUrl(this.value)" onchange="mostraCampoUrl(this.value);">
        <option ></option>
        <option value="1" >Vídeo</option>
        <option value="0">Quetionario</option>
    </select>
    <input type="text" name="url-video" id="url-video" placeholder="url do vídeo ex:/413105710" style="display: none">

        <br/><input type="submit" value="Adcionar"> 
        </form>
</fieldset>

<?foreach($disciplinas as $disciplina):?>

    <h4><?echo utf8_encode($disciplina['nome']) ?><a href="<?echo BASE;?>home/del_disciplina/<?echo $disciplina['id']?>" title="Excluir"><div class="exe">X</div></a>
    <a href="<?echo BASE;?>home/edit_disciplina/<?echo $disciplina['id']?>" title="Editar"><div class="exe_e">Editar</div></a>
    </h4>

    <?foreach($disciplina['aulas'] as $aula):?>
            <h5><?echo $aula['nome'] ?><a href="<?echo BASE;?>home/del_aula/<?echo $aula['id']?>" title="Excluir"><div class="exe">X</div></a>  <a href="<?echo BASE;?>home/edit_aula/<?echo $aula['id']?>" title="Editar"><div class="exe_e">Editar</div></a></h5>


    <?endforeach?>





<?endforeach;?>

<script>
     function mostraCampoUrl(obj) {
        
      var select = document.getElementById('tipo');

      var url = document.getElementById("url-video");
      console.log(url.style.display)
      url.style.display = (select.value == '1') 
          ? "inline"
          : "none";  
     }  

    
</script>