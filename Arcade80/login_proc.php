<?php
session_start();
include_once('connect.php');

$email = $_POST['email_login'];
$senha = $_POST['senha_login'];
$logar = $_POST['logar'];

if (isset($logar)) {

    $res_logar = mysqli_query($conn,"SELECT * FROM usuarios WHERE email_user = '$email' and senha_user = '$senha'");
    $row = mysqli_num_rows($res_logar);

    $res_logar2 = mysqli_query($conn,"SELECT * FROM nvusuario WHERE email_nvusuario = '$email' AND senha_nvusuario = '$senha' ");
    $row2 = mysqli_num_rows($res_logar2);

    $salvnome = mysqli_query($conn,"SELECT `nome_user` FROM usuarios WHERE email_user = '$email' and senha_user = '$senha'");
    $list = mysqli_fetch_array($salvnome);

      if($row2 > 0 ){
        header("Location:cadastro_pontos.php");
        die();
      }
      if ($row > 0){
        $idUser =  mysqli_query($conn,"SELECT id_user FROM usuarios WHERE email_user = '$email'");
        $idUsers =  mysqli_fetch_array($idUser);
  
        $_SESSION['idUser'] = $idUsers['id_user'];

        header("Location:jogos.php");
        $_SESSION['email_login'] = $email;
        $_SESSION['senha_login'] = $senha;
        $_SESSION['nome2_user'] = $list['nome_user'];
        $_SESSION['dir'] = '';
        die();
      }else {
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='inicio.php';</script>";
      }
      
      // echo $_SESSION['idUser'];
  }
?>