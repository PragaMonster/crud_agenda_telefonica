<?php
    /* recuperar os dados passados */

    $id = filter_input(INPUT_GET,"id");

    /* conexao com bd */
    $mysqllink = mysql_conect("localhost","root","usbw","agenda_telefonica");

    /* testando se conexao foi feita */

    if($link){
        $query = mysql_query($link,"delete from contato where id='$id';");
        
        if($query){
            header("Location: index.php");
        }else{
            die("Erro:" .mysqli_error($link));
    }
    }else{
        die("Erro:" .mysqli_error($link));
    }
?>
