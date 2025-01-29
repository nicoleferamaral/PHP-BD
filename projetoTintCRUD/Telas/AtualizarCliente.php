<?php
    namespace PHP\Modelo\Telas;
    require_once('..\DAO\Conexao.php');
    require_once('..\DAO\Atualizar.php');
    use PHP\Modelo\DAO\Conexao;
    use PHP\Modelo\DAO\Atualizar;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Padrão de acentuação -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form method="POST" class="form">
    <div class="title">Atualizar Cliente<br><span>Informe um CPF</span></div>
    <input class="input" name="cpf" placeholder="CPF" type="text" id="tCpf"> <br><br>

    <spam> Escolha o campo que deseja atualizar</spam>
    <select name="tCampo" id="">
        <option value="nome">Nome</option>
        <option value="telefone">Telefone</option>
        <option value="endereco">Endereço</option>
        <option value="total">Total de compras</option>
    </select> <br><br>

    <input class="input" name="novoDado" placeholder="Novo Dado" type="text" id="tNovoDado"><br><br>
    
    
    </div>
    <button type="submit" class="button-confirm">Atualizar →
        <?php
            $conexao = new Conexao(); //Conectar no Banco
            if(isset($_POST['cpf'])){
                $atualizar = new Atualizar();

                $cpf = $_POST['cpf'];
                $campo = $_POST['tCampo'];
                $novoDado = $_POST['novoDado'];
            }
        ?>
    </button>
    </form>
    <?php
        if(isset($_POST['cpf'])){
            echo $atualizar->atualizarCliente($conexao,$campo,$novoDado,$cpf);
        }

    ?>

</body>
</html>