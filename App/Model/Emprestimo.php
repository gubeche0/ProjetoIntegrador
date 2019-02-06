<?php

namespace App\Model;
use App\Model\Database;


class Emprestimo{

    private $id;
    private $exemplar;
    private $aluno;
    private $periodoEntrega;
    private $dataRegistro;
    private $idfuncionario;
    private $ativo;

    public static function listAll($query = ""){
        $sql = new Database();
        return $sql->select("SELECT emprestimos.id, emprestimos.dataregistro, emprestimos.periodo_entrega, exemplares.id as codigo, livros.nome as livro, alunos.nome as aluno FROM emprestimos INNER JOIN exemplares INNER JOIN livros INNER JOIN alunos ON emprestimos.id_exemplar = exemplares.id AND exemplares.livro = livros.isbn AND emprestimos.matricula_aluno = alunos.matricula WHERE livros.ativo = 1 AND emprestimos.ativo = 1 AND alunos.nome LIKE :QUERY ORDER BY emprestimos.dataregistro ASC", array(
            ":QUERY" => ("%" . $query . "%")
        ));

        
    }

    public static function listOne($id){
        $sql = new Database();
        $result = $sql->select("SELECT emprestimos.*, alunos.nome as aluno, alunos.matricula FROM emprestimos INNER JOIN alunos ON emprestimos.matricula_aluno = alunos.matricula WHERE id = :ID", array(
            ":ID" => $id
        ));

        if(count($result) > 0){
            return $result[0];
        }else{
            return false;
        }
    }

    public function loadById(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM emprestimos WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));

        if(count($result) == 0){
            return false;
        }

        $this->setValues($result[0]);
    }

    static public function listAllOf(Aluno $aluno){
        $sql = new Database();
        return $sql->select("SELECT emprestimos.id, emprestimos.dataregistro, emprestimos.dataentrega, emprestimos.periodo_entrega, exemplares.id as codigo, livros.nome as livro, alunos.nome as aluno, emprestimos.ativo
            FROM emprestimos INNER JOIN exemplares INNER JOIN livros INNER JOIN alunos 
            ON emprestimos.id_exemplar = exemplares.id AND exemplares.livro = livros.isbn AND emprestimos.matricula_aluno = alunos.matricula 
            WHERE alunos.matricula = :MATRICULA ORDER BY emprestimos.ativo DESC ,emprestimos.dataregistro DESC", array(
            ":MATRICULA" => $aluno->getMatricula()
        ));
    }

    public function create(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM emprestimos WHERE id_exemplar = :EXEMPLAR AND ativo = 1", array(
            ":EXEMPLAR" => $this->getExemplar()
        ));
        
        if(count($result) > 0){
            throw new \Exception("Livro já emprestado!", 1);
        }

        return $sql->query("INSERT INTO emprestimos(id_exemplar, matricula_aluno, periodo_entrega, idfuncionario) VALUES (:EXEMPLAR , :ALUNO , :PERIODO , :IDFUNCIONARIO)", array(
            ":EXEMPLAR" => $this->getExemplar(),
            ":ALUNO" => $this->getAluno(),
            ":PERIODO" => $this->getPeriodoEntrega(),
            ":IDFUNCIONARIO" => User::getIdBySession()
        ));

        
        
    }


    public function delete($statusLivro = "Utilizavel"){ //colocar status do livro
        $sql = new Database();
        $result = $sql->select("SELECT * FROM emprestimos WHERE id_exemplar = :EXEMPLAR AND ativo = 1", array(
            ":EXEMPLAR" => $this->getExemplar()
        ));

        if(count($result) != 1){
            throw new \Exception("Livro não emprestado!");
        }
        $sql->query("UPDATE emprestimos set ativo=0 WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));

        $sql->query("UPDATE exemplares set `status`=:STATUS WHERE id = :ID", array(
            ":ID" => $this->getExemplar(),
            ":STATUS" => $statusLivro
        ));



    }

    public function devolver($id, $statusLivro = "Utilizavel", $idExemplar = NULL){
        $sql = new Database();
        $sql->query("UPDATE emprestimos set ativo=0, dataentrega=NOW() WHERE id = :ID", array(
            ":ID" => $id
        ));
        if($statusLivro == "Não Utilizavel"){
            
            $a = $sql->query("UPDATE exemplares set ativo=0, `status`=:STATUS, dataentrega=NOW() WHERE id = :ID", array(
                ":ID" => $idExemplar,
                ":STATUS" => $statusLivro
            ));

        }
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
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        
    }

    /**
     * Get the value of exemplar
     */ 
    public function getExemplar()
    {
        return $this->exemplar;
    }

    /**
     * Set the value of exemplar
     *
     * @return  self
     */ 
    public function setExemplar($exemplar)
    {
        $this->exemplar = $exemplar;

        
    }

    /**
     * Get the value of aluno
     */ 
    public function getAluno()
    {
        return $this->aluno;
    }

    /**
     * Set the value of aluno
     *
     * @return  self
     */ 
    public function setAluno($aluno)
    {
        $this->aluno = $aluno;

        
    }

    /**
     * Get the value of periodoEntrega
     */ 
    public function getPeriodoEntrega()
    {
        return $this->periodoEntrega;
    }

    /**
     * Set the value of periodoEntrega
     *
     * @return  self
     */ 
    public function setPeriodoEntrega($periodoEntrega)
    {
        $this->periodoEntrega = $periodoEntrega;

        
    }

    /**
     * Get the value of dataRegistro
     */ 
    public function getDataRegistro()
    {
        return $this->dataRegistro;
    }

    /**
     * Set the value of dataRegistro
     *
     * @return  self
     */ 
    public function setDataRegistro($dataRegistro)
    {
        $this->dataRegistro = $dataRegistro;

        
    }

    /**
     * Get the value of idfuncionario
     */ 
    public function getIdfuncionario()
    {
        return $this->idfuncionario;
    }

    /**
     * Set the value of idfuncionario
     *
     * @return  self
     */ 
    public function setIdfuncionario($idfuncionario)
    {
        $this->idfuncionario = $idfuncionario;

        
    }

    /**
     * Get the value of ativo
     */ 
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     *
     * @return  self
     */ 
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        
    }
}