<?php
session_start();
require 'config.php';

if (isset($_POST['name']) && empty($_POST['name'] == false)) {
    $name = $_POST['name'];
    $msg = $_POST['msg'];

    $sql = $pdo->prepare("INSERT INTO message SET name = :name, msg = :msg, data_msg = NOW()");
    $sql->bindValue(":name", $name);
    $sql->bindValue(":msg", $msg);
    $sql->execute();
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
                Comments

            </div>
        </div>
    </header>

    <fieldset>
        <form method="POST">
            NOME:<br />
            <input type="text" name="name" cols="30" /><br /><br />

            MENSAGEM:<br />
            <textarea name="msg" cols="30" rows="10"></textarea><br /><br />

            <input type="submit" value="Enviar " />

        </form>
    </fieldset>
    <?php
    $sql = "SELECT * FROM message ORDER BY data_msg DESC";
    $sql = $pdo->query($sql);
    if ($sql->rowCount() > 0) {
        foreach ($sql->fetchAll() as $mensagem) :
    ?>
               <div class="data">
                   <?php echo $mensagem['data_msg']; ?><br/>
               </div> 
                <strong><?php echo $mensagem['name']; ?></strong><br/><br/>
                <?php echo $mensagem['msg']; ?>
                <hr />

    <?php
        endforeach;
    } else {
        echo "Não há mensagens.";
    }
    ?>
</body>

</html>