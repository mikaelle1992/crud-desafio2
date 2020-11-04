<?php
session_start();
require 'config.php';

if (isset($_POST['email']) && empty($_POST['email']) == false) {
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));
   
     

        $sql ="SELECT * FROM userlogin WHERE email = '$email' AND password = '$senha'";
         $sql=$pdo->query($sql);

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['id'] = $dado['id'];
            header("Location:listagem.php");
        }
  
}

?>
<html>

<head>
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <header>
        <div class="container">

            <div class="titulo">
                Login

            </div>
        </div>
    </header>

    <section class="formul">

        <div class="formularioLogin">
            Entre com seus dados corretamente.
            <form method="POST"><br />
                E-mail:<br />
                <input type="email" name="email" size="35"><br /><br />
                Password:<br />
                <input type="password" name="senha" size="35"><br /><br />
                <input type="submit" value="log in" size="35">
            </form>
            <div class="cadastro">
                <a href="cadastraUsuario.php">Don't have an account </a>
            </div>
        </div>
    </section>

</body>

</html>