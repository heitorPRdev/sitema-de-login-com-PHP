<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    

    <?php 
        //pega o nome e senha dos formularios
        $nomeForm = $_POST['nome'] ?? '';
        $senhaForm = $_POST['senha'] ?? '';
         
    
    ?>

    <header>
        <button id="exitBtn">
            <i class="fa-solid fa-arrow-left-long"></i>
        </button>    
        <h1>Cadastrar</h1>
    </header>    


    <section>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?=$nomeForm?>">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" value="<?=$senhaForm?>">
            <input type="submit" value="Cadastrar" name="Cadastrar">
        </form>
        <p>já tem uma conta?<br><a href="/sitema-de-login-com-PHP/login/">login</a></p>
    </section>
   
    <?php 
        //se tiver nome e senha  executa isso
        if($nomeForm && $senhaForm){
            //criptografa o nome e senha do form
            $nomeCript = md5($nomeForm);
            $senhaCript = md5($senhaForm);
            //variaveis para conseguir fazer o crud no mysql
            $hostname="127.0.0.1";
            $username="testegit";
            $password="testegit";
            $dbname="clientes";
            $conn = new mysqli($hostname,$username,$password,$dbname);
            if(!$conn){
                die("Connect failed". mysqli_connect_error());
            }
            //faz o comando para o mysql e retorna a lista do banco de dados com nomes e senha criptografados
            $query = "SELECT nome,senha FROM cadastros";
            $databaseSearch = $conn->query($query);
            $result = $databaseSearch->fetch_all(MYSQLI_ASSOC);
            $tam_result = sizeof($result) ?? 0;

            //Se o resultado for igual a NULL incere o nome e senha no banco de dados
            if($result == NULL){
                
                $query2 = "INSERT INTO cadastros (nome,senha) VALUES ('$nomeCript','$senhaCript')";
                $conn->query($query2);
                mysqli_close($conn);
    
            }else{
                //Se não ele executa um for
                for($cont = 0; $cont < $tam_result; $cont++){
                    //verifica se há um nome igual já cadastrado
                    if($result[$cont]["nome"] == $nomeCript){
                     
                        echo '<div id="divError"><p>Nome de usuario já existente</p></div>';
                        
                    }else{
                        //Se não tiver ele cadastra esse nome e incere um cookie
                        $query2 = "INSERT INTO cadastros (nome,senha) VALUES ('$nomeCript','$senhaCript')";
                        $conn->query($query2);
                        //Exclui e depois cria um novo cookie
                        setcookie("NameCad", $nomeForm, time()-864000,'/');
                        setcookie("NameCad", $nomeForm, time()+864000,'/');
                        
                        
                    }
                }
                //fecha o banco de dados
                mysqli_close($conn);
            }
            
           
            
        }else{
            //se o botão Cadastrar do from for clicado e nome e senha for igual a uma string vazia
            if(isset($_POST['Cadastrar']) && $nomeForm == '' && $senhaForm == ''){
                echo "<div id='divError'><p>Prencha todos os campos</p></div>";
            }
        }
    
    ?>
     <script>
        $(document).ready(function(){
            $('#exitBtn').on('click',()=>{
                window.open('/','_self')
            })
        })
    </script>
</body>
</html>