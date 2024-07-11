<?php
session_start();

include_once('connect.php');


$nome = '';
$email = '';
$senha = '';
$confirmsenha = '';
$gravar = '';
// $nvsenha = 'senha';
// $nvemail = 'adm@gmail.com';
// $adm = '1';

if(!empty($_POST['nome_cadastro'])){
    $nome = $_POST['nome_cadastro'];
    // echo "$nome";
}

if(!empty($_POST['email_cadastro'])){
    $email = $_POST['email_cadastro'];
}

if(!empty($_POST['senha_cadastro'])){
    $senha = $_POST['senha_cadastro'];
}

if(!empty($_POST['Confirmsenha_cadastro'])){
    $confirmsenha = $_POST['Confirmsenha_cadastro'];
}

if(!empty($_POST['registrar'])){
    $gravar = $_POST['registrar'];
}

// if ($senha = $confirmsenha){
    if($gravar == 'Registrar' && $senha == $confirmsenha){
        $res_gravar = "INSERT INTO usuarios(nome_user,email_user,senha_user) VALUES ('$nome','$email','$senha')";
        $resposta_gravar = mysqli_query($conn,$res_gravar);
  
        $_SESSION['nome_login'] = $nome;

        
        header("Location:login.php");
    
    }else{
        echo"<script language='javascript' type='text/javascript'>
        alert('Campos de senha e ConfirmeSenha devem ser iguais!!!');window.location
        .href='cadastro.php';</script>";
    }
       
        
// }




?>