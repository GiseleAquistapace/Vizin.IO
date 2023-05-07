<?php
session_start();
ob_start();
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">   
    <title>Cadastro</title>
</head>

<body>
     <button id="voltar" onclick="location.href='index.html'"><img id="imgBack" src="Image/backArrow.png"></button>
     <h1>Bem vindo (a)!</h1>
     <h3>Crie uma conta no app</h3>
     <br>

  
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);  

    $nome = $dados['nome'];
    $email = $dados['email'];
    $usuario = $dados['usuario'];
    $senha_usuario = $dados['senha_usuario'];

    if (!empty($dados['Cadastrar']) 
        AND !empty($dados['usuario']) 
        AND !empty($dados['senha_usuario'])) {
        
        $query_login = "SELECT *
                        FROM usuarios 
                        WHERE usuario ='".$dados['usuario']."'";

        $result_login = $conn->prepare($query_login);
        $result_login->execute();
        
        if ($result_login->rowCount() != 0){
            $_SESSION['msg'] = "<p style='color: #ff0000'>Este usuário já está em uso!</p>";            
        } else { 

            $query_novo_usuario = "INSERT INTO usuarios (nome, email, usuario, senha_usuario) 
                               VALUES ('$nome', '$email', '$usuario', '$senha_usuario')";

            $result_novo_usuario = $conn->prepare($query_novo_usuario);
            $result_novo_usuario->execute();

            if (true) {  
                echo '<script type="text/javascript">
                        alert("Usuário criado com sucesso" ); 
                        location= "inicial.php"; 
                     </script>';                 
            }
        }
       
    } else if (!empty($dados['Cadastrar']) 
    AND empty($dados['usuario']) || empty($dados['senha_usuario'])) {  
        $_SESSION['msg'] = "<p style='color: #ff0000'>Usuário ou senha não preenchidos!</p> 
                            <p style='color: #ff0000'> Eles são campos obigatórios, por favor preencha-os.</p>";      
    }
    
    
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    
    ?>         
     
    <form method="POST" action="">
                
        <input type="text" name="nome" placeholder="nome" value="<?php if(isset($dados['nome'])){ echo $dados['nome']; } ?>"><br><br>

        <input type="text" name="email" placeholder="email" value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>"><br><br>
        
        <input type="text" name="usuario" placeholder="usuário" value="<?php if(isset($dados['usuario'])){ echo $dados['usuario']; } ?>"><br><br>
        
        <input type="password" name="senha_usuario" placeholder="senha" value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario']; } ?>"><br><br>
        <br>
        <input type="submit" value="Criar conta" name="Cadastrar" class="btn">
    </form> 
     
    
</body>

</html>