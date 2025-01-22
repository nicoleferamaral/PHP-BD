<?php

    namespace PHP\Modelo;

    class Pessoa{
    // atributos
        protected string $cpf;
        protected string $nome;
        protected string $telefone;
        protected string $endereco;

        // Protected = apenas a familia vê
        // Private = Apenas a classe vê;
        // Public = Todos veem.

        public function __construct(string $cpf,string $nome, string $telefone, string $endereco) {

            $this->cpf = $cpf;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->endereco = $endereco;

        } // Fim do construtor = ele inicia as variáveis.

        public function __get(string $variavel):mixed
        {
            return $this->variavel;
        } //fim do get

        public function __set(string $variavel, string $novoDado):void
        {
            $this->variavel = $novoDado;
        } // fim do set

        public function imprimir():string
        {
            return "<br>CPF: ".$this->cpf.
            "<br>Nome: ".$this->nome.
            "<br>Telefone: ".$this->telefone.
            "<br>Endereço: ".$this->endereco;
        }
    }




?>