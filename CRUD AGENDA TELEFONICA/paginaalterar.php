<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Alterar - Agenda Telefonica</title>

    <!-- recuperado os dados passados na requisição -->
    <?php
    $id = filter_input(INPUT_GET,"id");
    $nome = filter_input(INPUT_GET,"nome");
    $telefone = filter_input(INPUT_GET,"telefone");
    ?>

</head>
<body>
    <div class="conteudo">
        <div class="top"><h1>Alterar o Conteudo</h1></div>
        <form action="alterar.php">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            Nome:<input type="text" name="nome" value="<?php echo $nome ?>" /><br> 
            Telefone: <input type="text" name="telefone" value="<?php echo $telefone ?>" /><br>
            <input type="submit" value="Alterar"/>
        </form>
    </div>
</body>
</html>