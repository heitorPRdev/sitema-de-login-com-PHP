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
    <title>Document</title>
</head>
<body>
    <section>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="submit" value="Deslogar" name='deslogar'>
    
        </form>
    </section>
    <?php 
    
        if(isset($_POST['deslogar'])){
            setcookie('NameCad', '',time()-864000, '/');
            header("location:/sitema-de-login-com-PHP/login/");
        }
    
    ?>
</body>
</html>