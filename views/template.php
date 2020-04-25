<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - EAD Anchieta</title>
    <link rel="stylesheet" href="<?php echo BASE;?>asset/css/template.css">
</head>
<body>
        <div class="topo">
            <a href="<?php echo BASE;?>login/logout">
                <div>Sair</div>
            </a>
            <div class="topousuario"><?php echo $viewData['info']->getNome();?></div><!-- Captura o nome do usuario logado-->
        </div>
        <?php $this->loadViewInTemplate($viewName, $viewData);?>
</body>
</html>