<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fim.css">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Game Over</title>
</head>
<body>
    <form action="fim.php" method="POST" >
    <div class="Tela">
        <div class="Gam">
            <h1>Game Over</h1>
        </div>

        <div class="Play">
            <h1>Jogar Novamente?</h1>
        </div>

        <div class="Palavras">
        <div class="Yes">
            <h1>  <button class="bot1_over" onclick="sendStrings()" ><a href="game.php" class="Yes"><input type="submit" name="bot1_over" value=" " class="input_fim" >Sim</a></button></h1>
        </div>

        <div class="No">
            <h1> <button class="bot2_over" onclick="sendStrings()"> <a href="../jogos.php" class="No" >Nao</a></h1>
        </div>
        
    </div>
    <h1><p id="resultado" name="Resultado" ></p></h1>

    <script>
        function queryString(parameter) {  
              var loc = location.search.substring(1, location.search.length);   
              var param_value = false;   
              var params = loc.split("&");   
              for (i=0; i<params.length;i++) {   
                  param_name = params[i].substring(0,params[i].indexOf('='));   
                  if (param_name == parameter) {                                          
                      param_value = params[i].substring(params[i].indexOf('=')+1)   
                  }   
              }   
              if (param_value) {   
                  return param_value;   
              }   
              else {   
                  return undefined;   
              }   
        }
        var variavel = queryString("minhaVariavel");
        console.log(variavel)

        document.getElementById("resultado").innerHTML = "PTS:"+ variavel

        let nome = variavel;
        ponto = parseInt(nome)

        const xhttp = new XMLHttpRequest(); 

        xhttp.onload = function() { 
        document.getElementById("demo").innerHTML = this.responseText;
        }

        xhttp.open("POST","fim.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("ponto="+ponto); 

    </script>

    <?php
        include_once('connect2.php');
        session_start();

        $ponto = filter_input(INPUT_POST, 'ponto', FILTER_SANITIZE_SPECIAL_CHARS);

        $gravId = mysqli_query($conn,"SELECT id_user FROM usuarios WHERE email_user = '{$_SESSION['email_login']}' and senha_user = '{$_SESSION['senha_login']}'");
        $grav = mysqli_fetch_array($gravId);
        $_SESSION['idUser'] = $grav['id_user'];

        if($grav['pontos_user'] < $ponto ){

            $res_gravarUser = "UPDATE `usuarios` SET `pontos_user` = '$ponto' WHERE email_user = '{$_SESSION['email_login']}'";
            $resposta_gravarUser = mysqli_query($conn, $res_gravarUser);
        }

        $res_gravar = "INSERT INTO score(pontos,id_user) VALUES ('$ponto','{$grav['id_user']}')";
        $resposta_gravar = mysqli_query($conn,$res_gravar);

        $YES = '';

        if(!empty($_POST['bot1_over'])){
            $YES = $_POST['bot1_over'];
        }

        if($YES == ' '){
            $verific = mysqli_query($conn, "SELECT  `fichas` FROM `usuarios` WHERE `fichas` <= 0 AND email_user = '{$_SESSION['email_login']}';");
            $verific2 = mysqli_fetch_assoc($verific);

            if( $verific2 == false){
                $upficha2 = mysqli_query($conn,"UPDATE `usuarios` SET `fichas` = `fichas` - 1 WHERE email_user = '{$_SESSION['email_login']}' ");
                header('location:game.php');
            }else{
                header('location:../jogos.php');
            }

        };
        
    ?>   

    </form>  
</body>
</html>