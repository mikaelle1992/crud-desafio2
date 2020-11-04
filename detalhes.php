<?php
session_start();
require 'config.php';
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
                Detalhes

            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li class="active"><a href="listagem.php">HOME</a></li>
                        <li><a href="inserir.php">ADD</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section>

        <div class="tabela">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Cor do Cabelo</th>
                    <th>Cor dos olhos</th>
                    <th>Peso</th>
                    <th>Altura</th>

                </tr>
                <?php

                if (isset($_GET['id']) && empty($_GET['id']) == false) {
                    $id = addslashes($_GET['id']);
                }
              

                $sql = "SELECT users.id, users.name , users.birth_date ,featurephysical.eyer_color ,featurephysical.hair_color, featurephysical.weight ,featurephysical.height
                from users join featurephysical
                on featurephysical.user_id = users.id
                where users.id = '$id';";
                $sql = $pdo->query($sql);
              
               if ($sql->rowCount() > 0) {
                    $dado = $sql->fetch();

                    echo '<tr>';
                    echo '<td>' . $dado['name'] . '</td>';
                    echo '<td>' . $dado['eyer_color'] . '</td>';
                    echo '<td>' . $dado['hair_color'] . '</td>';
                    echo '<td>' . $dado['weight'] . '</td>';
                    echo '<td>' . $dado['height'] . '</td>';
                    echo '</tr>';
               
                }
                ?>
            </table>
        </div>
    </section>

</body>

</html>