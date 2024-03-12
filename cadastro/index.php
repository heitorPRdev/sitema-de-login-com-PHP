

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
            <input type="submit" value="Cadastrar" name="Cadastrar">
        </form>
        <p>já tem uma conta?<br><a href="/sitema-de-login-com-PHP/login/">login</a></p>
    </section>
   
    <?php 
        //inserir criptografia nos nomes dos cadastro e depois nos de login
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
            $tam_result = sizeof($result) ?? 0;
            if($result == NULL){
                
                $query2 = "INSERT INTO cadastros (nome,senha) VALUES ('$nome','$senha')";
                $conn->query($query2);
                
    
            }else{
                for($cont = 0; $cont < $tam_result ; $cont++){
                    
                    if($result[$cont]["nome"] == $nomeForm){
    
                        echo '<div id="divError"><p>Nome de usuario já existente</p></div>';
                        break;
                    }else{
                        $query2 = "INSERT INTO cadastros (nome,senha) VALUES ('$nome','$senha')";
                        $conn->query($query2);
                        
                        break;
                        
                    }
                }
            }
            
            mysqli_close($conn);
            
        }else{
            if(isset($_POST['Cadastrar']) && $nomeForm == '' && $senhaForm == ''){
                echo "<div id='divError'><p>Prencha todos os campos</p></div>";
            }
        }
    
    ?>
</body>
</html>