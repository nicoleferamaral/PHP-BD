<?php
    namespace PHP\Modelo\Telas;
    require_once('..\DAO\Consultar.php');
    require_once('..\DAO\Conexao.php');
    use PHP\Modelo\DAO\Consultar;
    use PHP\Modelo\DAO\Conexao;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Funcionário</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
<form method="POST" class="form">
  <div class="title">Consultar Funcionário<br><span>Informe um CPF</span></div>
  <input class="input" name="tcpf" placeholder="CPF" type="text" >
  
  
  </div>
  <button type="submit" class="button-confirm">Consultar →
      <?php
        $conexao = new Conexao();
          if(isset($_POST['tcpf'])){
            $cpf = $_POST['tcpf'];
            $consultar = new Consultar();
          }else{
            echo "Preencha o campo CPF";
          }
      ?>
  </button>
</form>
<?php
  if(isset($_POST['tcpf'])){
  echo $consultar->consultarFuncionarioIndividual($conexao,$cpf);
  }else{
    echo "Preencha o campo CPF";
  }
?>
</body>
</html>