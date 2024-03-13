<?php 
    if($_COOKIE['NameCad']){
        $nome = $_COOKIE['NameCad'];
    }else{
        header("location:/sitema-de-login-com-PHP/login/");
    }
    
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <section>
        <h1>Olá, <?=$nome?>! seja bem vindo</h1>
        <p>Muito obrigado por visitar esse site</p>
        
    </section>
    
    <section>
        <button id="GoConfig">Ir paras as configurações</button>
    </section>
    <script>
        $(document).ready(function(){
            $('#GoConfig').on('click', function(){
                window.open("/sitema-de-login-com-PHP/profile/config");
            })
        })

    </script>
</body>
</html>