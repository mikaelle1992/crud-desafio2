<?php
session_start();
require 'config.php';
if (isset($_POST['email']) && empty($_POST['email']) == false) {
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));


    $sql = "INSERT INTO userlogin SET email = '$email', password ='$senha'";
    $pdo->query($sql);

    header("Location: index.php");
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
        <div class="containerLogin">

            <div class="tituloLogin">
                New user

            </div>
        </div>
    </header>

    <section class="form">

        <div class="formularioLogin">
            Please sign up to continue
            <form method="POST"><br />
                E-mail:<br />
                <input type="email" name="email" size="35"><br /><br />
                Password:<br />
                <input type="password" name="senha" size="35"><br /><br />
                <input type="submit" value="Register">
            </form>

        </div>
    </section>

</body>

</html>