<?php
    namespace PHP\Modelo\Tela;
    require_once('..\Funcionario.php');
    require_once('..\DAO\Conexao.php');
    require_once('..\DAO\Inserir.php');
    use PHP\Modelo\Funcionario;
    use PHP\Modelo\DAO\Conexao;
    use PHP\Modelo\DAO\Inserir;

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CRUD Simples PHP</title>
    <style>
        .menu,
        thead {
            background-color: #bbb !important;
        }

        .row {
            padding: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
            <a class="navbar-brand" href="#">
                CRUD PHP POO
            </a>
        </div>
    </nav>
    <div class="container">
    <form method="POST" class="form">
  <div class="title">Bem-Vindo Funcionario<br><span>cadastre-se para continuar</span></div>
  <input class="input" name="cpf" placeholder="CPF" type="text" id="tCpf">

  <input class="input" name="nome" placeholder="Nome" type="text" id="tNome">

  <input class="input" name="telefone" placeholder="Telefone" type="text" id="tTelefone">

  <input class="input" name="endereco" placeholder="Endereço" type="text" id="tEndereco">

  <input class="input" name="salario" placeholder="Salário" type="text" id="tSalario">
  
  
  </div>
  <button type="submit" class="button-confirm">Cadastrar →
    <?php

        $conexao = new Conexao(); //Conectar no Banco

        if(isset($_POST['cpf']) && isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['endereco']) && isset($_POST['salario'])){
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $salario = $_POST['salario'];

        $inserir = new Inserir();
        echo $inserir->cadastrarFuncionario($conexao, $cpf,$nome,$telefone,$endereco,$salario);
        }
    ?>
  </button>
</form>
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Salário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuariodao->read() as $usuario) : ?>
                        <tr>
                            <td><?= $usuario->getId() ?></td>
                            <td><?= $usuario->getNome() ?></td>
                            <td><?= $usuario->getSobrenome() ?></td>
                            <td><?= $usuario->getIdade() ?></td>
                            <td><?= $usuario->getSexo()?></td>
                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $usuario->getId() ?>">
                                    Editar
                                </button>
                                <a href="app/controller/UsuarioController.php?del=<?= $usuario->getId() ?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editar><?= $usuario->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="app/controller/UsuarioController.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" value="<?= $usuario->getNome() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-7">
                                                    <label>Sobrenome</label>
                                                    <input type="text" name="sobrenome" value="<?= $usuario->getSobrenome() ?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Idade</label>
                                                    <input type="number" name="idade" value="<?= $usuario->getIdade() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Sexo</label>
                                                    <select name="sexo" class="form-control">
                                                        <?php if ($usuario->getSexo() == 'F') : ?>
                                                            <option value="F">Feminino</option>
                                                            <option value="M">Masculino</option>
                                                        <?php else : ?>
                                                            <option value="M">Masculino</option>
                                                            <option value="F">Feminino</option>
                                                        <?php endif ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $usuario->getId() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Cadastrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>