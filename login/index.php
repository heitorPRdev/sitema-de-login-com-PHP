<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php 
        $nome = $_POST["nome"] ?? '';
        $senha = $_POST["senha"]  ?? '';
    
    ?>    



    <header><h1>Login</h1></header>    


    <section>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?=$nome?>">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" value="<?=$senha?>">
            <input type="submit" value="Logar">
        </form>
        <p>já tem uma conta?<br><a href="/sitema-de-login-com-PHP/cadastro/">Cadastrar</a></p>
    </section>
    
</body>
</html>