<?php
    /* recuperar os dados passados */

    $id = filter_input(INPUT_GET,"id");
    $nome = filter_input(INPUT_GET,"nome");
    $telefone = filter_input(INPUT_GET,"telefone");
    /* conexao com bd */
    $mysqllink = mysql_conect("localhost","root","usbw","agenda_telefonica");

    /* testando se conexao foi feita */

    if($link){
        $query = mysql_query($link,"update contato set nome = '$nome','$telefone' where id='$id';");
        
        if($query){
            header("Location: index.php");
        }else{
            die("Erro:" .mysqli_error($link));
    }
    }else{
        die("Erro:" .mysqli_error($link));
    }

?>
