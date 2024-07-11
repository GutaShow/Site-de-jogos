<?php
    // include_once('danielconect.php');
    include_once('connect.php');
    session_start();

    $email_PagSeguro = '';
    $pag1 = '';
    $pag2 = '';
    $pag3 = '';

    if(!empty($_POST['emailPag'])){
        $email_PagSeguro = $_POST['emailPag'];
    }
        
    if(!empty($_POST['pag1'])){
        $pag1 = $_POST['pag1'];
    }

    if(!empty($_POST['pag2'])){
        $pag2 = $_POST['pag2'];
    }

    if(!empty($_POST['pag3'])){
        $pag3 = $_POST['pag3'];
    }

    if($pag1 == 'comprar 1 ficha'){
        $res_gravar = "INSERT INTO pagamento(email_pag,nv_pag,email_user) VALUES ('$email_PagSeguro','1','{$_SESSION['email_login']}')";
        $resposta_gravar = mysqli_query($conn,$res_gravar);
        $_SESSION['emailPagSeguro'] = $email_PagSeguro;
        echo"<script language='javascript'>
        window.location.href='https://pag.ae/7YRwghuw3';</script>";
        exit;
    }

    if($pag2 == 'comprar 50 fichas'){
        $res_gravar = "INSERT INTO pagamento(email_pag,nv_pag,email_user) VALUES ('$email_PagSeguro','2','{$_SESSION['email_login']}')";
        $resposta_gravar = mysqli_query($conn,$res_gravar);
        $_SESSION['emailPagSeguro'] = $email_PagSeguro;
        echo"<script language='javascript'>
        window.location.href='https://pag.ae/7YRxZHVS3';</script>";
        exit;
    }

    if($pag3 == 'comprar 100 fichas'){
        $res_gravar = "INSERT INTO pagamento(email_pag,nv_pag,email_user) VALUES ('$email_PagSeguro','3','{$_SESSION['email_login']}')";
        $resposta_gravar = mysqli_query($conn,$res_gravar);
        $_SESSION['emailPagSeguro'] = $email_PagSeguro;
        echo"<script language='javascript'>
        window.location.href='https://pag.ae/7YRxYJ-X3';</script>";
        exit;
    }
    
?>