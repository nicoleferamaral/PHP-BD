<?php

    namespace PHP\Modelo;
    require_once('Cliente.php');
    require_once('Funcionario.php');
    use PHP\Modelo\Cliente;
    use PHP\Modelo\Funcionario;

    $cliente1 = new Cliente("1234567890","Nicole","1199999999","Rua, 15", 150.50);

    echo $cliente1->imprimir();
 
    $fun1 = new Funcionario("1234567890","Grazy","1199999999","Rua, 15", 2000.00);

    echo $fun1->imprimir();




?>