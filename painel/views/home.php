<style>
    body{
        overflow:hidden;
    }
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
    h1{
        margin-left: 20px;
    }

</style>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
</head>
<h1 class="h1-home">Turmas</h1>
<a href="<?echo BASE;?>home/novaTurma" class="btn-newTurma">Nova turma</a>

<div class="container-home">
    <div class="cont-tabela">
        <table border="0" width="100%" class="bordered striped centered">


            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Qt. Alunos</th>
                <th>Ações</th>
            </tr>

                <!--Retorno da consulta do model ao banco de dados-->
                <?foreach($turmas as $turma):?>
                    <tr>
                    <th><? echo $turma['id'];?></th>
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
    </div>
    <div class="cont-alt">
        <a href="<?echo BASE?>aluno">
          <div class="aluno">
              <div class="imagem">
                  <img src="<?echo BASE?>../painel/asset/image/user.svg" alt="" height="30px" >
              </div>
              <div class="legenda" height="20%">
                    Adicionar alunos
              </div>
          </div>
        </a>            
    </div>
</div>