

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



    <header><h1>Cadastrar</h1></header>    


    <section>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?=$nome?>">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" value="<?=$senha?>">
            <input type="submit" value="Cadastrar">
        </form>
        <p>já tem uma conta?<br><a href="/sitema-de-login-com-PHP/login/">login</a></p>
    </section>
   
    <?php 
        $nomeForm = $_POST['nome'];
        $senhaForm = $_POST['senha'];
        if($nome && $senhaForm){
            $hostname="127.0.0.1";
            $username="testegit";
            $password="testegit";
            $dbname="clientes";
            $conn = new mysqli($hostname,$username,$password,$dbname);
            if(!$conn){
                die("Connect failed". mysqli_connect_error());
            }
            
            $query = "INSERT INTO cadastros (nome,senha) VALUES ('$nome','$senha')";
            $conn->query($query);

            mysqli_close($conn);

        }else{
            echo "Prencha todos os campos";
        }
    
    ?>
</body>
</html>