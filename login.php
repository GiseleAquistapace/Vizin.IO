<?php
session_start();
ob_start();
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
        display: flex;
        flex-direction: column;        
        justify-content: center;
        height: 100vh;
        text-align: center;
        margin-bottom: 100px;
        }  

        img{        
        width: 15px;
        height: 30px;
        align: center;          
        }  
        
        button{ 
        margin-left: 700px;  
        width: 10px;      
        height: 10px;            
        }      
	</style>
    <title>Login</title>
</head>

<body>
     <button onclick="location.href='index.html'"><img src="Image/backArrow.jpg"></button>
     <h1>Vizin.IO</h1>
     <h2>Login</h2>
     <br>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendLogin'])) {
        $query_usuario = "SELECT *
                          FROM usuarios 
                          WHERE usuario = '".$dados['usuario']."' 
                            ";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->execute();
                        

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
             $row_usuario = $result_usuario->fetch();
                            
                        
            if($dados['senha_usuario'] == $row_usuario['senha_usuario']){
                $_SESSION['nome'] = $row_usuario['nome'];
                header("Location: inicial.php");
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Senha inválida!</p>";
            }
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário inválido!</p>";
        }
            
    }

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>         
     
    <form method="POST" action="">
        <label>Usuário</label>
        <input type="text" name="usuario" placeholder="Digite o usuário" value="<?php if(isset($dados['usuario'])){ echo $dados['usuario']; } ?>"><br><br>
        
        <label>Senha</label>
        <input type="password" name="senha_usuario" placeholder="Digite a senha" value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario']; } ?>"><br><br>
        <br>
        <input type="submit" value="Entar" name="SendLogin" class="btn">
    </form> 
     
    
</body>

</html>