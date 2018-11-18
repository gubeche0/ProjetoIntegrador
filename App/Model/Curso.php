<?php

namespace App\Model;
use App\Model\Database;
use Rain\Tpl\Exception;

class Curso{

    private $id;
    private $nome;
    private $abreviacao;


    public static function listAll($query = ""){
        $sql = new Database();
        return $sql->select("SELECT id, nome, abreviacao FROM cursos WHERE ativo = 1 AND nome LIKE :QUERY ORDER BY id ASC", array(
            ":QUERY" => ("%" . $query . "%")
        ));
        
    }

    public function loadById(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM cursos WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));

        if(count($result) == 0){
            throw new \Exception("Curso não cadastrada!", 1);
        }
        
        $this->setValues($result[0]);
    }

    public static function listOne($id){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM cursos WHERE id = :ID", array(
            ":ID" => $id
        ));

        if(count($result) > 0){
            return $result[0];
        }else{
            throw new \Exception("Curso não cadastrada!", 1);
        }
    }

    public function create(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM cursos WHERE nome = :NOME", array(
            ":NOME" => $this->getNome()
        ));
        
        if(count($result) > 0){
            throw new \Exception("Curso já cadastrada!", 1);
        }

        return $sql->query("INSERT INTO cursos(nome, abreviacao) VALUES (:NOME , :ABREVIACAO)", array(
            ":NOME" => $this->getNome(),
            ":ABREVIACAO" => $this->getAbreviacao()
        ));

    }

    public function update(){
        $sql = new Database();

        $result = $sql->select("SELECT * FROM cursos WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));
        
        if(count($result) < 1){
            throw new \Exception("Curso não cadastrado!");
        }

        $sql->query("UPDATE cursos set nome=:NOME, abreviacao=:ABREVIACAO WHERE id = :ID", array(
            ":ID" => $this->getId(),
            ":NOME" => $this->getNome(),
            ":ABREVIACAO" => $this->getAbreviacao()
        ));
        
    }

    public function delete(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM cursos WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));

        if(count($result) != 1){
            throw new \Exception("Curso não cadastrado!");
        }
        $a = $sql->query("UPDATE cursos set ativo = 0  WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));
    }

    public function setValues($values){
        $this->setId($values["id"]);
        $this->setNome($values["nome"]);
        $this->setAbreviacao($values["abreviacao"]);
    }

    public function getValues(){
        return array(
            "id" => $this->getId(),
            "nome" => $this->getNome(),
            "abreviacao" => $this->getAbreviacao()
        );
    }
    

 
    public function getId(){
        return $this->id;
    }


    public function setId($id){
        $this->id = $id;
    }


    public function getNome(){
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;

    }

    public function getAbreviacao()
    {
        return $this->abreviacao;
    }

    
    public function setAbreviacao($abreviacao)
    {
        $this->abreviacao = $abreviacao;

        
    }

}