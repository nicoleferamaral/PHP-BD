<?php
    namespace PHP\Modelo\DAO;
    require_once('Conexao.php');
    use PHP\Modelo\DAO\Conexao;

    class Consultar{
        function consultarClienteIndividual(
            Conexao $conexao, int $cpf
        ){
           try{

            $conn = $conexao->conectar();
            $sql = "select * from cliente where codigo = '$cpf'";
            $result = mysqli_query($conn, $sql);

            while($dados = mysqli_fetch_Array($result)){
                if($dados['codigo'] == $cpf){
                    echo "<br><br><br>CPF: ".$dados['codigo']."<br>Nome: ".$dados['nome'].
                    "<br>Telefone: ".$dados['telefone'].
                    "<br>Endereço: ".$dados['endereco'].
                    "<br>Total: ".$dados['total'];
                    return;
                }
                return "Código digitado inválido!";
            }

           }catch(Except $erro){
            echo $erro;

           }
        }

        function consultarFuncionarioIndividual(
            Conexao $conexao, int $cpf
        ){
           try{

            $conn = $conexao->conectar();
            $sql = "select * from funcionario where codigo = '$cpf'";
            $result = mysqli_query($conn, $sql);

            while($dados = mysqli_fetch_Array($result)){
                if($dados['codigo'] == $cpf){
                    echo "<br><br><br>CPF: ".$dados['codigo']."<br>Nome: ".$dados['nome'].
                    "<br>Telefone: ".$dados['telefone'].
                    "<br>Endereço: ".$dados['endereco'].
                    "<br>Salário: ".$dados['salario'];
                    return;
                }
                return "Código digitado inválido!";
            }

           }catch(Except $erro){
            echo "Digite um cpf válido".$erro;

           }
        }
    }


?>