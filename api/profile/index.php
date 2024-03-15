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
    <header>
        <button id="IniBtn">
            <i class="fa-solid fa-house-chimney"></i> Home
        </button> 
        <div id="logCadLin">
                
            <a href="/sitema-de-login-com-PHP/login/">login</a>
            <a href="/sitema-de-login-com-PHP/cadastro/" style="padding-left: 10px;">cadastro</a>
        </div>
    </header>



    <section>
        <h1>Olá, <?=$nome?>! seja bem vindo</h1>
        <p>Muito obrigado por visitar esse site</p>
        
    </section>
    
    <section>
        <button id="GoConfig"><i class="fa-solid fa-gear" style="color: #000000;"></i> configurações</button>
    </section>
    <script>
        $(document).ready(function(){
            $('#GoConfig').on('click', function(){
                window.open("/sitema-de-login-com-PHP/profile/config",'_self');
            })
            $("#IniBtn").on('click',()=>{
                window.open('/sitema-de-login-com-PHP/','_self')
            })
        })

    </script>
</body>
</html>