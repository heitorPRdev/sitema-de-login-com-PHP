<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>
<body>
    <?php



        $nomeForm = $_POST['nome'] ?? '';
        $senhaForm = $_POST['senha'] ?? '';
    
    ?>    



    <header><h1>Login</h1></header>    


    <section>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?=$nomeForm?>" require=true>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" value="<?=$senhaForm?>" require=true>
            <input type="submit" value="Logar" name='Logar'>
        </form>
        <p>já tem uma conta?<br><a href="/sitema-de-login-com-PHP/cadastro/">Cadastrar</a></p>
    </section>
    
    <?php 
        if($_COOKIE['NameCad'] ?? 0){
            echo "<div id='GoProfileDiv'><h1>Verificamos o seu login, deseja ir direto a sua conta?</h1><button id='GOProfile'>Ir</button></div>";
        }else{
            if($nomeForm && $senhaForm){
                $nomeCript = md5($nomeForm);
                $senhaCript = md5($senhaForm);
                        
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
                    
                    if($result[$cont]["nome"] == $nomeCript && $result[$cont]["senha"] == $senhaCript){
                        setcookie("NameCad", $nomeForm, time()+864000,'/');
                        header("location:/sitema-de-login-com-PHP/profile/");
                        
                    }else{
                        echo "<div id='divError'><p>nome ou senha não existe</p></div>";
                        
                    }
    
                    
                }
                mysqli_close($conn);
            }else{
                if(isset($_POST['Logar']) && $nomeForm == '' && $senhaForm == ''){
                    echo "<div id='divError'><p>Prencha todos os campos</p></div>";
                }
            }
            
        }
        
    ?>
    <script>
        $(document).ready(function(){
            $('#GOProfile').on('click',function(){
                window.open('/sitema-de-login-com-PHP/profile/','_self')
            })
        })
    </script>
</body>
</html>