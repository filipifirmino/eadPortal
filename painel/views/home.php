<style>

    table tr th  a{
        text-decoration:none;
    }
    table{
        width: 100%;
        height: auto;
        font-size: 10pt;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-weight: normal;
        border-top:1px solid #ccc;
    }

</style>
<h1>Turmas</h1>
<a href="<?echo BASE;?>home/novaTurma">Nova turma</a>
    <table border="0" width="100%">


        <tr>
            <th>Nome</th>
            <th>Qt. Alunos</th>
            <th>Ações</th>
        </tr>

            <!--Retorno da consulta do model ao banco de dados-->
            <?foreach($turmas as $turma):?>
                <tr>
                    <th><? echo $turma['nome'];?></th>
                    <th><?echo $turma['qtalunos'];?></th>
                    <th><a href="<?echo BASE;?>home/editar/<?echo $turma['id']?>">
                     <img src="<?echo BASE;?>asset/image/editar.svg" alt="Editar"width="15" height="15" title="Editar turma">
                    </a> -<a href="<?echo BASE;?>home/excluir/<?echo $turma['id']?>">
                    <img src="<?echo BASE;?>asset/image/excluir.svg"alt="Excluir" width="15" height="15" title="Excluir turma">
                    </a></th>
                </tr>
            
            <? endforeach; ?>

         
    </table>