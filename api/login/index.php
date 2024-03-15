<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./api/login/style.css">
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

    <header>
        <button id="exitBtn">
            <i class="fa-solid fa-arrow-left-long"></i>
        </button>
        <h1>Login</h1></header>    


    <section>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?=$nomeForm?>" require=true>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" value="<?=$senhaForm?>" require=true>
            <input type="submit" value="Logar" name='Logar'>
        </form>
        <p>já tem uma conta?<br><a href="/api/cadastro/">Cadastrar</a></p>
    </section>
    
    <?php 
        //Uma função para verificar o login
        function LoginSistem(){
            //pega o nome e senha do form
            $nomeForm = $_POST['nome'] ?? '';
            $senhaForm = $_POST['senha'] ?? '';
            //Se tiver eles
            if($nomeForm && $senhaForm){
                //criptografa else
                $nomeCript = md5($nomeForm);
                $senhaCript = md5($senhaForm);
                //variaveis para conseguir fazer o crud no mysql
                $hostname="127.0.0.1";
                $username="testegit";
                $password="testegit";
                $dbname="clientes";
                //inicia a conexão do banco de dados
                $conn = new mysqli($hostname,$username,$password,$dbname);
                if(!$conn){
                    die("Connect failed". mysqli_connect_error());
                }
                //comando do crud para pegar a lista das contas do banco de dados
                $query = "SELECT nome,senha FROM cadastros";
                $databaseSearch = $conn->query($query);
                $result = $databaseSearch->fetch_all(MYSQLI_ASSOC);
                //percorre toda lista
                for($cont = 0; $cont < sizeof($result); $cont++){
                    //se o nome da lista(criptografado) e o nome 
                    if($result[$cont]["nome"] == $nomeCript && $result[$cont]["senha"] == $senhaCript){
                        //Exclui e depois cria um novo cookie
                        setcookie("NameCad", $nomeForm, time()-864000,'/');
                        setcookie("NameCad", $nomeForm, time()+864000,'/');
                        //redireciona para a pagina do profile
                        header("location:/api/profile/");
                        
                    }else{
                        //se a senha ou nome estiver errada
                        echo "<div id='divError'><p>nome ou senha não existe</p></div>";
                        
                    }
    
                    
                }
                //fecha a conexão com banco de dados
                mysqli_close($conn);
            }else{
                //se o botão Logar do formulario for clicado e nome e senha ser = a ''
                if(isset($_POST['Logar']) && $nomeForm == '' && $senhaForm == ''){
                    echo "<div id='divError'><p>Prencha todos os campos</p></div>";
                }
            }
        }
        //se você estiver com um cookie poderá usar a forma mais rapida
        if($_COOKIE['NameCad'] ?? 0){
            echo "<div id='GoProfileDiv'><h1>Verificamos o seu login, deseja ir direto a sua conta?</h1><button id='GOProfile'>Ir</button></div>";
            //chamara a função LoginSistem
            LoginSistem();
        }else{
            //se não só chamara a função
            LoginSistem();
        }
        
    ?>
    <script>
        $(document).ready(function(){
            $('#GOProfile').on('click',function(){
                window.open('/api/profile/','_self')
            })
            $('#exitBtn').on('click',()=>{
                window.open('/','_self')
            })
        })
        
    </script>
</body>
</html>