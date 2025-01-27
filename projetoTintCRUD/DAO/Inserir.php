<?php
    namespace PHP\Modelo\DAO;
    require_once('Conexao.php');
    use PHP\Modelo\DAO\Conexao;


    class Inserir{

        function cadastrarCliente(Conexao $conexao, string $cpf, string $nome, string $endereco, string $telefone, float $valorTotal){

            try{
                $conn = $conexao->conectar();
                $sql = "Insert into Cliente(codigo,nome, telefone, endereco, total)
                values('$cpf','$nome','$telefone','$endereco', '$valorTotal')";

                $result = mysqli_query($conn, $sql);
                mysqli_close($conn);

                if($result){
                    return "<br> Inserido com sucesso!";
                }
                return "<br> Não inserido!";
            } catch(Except $erro){
                return "Algo deu errado! <br><br>".$erro;
            }

        }

        function cadastrarFuncionario(Conexao $conexao, string $cpf, string $nome, string $endereco, string $telefone, float $salario){

            try{
                $conn = $conexao->conectar();
                $sql = "Insert into Funcionario(codigo,nome, telefone, endereco, salario)
                values('$cpf','$nome','$telefone','$endereco','$salario')";

                $result = mysqli_query($conn, $sql);
                mysqli_close($conn);

                if($result){
                    return "<br> Inserido com sucesso!";
                }
                return "<br> Não inserido!";
            } catch(Except $erro){
                return "Algo deu errado! <br><br>".$erro;
            }

        }
    }




?>