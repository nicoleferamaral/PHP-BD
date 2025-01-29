<?php
    namespace PHP\Modelo\Telas;
    require_once('..\DAO\Conexao.php');
    require_once('..\DAO\Excluir.php');
    use PHP\Modelo\DAO\Conexao;
    use PHP\Modelo\DAO\Excluir;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Padrão de acentuação -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form method="POST" class="form">
    <div class="title">Excluir Cliente<br><span>Informe um CPF para Excluir</span></div>
    <input class="input" name="cpf" placeholder="CPF" type="text" id="tCpf"> <br><br>

    
    </div>
    <button type="submit" class="button-confirm">Excluir →
        <?php
            $conexao = new Conexao(); //Conectar no Banco
            if(isset($_POST['cpf'])){
                $excluir = new Excluir();
                $cpf = $_POST['cpf'];
   
            }
        ?>
    </button>
    </form>
    <?php
        if(isset($_POST['cpf'])){
            echo $excluir->excluirCliente($conexao,$cpf);
        }else{
            echo "<br>Informe um CPF válido";
        }

    ?>

</body>
</html>