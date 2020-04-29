<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo BASE?>asset/css/login.css">
   
</head>
<body>
    <div class="logo">
        <img src="<?php echo BASE?>/asset/image/logo-anchieta.png"/>
    </div>
    <h1 style="color:#fff; text-align:center" >EAD - Colégio Anchieta</h1>
    <div class="login">
    <form  method="post">
        <input type="text" name="matricula" id="c_matricula" placeholder="Matricula" autofocus><br>
        <input type="password" name="senha" id="c_senha" placeholder="Senha"><br>
        <input type="submit" value="Logar" class="btn">
    </form>
    <p class="ret"><a href="http://www.w3soft1.com.br/w3escola/W3Escola/frm_login.aspx?codigoEmpresa=35#"> Consulte sua matricula</a></p>
    </div>

</body>
</html>
    


