<?php
    /* recuperado os dados inseridos na paginanovocontato */
    $nome = filter_input(INPUT_GET,"nome");
    $telefone = filter_input(INPUT_GET,"telefone");

    $link = mysqli_connect("localhost","root","usbw","agenda_telefonica");

    /* testando se conexao foi feita */

    if($link){
        $query = mysql_query($link,"insert into contato values('','$nome','$telefone')");
        if($query){
            header("Location: index.php");
        }else{
            die("Erro:" .mysqli_error($link));
        }
    }else{
        die("Erro:" .mysqli_error($link));
    }

?>