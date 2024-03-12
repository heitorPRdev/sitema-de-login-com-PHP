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
            <input type="text" name="nome" id="nome" value="<?=$nome?>" require=true>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" value="<?=$senha?>" require=true>
            <input type="submit" value="Logar" name='Logar'>
        </form>
        <p>já tem uma conta?<br><a href="/sitema-de-login-com-PHP/cadastro/">Cadastrar</a></p>
    </section>
    <?php 
        $nomeForm = $_POST['nome'] ?? '';
        $senhaForm = $_POST['senha'] ?? '';
        
        if($nome && $senhaForm){

            $hostname="127.0.0.1";
            $username="testegit";
            $password="testegit";
            $dbname="clientes";
            
            $conn = new mysqli($hostname,$username,$password,$dbname);
            if(!$conn){
                die("Connect failed". mysqli_connect_error());
            }
            
            $query = "SELECT nome,senha FROM cadastros";
            $databaseSearch = $conn->query($query);
            $result = $databaseSearch->fetch_all(MYSQLI_ASSOC);
            for($cont = 0; $cont < sizeof($result); $cont++){
                if($result[$cont]["nome"] == $nomeForm && $result[$cont]["senha"] == $senhaForm){
                    header("location:/sitema-de-login-com-PHP/profile/");
                }else{
                    echo "<div id='divError'><p>nome ou senha não existe</p></div>";
                }

                mysqli_close($conn);
            }

        }else{
            if(isset($_POST['Logar']) && $nomeForm == '' && $senhaForm == ''){
                echo "<div id='divError'><p>Prencha todos os campos</p></div>";
            }
        }
        
    ?>
    
</body>
</html>