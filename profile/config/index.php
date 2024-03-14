<?php 
    //se existir cookie NameCad(O nome do úsuario)
    if($_COOKIE['NameCad']){
        $nome = $_COOKIE['NameCad'];
    }else{
        //se não será redirecionado para fazer um login
        header("location:/sitema-de-login-com-PHP/login/");
    }
    
    
?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <header>
        <button id="exitBtn">
            <i class="fa-solid fa-arrow-left-long"></i>
        </button>
        <h1>configurações</h1>
    </header>
    <section id="SectionArea1">
        <h2>Você deseja deslogar da sua conta?</h2>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="submit" value="Deslogar" name='deslogar' id='deslogar'>
    
        </form>
    </section>
    
    <?php 
        //se o botão de deslogar for clicado apaga os cookies e o enviará ao login
        if(isset($_POST['deslogar'])){
            setcookie('NameCad', '',time()-864000, '/');
            header("location:/sitema-de-login-com-PHP/login/");
        }
    
    ?>
    <script>
        $(document).ready(function(){
            $('#exitBtn').on('click',()=>{
                window.open('/sitema-de-login-com-PHP/profile/')
            })
        })
    </script>
</body>
</html>