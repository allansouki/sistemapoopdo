<?php

    class Funcionarios extends Usuarios{
        private $salario;
        
        function __construct($nome, $idade ,$cpf , $login, $senha, $salario){
            parent::__construct($nome, $idade ,$cpf , $login, $senha);
            $this->salario = $salario;
        }

        public function getSalario(){
            return $this->salario;
        }


        public function setSalario($salario){
            $this->salario =  $salario;
        }

        public function cadastrarPessoa($con, $funcionario, $tipoPessoa){
            try{
                $query = $con->prepare("INSERT INTO usuarios (nome, idade, cpf, usuario, senha, salario, tipo_pessoa) VALUES(:nome,:idade,:cpf,:login,:senha,:salario,:tipoPessoa)");
                $query->execute([
                    "nome"=>$funcionario->getNome(),
                    "idade"=>$funcionario->getIdade(),
                    "cpf"=>$funcionario->getCpf(),
                    "login"=>$funcionario->getLogin(),
                    "senha"=>$funcionario->getSenha(),
                    "salario"=>$funcionario->getSalario(),
                    "tipoPessoa"=>$tipoPessoa
                ]);

                return $query;
            }catch(PDOException $e){
                return false;
            }
       }

    }

