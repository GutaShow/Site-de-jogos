<?php
session_start();

include_once('connect.php');

$foto = '';
$gravar = '';


if(!empty($_FILES['foto_perfil'])){
    $foto = $_FILES['foto_perfil']['name'];
   
}

if(!empty($_POST['cad_foto'])){
    $gravar = $_POST['cad_foto'];
}

$tmp = $_FILES['foto_perfil']['tmp_name'];
$dir1 = 'img/';
$dir2 = $dir1.$foto;
move_uploaded_file($tmp, $dir2);

if($gravar == 'Cadastrar'){
    $res_gravar = "UPDATE `usuarios` SET `foto` = '$foto' WHERE `id_user` = '{$_SESSION['idUser']}' ";
    $resposta_gravar = mysqli_query($conn,$res_gravar);
    $_SESSION['dir'] = $dir1; 
    // while($_SESSION['dir'] == null){
    //     $_SESSION['dir'] = 'imagem-perfil.jpg';
    // }
    header("location:perfil.php");
}


?>
