<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo BASE?>asset/css/login.css">
   <!-- <style>
        form{
            width: 300px;
            height: 300px;
            background-color: #ddd;
            margin:auto;
            margin-top: 100px;
            padding: 20px;
            border-radius:10px;
        }
        input{
            
            width: 100%;
            padding: 15px;
            margin-bottom:10px;
            font-size: 14px;
            border:1px solid #CCC;
        }
        body{
            background: radial-gradient(#3a45b0, #2d3691);
        }
        
    
    </style>-->
</head>
<body>
    <div class="logo">
        <img src="<?php echo BASE?>/asset/image/logo-anchieta.png"/>
    </div>
    <h1 style="color:#fff; text-align:center" >EAD - Colégio Anchieta</h1>
    <div class="login">
    <form  method="post">
        <h1>Login</h1>
        <input type="text" name="matricula" id="c_matricula" placeholder="Matricula" autofocus><br>
        <input type="password" name="senha" id="c_senha" placeholder="Senha"><br>
        <input type="submit" value="Logar" class="btn">
    </form>
    <p class="ret"><a href="http://www.w3soft1.com.br/w3escola/W3Escola/frm_login.aspx?codigoEmpresa=35#"> Consulte sua matricula</a></p>
    </div>

</body>
</html>
    


