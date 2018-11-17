<?php

namespace App\Model;
use App\Model\Database;
use Rain\Tpl\Exception;

class Categoria{

    private $id;
    private $nome;
    private $dataRegistro;
    private $idfuncionario;

    public static function listAll($query = ""){
        $sql = new Database();
        return $sql->select("SELECT id, nome FROM categorias WHERE nome LIKE :QUERY ORDER BY id ASC", array(
            ":QUERY" => ("%" . $query . "%")
        ));
        
    }

    public function loadById(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM categorias WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));

        if(count($result) == 0){
            throw new \Exception("Categoria não cadastrada!", 1);
        }
        

        $this->setValues($result[0]);
    }
    public static function listOne($id){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM categorias WHERE id = :ID", array(
            ":ID" => $id
        ));

        if(count($result) > 0){
            return $result[0];
        }else{
            throw new \Exception("Categoria não cadastrada!", 1);
        }
    }

    public function create(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM categorias WHERE nome = :NOME", array(
            ":NOME" => $this->getNome()
        ));
        
        if(count($result) > 0){
            throw new \Exception("Categoria já cadastrada!", 1);
        }

        return $sql->query("INSERT INTO categorias(nome, idfuncionario) VALUES (:NOME , :IDFUNCIONARIO)", array(
            ":NOME" => $this->getNome(),
            ":IDFUNCIONARIO" => User::getIdBySession()
        ));

    }

    public function update(){
        $sql = new Database();

        $result = $sql->select("SELECT * FROM categorias WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));
        
        if(count($result) < 1){
            throw new \Exception("Categoria não cadastrado!");
        }

        $sql->query("UPDATE categorias set nome=:NOME WHERE id = :ID", array(
            ":ID" => $this->getId(),
            ":NOME" => $this->getNome()
        ));
        
    }

    public function delete(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM categorias WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));

        if(count($result) != 1){
            throw new \Exception("Categoria não cadastrado!");
        }
        $sql->query("DELETE FROM categorias where id = :ID", array(
            ":ID" => $this->getId()
        ));
    }

    public function setValues($values){
        $this->setId($values["id"]);
        $this->setNome($values["nome"]);
        $this->setDataRegistro($values["dataregistro"]);
        $this->setIdFuncionario($values["idfuncionario"]);
    }

    public function getValues(){
        return array(
            "id" => $this->getId(),
            "nome" => $this->getNome(),
            "dataregistro" => $this->getDataRegistro(),
            "idfuncionario" => $this->getIdFuncionario()
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

    public function getDataRegistro()
    {
        return $this->dataRegistro;
    }

    
    public function setDataRegistro($dataRegistro)
    {
        $this->dataRegistro = $dataRegistro;

        
    }
    public function getIdFuncionario()
    {
        return $this->idfuncionario;
    }

    
    public function setIdFuncionario($id)
    {
        $this->idfuncionario = $id;

    }
}