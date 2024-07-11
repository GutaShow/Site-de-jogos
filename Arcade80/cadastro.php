<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Tela de Cadastro</title>
</head>
<body class="body_login">
<form action="proc_cadastro.php" method="post">

    <div class="elipse_img" ><img src="Ellipse 1.png"></div>
    <div class="elipse_img2" ><img src="Ellipse 1.png"></div>
    <div class="elipse_img3" ><img src="Ellipse 1.png"></div>
    <div class="elipse_img4" ><img src="Ellipse 1.png"></div>

    <div class="div_textLogin">
    <h1 class="text_login">Cadastro
    </h1>
    </div>

  <div class="tela">
    <div class="inputs_login">

        <div class="nome">
            <label for="text"><b>Nome:</b></label><br>
            <input type="text" name="nome_cadastro" id="nome_cadastro" maxLength="3" minlength="3" ><br>
        </div>

        <div class="email">
            <label for="email"><b>Email:</b></label><br>
            <input type="temail" name="email_cadastro" id="email_cadastro"><br>
        </div>

        <div class="senha">
            <label for="senha"><b>Senha:</b></label><br>
            <input type="password" name="senha_cadastro" id="senha_cadastro"><br>
        </div>

        <div class="confirmSenha">
            <label for="senha"><b>ConfirmeSenha:</b></label><br>
            <input type="password" name="Confirmsenha_cadastro" id="Confirmsenha_cadastro" ><br>
        </div>

    </div>

    <div class='botoes_login'>
        <input class='botao' type="submit" name="registrar" value="Registrar"><br/>
    </div>
    
</div>
</form>

</body>
</html>