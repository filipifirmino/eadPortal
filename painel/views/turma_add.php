<style>
    .input{
        margin-bottom: 10px;
        margin-left: 20px;
    }
    form span{
        margin-left: 20px;
    }
    h1{
        margin-left: 20px;
    }

</style>


<h1>Criar turma</h1>

<form method="POST" enctype="multipart/form-data">

    <input type="text" name="nome_turma" id="nome_turma" placeholder="Nome da turma" class="input">
    <br/>
    <span>Imagem da turma:</span>

    <input type="file" name="imagem_turma" id="imagem_turma"  class="input"><br/>

    <input type="submit" value="Criar turma" class="input">
   

</form>