<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
</head>
<h3>Alunos</h3>

<a href="<?echo BASE;?>aluno/adcionar" class="btn-newTurma">Novo aluno</a><br>

<table method="POST" class="bordered striped centered">
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Matricula</th>
        <th>Turma</th>
        <th>Actions</th>
    </tr>
    <?foreach($alunos as $aluno):?>
        <tr>
            <th><?echo $aluno['id'];?></th>
            <th><?echo $aluno['nome']?></th>
            <th><?echo $aluno['matricula']?></th>
            <th><?echo $aluno['turma']?></th>
            <th>
                <a href="<?echo BASE;?>aluno/excluir/<?echo $aluno['id']?>">[Excluir]</a>-
                <a href="<?echo BASE;?>aluno/editar/<?echo $aluno['id']?>">[Editar]</a>    
            </th>
        </tr>
    <?endforeach;?>
    
</table>