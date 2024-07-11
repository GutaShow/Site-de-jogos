<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="venda.css">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Loja</title>
</head>
<body class="venda_body" background="bgv12.png">
    

<!-- <button>Clique aqui</button> -->



    <?php
    include_once('menu.php');
    ?>

    <div class="tela_venda">
        <h1 class="text_venda">Loja</h1>

        <img src="Rectangle1.png" class="retangulo1">
        <img src="Rectangle1.png" class="retangulo2">
        <img src="Rectangle1.png" class="retangulo3">
        <img src="Rectangle1.png" class="retangulo4">

    <!--                                                -->

        <img src="Rectangle7.png" class="retangulo5">
        <img src="Rectangle7.png" class="retangulo6">
        <img src="Rectangle7.png" class="retangulo7">
        <img src="Rectangle7.png" class="retangulo8">

    <!--                                                -->

        <img src="Rectangle14.png" class="retangulo9">
        <img src="Rectangle14.png" class="retangulo10">
        <img src="Rectangle14.png" class="retangulo11">
        <img src="Rectangle14.png" class="retangulo12">

    <!--                                                -->

        <img src="Rectangle15.png" class="retangulo13">
        <img src="Rectangle15.png" class="retangulo14">
        <img src="Rectangle15.png" class="retangulo15">
        <img src="Rectangle15.png" class="retangulo16">

    <!--                                                -->

        <img src="Rectangle21.png" class="retangulo17">
        <img src="Rectangle22.png" class="retangulo18">
        <img src="Rectangle21.png" class="retangulo19">
        <img src="Rectangle22.png" class="retangulo20">

        <img src="Rectangle21.png" class="retangulo21">
        <img src="Rectangle22.png" class="retangulo22">
        <img src="Rectangle21.png" class="retangulo23">
        <img src="Rectangle22.png" class="retangulo24">

        
        <img src="Rectangle21.png" class="retangulo25">
        <img src="Rectangle22.png" class="retangulo26">
        <img src="Rectangle21.png" class="retangulo27">
        <img src="Rectangle22.png" class="retangulo28">  

        <h1 class="text_1real">R$1.50</h1>
        <h1 class="text_5real">R$5.00</h1>
        <h1 class="text_10real">R$07.00</h1>

        <img src="Rectangle25.png" class="retangulo29">
        <img src="Rectangle25.png" class="retangulo30">
        <img src="Rectangle25.png" class="retangulo31">

        <img src="fichas3.png" class="ficha3">
        <img src="fichas2.png" class="ficha2">
        <img src="fichas1.png" class="ficha1">

        <button class="text_compra1"><h1>Comprar</h1></button> 
        <button class="text_compra2"><h1>Comprar</h1></button> 
        <button class="text_compra3"><h1>Comprar</h1></button> 

        <h1 class="text_quant1" >10</h1>
        <h1 class="text_quant2" >50</h1>
        <h1 class="text_quant3" >100</h1>

        <button class="botao_venda1" ></button>
        <button class="botao_venda2" ></button>
        <button class="botao_venda3" ></button>
        <form action="venda_proc.php" method="POST" >
        <div class="popup-wrapper">
            <div class="popup">
                <div class="popup-close">x</div>
                <div class="popup-content">
                <h2>Pagamento</h2>
                <p>Informe email do PagSeguro</p>
                <div class="numero">
                    <input type="email" name="emailPag">
                    <input type="submit" name="pag1" value="comprar 1 ficha" id="pag1"></input>
                     <!-- <a href="https://pag.ae/7YRwghuw3">comprar 1 ficha</a> -->
                    <input type="submit" name="pag2" value="comprar 50 fichas" id="pag2" >
                    <!-- <a href="https://pag.ae/7YRwR1qjm">comprar 50 fichas</a> -->
                    <input type="submit" name="pag3" value="comprar 100 fichas" id="pag3">
                    <!-- <a href="https://pag.ae/7YRwvKa-s">comprar 100 fichas</a> -->
                </div>  
            </div>
        </div>
    </div>

    </div>
    </form>
</body>
  <script src="venda.js"></script>
  <script src="vendas.js"></script>
</html>
<!-- background="bgv3.jpg" -->