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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <section>
        <h1>Olá, <?=$nome?>! seja bem vindo</h1>
        <p>Muito obrigado por visitar esse site</p>
        
    </section>
    <section>
        <h2>Atenção você já está usando um cookie <?='NameCad'?></h2>
        <p>Deseja retiralo?</p>
        
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="submit" value="Excluir cookie" name="Excluir-cookie">
    
        </form>

    </section>
    <?php 
        // if(isset($_POST['Excluir-cookie'])){
        //     //Excluir cookie
            
        // }
    
    ?>
</body>
</html>