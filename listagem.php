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
                Listagem
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li class="active"><a href="">HOME</a></li>
                        <li><a href="inserir.php">ADD</a></li>
                        <li><a href="comentario.php">COMMENTS</a></li>

                    </ul>
                </nav>

            </div>

        </div>
    </header>

    <section>
        <div class="barra">
            <div class="form">

                <form method="GET">
                    <select name="ordem" onchange="this.form.submit()">
                        <option selected="selected">Ordem</option>
                        <option value="name"> Pelo nome </option>
                        <option value="birth_date">Por DatNasc </option>
                    </select><br /><br />
                </form>

                <form method="POST" action="pesquisar.php">

                    <input type="text" name="busca" placeholder="Buscar">
                    <input type="submit" value="Buscar">
                </form>
            </div>

        </div>
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

                if (isset($_GET['ordem']) && empty($_GET['ordem']) == false) {
                    $ordem = addslashes($_GET['ordem']);

                    $sql = "SELECT * FROM users ORDER BY " . $ordem;
                } else {
                    $ordem = "";
                    $sql = "SELECT * FROM users";
                }

                $sql = $pdo->query($sql);
                if ($sql->rowCount() > 0) {
                    //echo "Esta tudo bem!";
                    foreach ($sql->fetchAll() as $usuario) {
                        echo '<tr>';
                        echo '<td>' . $usuario['name'] . '</td>';
                        echo '<td>' . $usuario['birth_date'] . '</td>';
                        echo '<td>' . $usuario['sex'] . '</td>';
                        echo '<td>' . $usuario['logradouro'] . '</td>';
                        echo '<td>' . $usuario['neighborhood'] . '</td>';
                        echo '<td>' . $usuario['city'] . '</td>';
                        echo '<td>' . $usuario['uf'] . '</td>';
                        echo '<td>' . $usuario['nationatity'] . '</td>';
                        echo '<td><a href ="detalhes.php?id=' . $usuario['id'] . '"><img src="imgs/detalhes.png" width="30" height="30" ></a> - <a href ="excluir.php?id=' . $usuario['id'] . '"><img src="imgs/download.jpg" width="30" height="30" ></a> - <a href ="editar.php?id=' . $usuario['id'] . '"><img src="imgs/editar.jpg" width="30" height="30" ></a></td>';

                        echo '</tr>';
                    }
                }
                ?>
            </table>
         
        </div>
       
         
    </section>


</body>

</html>