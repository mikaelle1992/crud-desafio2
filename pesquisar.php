<?php
require 'config.php';
session_start();



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
                    <th>DataNasc</th>
                    <th>Sexo</th>
                    <th>Logradouro</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Pais</th>
                    <th>Ações</th>
                </tr>
                <?php

                if (isset($_POST['busca']) && empty($_POST['busca']) == false) {
                    $busca = addslashes($_POST['busca']);

                    $sql = "SELECT * FROM users WHERE name like '%$busca%'";
                }else{
                    header("Location:listagem.php");
                }
                $sql = $pdo->query($sql);

                if ($sql->rowCount() > 0) {
                    $dado = $sql->fetch();

                    echo '<tr>';
                    echo '<td>' . $dado['name'] . '</td>';
                    echo '<td>' . $dado['birth_date'] . '</td>';
                    echo '<td>' . $dado['sex'] . '</td>';
                    echo '<td>' . $dado['logradouro'] . '</td>';
                    echo '<td>' . $dado['neighborhood'] . '</td>';
                    echo '<td>' . $dado['city'] . '</td>';
                    echo '<td>' . $dado['uf'] . '</td>';
                    echo '<td>' . $dado['nationatity'] . '</td>';
                    echo '<td><a href ="detalhes.php?id=' . $dado['id'] .'"><img src="imgs/detalhes.png" width="30" height="30" ></a></td>';
                    echo '</tr>';
                }

                ?>
            </table>
        </div>
    </section>

</body>

</html>