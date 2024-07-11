<?php

include_once('connect.php');



$ficha = '';
$jogador = '';
$gravar = '';

if(!empty($_POST['cadastro_ficha'])){
    $ficha = $_POST['cadastro_ficha'];
}

if(!empty($_POST['cadastro_jogador'])){
    $jogador = $_POST['cadastro_jogador'];
}

if(!empty($_POST['cadastrar'])){
    $gravar = $_POST['cadastrar'];
}
    if($gravar == 'Cadastrar'){
        $verific = mysqli_query($conn, "SELECT  `fichas` FROM `usuarios` WHERE `fichas` >= 99 AND email_user = '$jogador';");
        $verific2 = mysqli_fetch_assoc($verific);

        if($verific2 == true){
            header('Location:cadastro_pontos.php');
            exit;
        }else{
            $res_gravar = "UPDATE `usuarios` SET `fichas`= `fichas` + '$ficha'  WHERE email_user = '$jogador'";
            $resposta_gravar = mysqli_query($conn,$res_gravar);
        }
       
        header('Location:cadastro_pontos.php');
        exit;
    }
?>