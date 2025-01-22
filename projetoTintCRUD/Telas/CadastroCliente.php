<?php
    namespace PHP\Modelo\Tela;
    require_once('..\Cliente.php');
    use PHP\Modelo\Cliente;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Padrão de acentuação -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- From Uiverse.io by ayyjayy2 --> 
<form method="POST" class="form">
  <div class="title">Bem-Vindo Cliente<br><span>cadastre-se para continuar</span></div>
  <input class="input" name="cpf" placeholder="CPF" type="text" id="tCpf">

  <input class="input" name="nome" placeholder="Nome" type="text" id="tNome">

  <input class="input" name="telefone" placeholder="Telefone" type="text" id="tTelefone">

  <input class="input" name="endereco" placeholder="Endereço" type="text" id="tEndereco">

  <input class="input" name="total" placeholder="Preço Total" type="text" id="tTotal">
  
  
  </div>
  <button type="submit" class="button-confirm">Cadastrar →
    <?php
        if(isset($_POST['cpf']) && isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['endereco']) && isset($_POST['total'])){
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $totalDeCompras = $_POST['total'];

        $cliente1 = new Cliente($cpf,$nome,$telefone,$endereco,$totalDeCompras);
        }
    ?>
  </button>
</form>

<?php
    echo $cliente1->imprimir();

?>
    
</body>
</html>

