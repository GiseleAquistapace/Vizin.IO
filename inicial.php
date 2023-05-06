<?php
session_start();
include_once 'conexao.php'
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Vizin.IO - Conectando Vizinhos</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        img {
        max-width: 5%;
       
                    
        }        
	</style>
  </head>
  <body>  
    <div class="welcome">
      <img src="Image/logo.png">
      <h1>Vizin.IO</h1>           
      <h2>Bem-vindo(a) <?php echo $_SESSION['nome']; ?> !</h2>
      <button id="verificarAlertas">Verificar Alertas</button>
      <button id="contatarEmergencia">Contatar Emergência</button>
      <button id="chatBairro">Chat do Bairro</button>
      <button id="contribuicoes">Contribuições</button>
    </div>    
    <script src="app.js"></script>
  </body>
</html>