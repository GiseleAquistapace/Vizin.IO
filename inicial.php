<?php
session_start();
include_once 'conexao.php'
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <title>Vizin.IO - Conectando Vizinhos</title>      
  </head>
  <body>   
    <div class="welcome">
      <img id="logo2" src="img/logo.png">      
      <img id="pin" src="img/pin.png">
      <img id = "emg" src="img/emergencia.png">
      <img id = "cht" src="img/chat.png">
      <img id = "doa" src="img/doacao.png">
      <h1>Vizin.IO</h1>           
      <h2>Bem-vindo(a) <?php echo utf8_encode($_SESSION['nome']); ?>!</h2>      
      <button id="verificarAlertas">Verificar Alertas</button>      
      <button id="contatarEmergencia">Contatar Emergência</button>
      <button id="chatBairro">Chat do Bairro</button>
      <button id="contribuicoes">Contribuições</button>
    </div>    
    <script src="js/app.js"></script>
  </body>
</html>

