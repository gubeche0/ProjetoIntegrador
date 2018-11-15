<?php

namespace App\Model;
use App\Model\Database;


class Aluno{

    private $matricula;
    private $nome;
    private $email;
    private $curso;

    public static function listAll($query = ""){
        $sql = new Database();
        return $sql->select("SELECT alunos.nome, cursos.abreviacao as curso, alunos.matricula, alunos.email FROM alunos INNER JOIN cursos ON cursos.id = alunos.idcurso WHERE alunos.nome LIKE :QUERY ORDER BY alunos.matricula ASC", array(
            ":QUERY" => ("%" . $query . "%")
        ));
    }

    public static function listOne($id){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM alunos WHERE matricula = :MATRICULA", array(
            ":MATRICULA" => $id
        ));

        if(count($result) > 0){
            return $result[0];
        }else{
            return false;
        }
    }

    public function loadById(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM alunos WHERE matricula = :MATRICULA", array(
            ":MATRICULA" => $this->getMatricula()
        ));

        if(count($result) == 0){
            return false;
        }

        $this->setValues($result[0]);
        
        
        
    }

    public function create(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM alunos WHERE matricula = :MATRICULA", array(
            ":MATRICULA" => $this->getMatricula()
        ));
        
        if(count($result) > 0){
            throw new \Exception("Aluno(a) já cadastrado(a)!", 1);
        }

        return $sql->query("INSERT INTO alunos(matricula, nome, email, idcurso, idfuncionario) VALUES (:MATRICULA , :NOME , :EMAIL , :IDCURSO , :IDFUNCIONARIO)", array(
            ":MATRICULA" => $this->getMatricula(),
            ":NOME" => $this->getNome(),
            ":EMAIL" => $this->getEmail(),
            ":IDCURSO" => $this->getCurso(),
            ":IDFUNCIONARIO" => User::getIdBySession()
        ));

        
        
    }

    public function update(){
        $sql = new Database();

        $result = $sql->select("SELECT * FROM alunos WHERE matricula = :MATRICULA", array(
            ":MATRICULA" => $this->getMatricula()
        ));
        
        if(count($result) < 1){
            throw new \Exception("Aluno não cadastrado!");
        }

        $sql->query("UPDATE alunos set nome=:NOME, email=:EMAIL, idcurso=:IDCURSO  WHERE matricula = :MATRICULA", array(
            ":MATRICULA" => $this->getMatricula(),
            ":NOME" => $this->getNome(),
            ":EMAIL" => $this->getEmail(),
            ":IDCURSO" => $this->getCurso()
        ));
        
    }

    public function delete(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM alunos WHERE matricula = :MATRICULA", array(
            ":MATRICULA" => $this->getMatricula()
        ));

        if(count($result) != 1){
            throw new \Exception("Aluno não cadastrado!");
        }
        $sql->query("DELETE FROM alunos where matricula = :MATRICULA", array(
            ":MATRICULA" => $this->getMatricula()
        ));
    }

    public function setValues($values){
        $this->setMatricula($values["matricula"]);
        $this->setNome($values["nome"]);
        $this->setEmail($values["email"]);
        $this->setCurso($values["idcurso"]);
    }

    public function getValues(){
        return array(
            "matricula" => $this->getMatricula(),
            "nome" => $this->getNome(),
            "email" => $this->getEmail(),
            "idcurso" => $this->getCurso(),
        );
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