<h1>Editar Aluno</h1>

<form  method="POST" class="aluno_cad">

    Nome: <input type="text" name="nome" id="nome" value="<?echo $aluno['nome']?>"><br/>
    Matricula: <input type="text" name="matricula" id="matricula" value="<?echo $aluno['matricula']?>"><br/>
    Senha: <input type="password" name="senha" id="senha" value="<?echo $aluno['senha']?>"><br/>
    Turma:
  
    <select name="turmas">
        <option></option>
    <?foreach($turmas as $turma):?>
        
        <option value="<?echo $turma['id'];?>"
        <?
            if(in_array($turma['id'], $inscrito)){
                echo 'selected ="selected"';
            }
        ?>
        
        
        >           
        <?echo $turma['nome'];?></option>
    
    <?endforeach;?>
    </select><br/>

    <input type="submit" value="Salvar">



</form>

<a href="<?echo BASE;?>aluno" class="voltar"> << Voltar </a>