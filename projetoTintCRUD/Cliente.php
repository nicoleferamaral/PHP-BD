<?php

namespace PHP\Modelo;
require_once('Pessoa.php');
use PHP\Modelo\Pessoa;

class Cliente extends Pessoa{

    protected float $totalDeCompras;

    public function __construct(string $cpf, string $nome, string $telefone,string $endereco, float $totalDeCompras){

        parent::__construct($cpf,$nome,$telefone,$endereco);
        $this->totalDeCompras = $totalDeCompras;
    }

    public function __get(string $variavel):mixed{
        return $this->variavel;
    } // fim do get

    public function __set(string $variavel, string $novoDado):void{
        $this->variavel = $novoDado;
    } // fim do set

    public function imprimir():string{
        return parent::imprimir()."<br>Preço Total: ".$this->totalDeCompras;
    }

}



?>