<?php
session_start();
require 'config.php';

if (isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = addslashes($_GET['id']);
} 

if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    
    $nome = addslashes($_POST['nome']);
    $dataNasc = addslashes($_POST['data']);
    $logradouro = addslashes($_POST['logradouro']);
    $bairro = addslashes($_POST['bairro']);
    $cidade = addslashes($_POST['cidade']);
    $uf = addslashes($_POST['uf']);
    $nacionalidade = addslashes($_POST['nacionalidade']);
    $corOlhos = addslashes($_POST['corOlhos']);
    $corCabelos = addslashes($_POST['corCabelos']);
    $peso = addslashes($_POST['peso']);
    $altura = addslashes($_POST['altura']);
    
    $sql1 = "UPDATE users SET name ='$nome' ,birth_date = '$dataNasc', logradouro ='$logradouro' ,neighborhood ='$bairro' ,city ='$cidade', uf = '$uf',nationatity = '$nacionalidade' WHERE id = '$id'";
    $sql1 = $pdo->query($sql1);

    $sql2 ="UPDATE featurephysical SET eyer_color = '$corOlhos', hair_color = '$corCabelos', weight = '$peso', height = '$altura' WHERE user_id = '$id'";
    $sql2 = $pdo->query($sql2);

    header("Location: listagem.php"); 
} 
    $sql =" SELECT users.id, users.name , users.birth_date,users.sex, users.logradouro, users.neighborhood, users.city, users.uf, users.nationatity, users.birth_date ,featurephysical.eyer_color ,featurephysical.hair_color, featurephysical.weight ,featurephysical.height from users join featurephysical 
    on featurephysical.user_id = users.id where users.id = '$id'";
    $sql = $pdo->query($sql);

 if ($sql->rowCount() > 0) {
        $dado = $sql->fetch();
    }else{
       header("Location: listagem.php"); 
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
                Editar Registro

            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li class="active"><a href="listagem.php">HOME</a></li>


                    </ul>
                </nav>
            </div>

        </div>
    </header>

    <section class="formul">
        <div class="formulario">
            <form method="POST">
                <h1>Insera as informações</h1>
                Nome:<br />
                <input type="text" name="nome" size="35" value = "<?php echo $dado['name']?>" /><br />
                DataNasc:<br />
                <input type="date" name="data" /><br />

                Logradouro:<br />
                <input type="text" name="logradouro" size="35" value ="<?php echo $dado['logradouro']?>" /><br/>

                Bairro:<br />
                <input type="text" name="bairro" size="35" value ="<?php echo $dado['neighborhood']?>"/><br/>

                Cidade:<br />
                <input type="text" name="cidade" size="35" value ="<?php echo $dado['city']?>"/><br/>

                UF:<br />
                <input type="text" name="uf" value ="<?php echo $dado['uf']?>"/><br/>

                Nacionalidade<br />
                <input type="text" name="nacionalidade" size="35" value ="<?php echo $dado['nationatity']?>" /><br />

                Cor dos olhos:<br />
                <input type="text" name="corOlhos" value ="<?php echo $dado['eyer_color']?>"/><br/>

                Cor dos cabelos:<br />
                <input type="text" name="corCabelos" value ="<?php echo $dado['hair_color']?>"/><br/>

                Peso:<br />
                <input type="text" name="peso" value ="<?php echo $dado['weight']?>"/><br/>

                Altura:<br />
                <input type="text" name="altura" value ="<?php echo $dado['height']?>"/><br/>

                <input type="submit" value="Atualizar" /><br/>




            </form>
        </div>
    </section>

</body>

</html>