<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <?php
   $parametro =filter_input(INPUT_GET,"parametro"); //variavel para fazer pesquisa no bd 
    $mysqllink = mysql_conect("localhost","root","usbw");
    mysql_select_db("agenda_telefonica");

    if($parametro){
        $dados = mysql_query("select * from contato where nome like '$parametro' order by id"); //recupera do bd pela busca parametro e ordena por id
    } else {
        $dados = mysql_query("select * from contato");
    }

    $linha = mysql_fetch_assoc($dados);//recebe as linhas de dados
    $total = mysql_num_rows($dados);// total da pesquisad
    ?>
        <title>Agenda Telefonica da Loja</title>
</head>

<body>
    <div class="top">Contatos Telefonicos</div>

    <div class="conteudo">
        <p>
            <!-- filtro de busca para as busca -->
            <form action="<?php echo $_SERVER['PHP_SELF'];?>">
                <!-- php da requisição será esse mesmo -->
                <input type="text" name="parametro" />
                <input type="submit" value="buscar" />
            </form>
        </p>
        <div class="table">

            <!-- Adicionar novo contato -->
            <div class="NovoContato">
                <p><a href="paginanovocontato.html">Novo Contato </a></p>
            </div>

            <!-- construção da tabela -->
            <table>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Telefone</td>
                </tr>

                <!-- php verficando se há registros -->
                <?php
            if($total){do{
        ?>

                    <tr>
                        <td>
                            <?php echo $linha ['ID']?>
                        </td>
                        <td>
                            <?php echo $linha ['Nome']?>
                        </td>
                        <td>
                            <?php echo $linha ['Telefone']?>
                        </td>
                        <td><a href="<?php echo " paginaalterar.php?id=". $linha['id']." &nome=".$linha['nome'] ." &telefone=".$linha['telefone']?>">Alterar</a></td>
                        <td><a href="<?php echo " excluir.php?id=". $linha['id']." &nome=".$linha['nome'] ." &telefone=".$linha['telefone']?>">Excluir</a></td>
                    </tr>

                    <?php
            } while($linha =mysql_fetch_assoc($dados)); /* laço de repetição até que o valor seja nulo */
            
            mysql_free_result($dados);}

            mysql_close($mysqllink);/* fechando a conexao com mysql */
        ?>
            </table>
        </div>
    </div>
</body>

</html>