<head>
    <title>Jogos</title>
</head>
<?php
include_once('menu.php');
?>
<body id="jogosbg"></body>
    <form action="jogos.php" method="POST" >
        <div class="gamespg">
            <div class="gamestop">
                <img class="linha3" src="linha.png">
                <h1 class="gamestt">GAMES</h1>
                <img class="linha3" src="linha.png">
                <a class="jogo1" ><img src="Lougou.jpg" width='100px' height='100px' ><input type="submit" name="game1" value="Ds-One / Jogar" class="jogo1-input"  ></a>
                <!-- <a href="1fase/game.php" class="jogo1">Ds-One / Jogar</a> -->
                
            </div>

            <div class="gameslist">
                
            </div>
        </div>
    </form>

    <?php
        include_once('connect.php');
        session_start();
        

        $salvficha = mysqli_query($conn,"SELECT `fichas` FROM usuarios WHERE email_user = '{$_SESSION['email_login']}'");
        $listficha = mysqli_fetch_array($salvficha);
        echo"<div class='mostrar_fichas' style='text-align:center;'><a class='mostr-ficha' >{$listficha['fichas']}</a><img src='ficha_imagem.png' class='ficha_imagem'></div>";
        $game1 = '';

        if(!empty($_POST['game1'])){
            $game1 = $_POST['game1'];
        }



        if($game1 == 'Ds-One / Jogar'){
            
            $verific = mysqli_query($conn, "SELECT  `fichas` FROM `usuarios` WHERE `fichas` <= 0 AND email_user = '{$_SESSION['email_login']}';");
            $verific2 = mysqli_fetch_assoc($verific);
            // $contficha = mysqli_num_rows($salvficha);
            if( $verific2 == true){
                header('Location:jogos.php');
            }else{
                header('Location:carregamento/loading.html');
                $upficha2 = mysqli_query($conn,"UPDATE `usuarios` SET `fichas` = `fichas` - 1 WHERE email_user = '{$_SESSION['email_login']}' ");
            }
            

        };

?>
</body>
</html>

<!-- background="jogosbg.png" -->