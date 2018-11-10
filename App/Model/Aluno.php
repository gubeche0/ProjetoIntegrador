<?php

namespace App\Model;

class Aluno{

    private $matricula;
    private $nome;
    private $turma;
    private $email;
    private $curso;

    public static function listAll($query = ""){
        $sql = new Database();
        return $sql->select("SELECT * FROM alunos WHERE nome LIKE :QUERY ORDER BY ASC", array(
            ":QUERY" => ("%" . $query . "%")
        ));

    }

    public function loadByMatricula($id){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM alunos WHERE ");
        
    }

    

    /**
     * Get the value of curso
     */ 
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set the value of curso
     *
     * @return  self
     */ 
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get the value of matricula
     */ 
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */ 
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of turma
     */ 
    public function getTurma()
    {
        return $this->turma;
    }

    /**
     * Set the value of turma
     *
     * @return  self
     */ 
    public function setTurma($turma)
    {
        $this->turma = $turma;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}