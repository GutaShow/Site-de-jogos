<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro_pontos.css">
    <title>Cadastro de fichas</title>
</head>
<body>

<form action="proc_cadastro_pontos.php" method="post">

  <h1 class="titulo">CADASTRO DE FICHAS</h1>

  <div class="retangulo_img" ><img src="Rectangle 1.png"></div>
  <div class="retangulo_img2" ><img src="Rectangle 2.png"></div>
  <div class="retangulo_img3" ><img src="Rectangle 3.png"></div>
  <div class="retangulo_img4" ><img src="Rectangle 4.png"></div>
  <div class="retangulo_img5" ><img src="Rectangle 5.png"></div> 
  

  
  <h1 class="titulo1">Somente Pessoal Autorizado</h1>

  <div class="selectp">
        <label for="text"><b>EMAIL DOS JOGADORES</b></label><br>
  </div>

      <input type="number" name="cadastro_ficha" class="cadastro">
      <input type="email" name="cadastro_jogador" class="cadastro2">

  <div class="selectsc">
        <label for="text"><b>SELECIONAR FICHAS</b></label><br>
  </div>

  <div class="selectsc2">
        <label for="text"><b>SELECIONAR JOGADOR</b></label><br>
  </div>

  <div class='botao_cadastrar'>
        <input class='botao' type="submit" name="cadastrar" value="Cadastrar"><br/>
  </div>

  <?php
      // include_once('danielconect.php');
      include_once('connect.php');

      $placar = "SELECT DISTINCT * FROM `pagamento` ";
      $placar_listar = mysqli_query($conn, $placar);

      while($row_tabela = mysqli_fetch_assoc($placar_listar)){
            echo "<div class='arrumar_list'>
                        <div class='email_pagxlog'>
                              <h3 id='list_c_ficha'>".$row_tabela['email_pag']."</h3>"."<h3>=</h3>"."<h3 id='nome2_listar'>".$row_tabela['email_user']."</h3>    
                        </div>

                        <div class='email_pagxlog'> 
                        <h3>"."nivel da compra:".$row_tabela['nv_pag']."</h3>
                        </div>
                  </div>";
        }  

  ?>
</form>
</body>
</html>