<?php

namespace App\Model;

class User{

    const SESSION = "User"; // index do $_SESSION onde vai ficar as informaçoes do login
    private $id;
    private $email;
    private $senha;
    private $nome;
    private $dataRegistro;

    

    public static function verifyLogin(){
        
        if(
            empty($_SESSION[User::SESSION]) ||
            !(int)$_SESSION[User::SESSION]["id"] > 0
        ){
            header("Location: /login");
            exit;
        }        
    }
    
    public static function login($email, $senha){
        $sql = new \App\Model\Database();
        $result = $sql->select("SELECT * FROM funcionarios WHERE email = :EMAIL", array(
            ":EMAIL" => $email
        ));



        if(count($result) == 0){
            throw new \Exception("Usuário inexistente ou senha inválida", 1);
        }
        $dados = $result[0];
        
        if(password_verify($senha , $dados["senha"]) == true){
            $user = new User();
            $user->setId($dados["id"]);
            $user->setEmail($dados["email"]);
            $user->setSenha($dados["senha"]);
            $user->setNome($dados["nome"]);
            $user->setDataRegistro(new \DateTime($dados["dataregistro"]));

            $_SESSION[User::SESSION] = $dados;
            
        }else{
            throw new \Exception("Usuário inexistente ou senha inválida", 1);
        }
    }

    public static function logout(){
        $_SESSION[User::SESSION] = null;
    }

    

    public function getId(){

        return $this->id;
    }


    public function setId($id){

        $this->id = $id;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(){

        return $this->email;
    }

    /**
     * Set the value of email
     *
     * 
     */ 
    public function setEmail($email){

        $this->email = $email;

    }

    /**
     * Get the value of senha
     */ 
    public function getSenha(){

        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * 
     */ 
    public function setSenha($senha){

        $this->senha = $senha;

    }

    /**
     * Get the value of dataRegistro
     */ 
    public function getDataRegistro(){

        return $this->dataRegistro;
    }

    /**
     * Set the value of dataRegistro
     *
     * 
     */ 
    public function setDataRegistro($dataRegistro){

        $this->dataRegistro = $dataRegistro;

    }

    /**
     * Get the value of nome
     */ 
    public function getNome(){

        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * 
     */ 
    public function setNome($nome){

        $this->nome = $nome;


    }
}