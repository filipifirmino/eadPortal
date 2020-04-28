<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - EAD Anchieta</title>
    <link rel="stylesheet" href="<?php echo BASE;?>asset/css/template.css">
    <script src="<?php echo BASE;?>asset/js/jquery-3.5.0.js"></script>
    <script src="<?php echo BASE;?>asset/js/script.js"></script>
   
</head>
<body>
        <div class="topo">
            <a href="<?echo BASE?>"><span class="ead-titulo">EAD - Colégio Anchieta</span></a>
            <a href="<?php echo BASE;?>login/logout">
                <div class="btn-sair">Sair</div>
            </a>
            <div class="topousuario"><?php echo $viewData['info']->getNome();?></div><!-- Captura o nome do usuario logado-->
        </div>
        
        <?php $this->loadViewInTemplate($viewName, $viewData);?>
       
</body>
</html>