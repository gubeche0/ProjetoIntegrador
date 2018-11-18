<?php

namespace App\Model;
use App\Model\Database;
use Rain\Tpl\Exception;


class Exemplar{

    private $id;
    private $livro;
    private $dataRegistro;
    private $idfuncionario;
    private $status;
    private $ativo;

    public static function listAll($query = ""){
        $sql = new Database();
        return $sql->select("SELECT exemplares.id, exemplares.status, livros.nome, livros.volume, livros.categoria, emprestimo
            FROM exemplares 
            INNER JOIN livros ON exemplares.livro = livros.isbn
            LEFT JOIN (SELECT COUNT(*) as emprestimo, id_exemplar FROM emprestimos WHERE ativo = 1 GROUP BY id_exemplar) emprestimos ON exemplares.id = emprestimos.id_exemplar
            WHERE livros.ativo = 1 AND exemplares.ativo = 1 
            AND exemplares.id LIKE :QUERY ORDER BY id ASC;", array(
                ":QUERY" => ("%" . $query . "%")
            ));
        
    }

    public function loadById(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM exemplares WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));

        if(count($result) == 0){
            throw new \Exception("Exemplar não cadastrada!", 1);
        }
        

        $this->setValues($result[0]);
    }

    public static function exists($id){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM exemplares INNER JOIN livros on exemplares.livro = livros.isbn WHERE exemplares.ativo = 1 AND livros.ativo = 1 AND  id = :ID", array(
            ":ID" => $id
        ));
        if(count($result) > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function emprestado($id){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM exemplares INNER JOIN emprestimos ON exemplares.id = emprestimos.id_exemplar WHERE emprestimos.ativo = 1 AND exemplares.ativo = 1 AND exemplares.id = :ID", array(
            ":ID" => $id
        ));
        if(count($result) > 0){
            return $result[0]["id"];
        }else{
            return false;
        }
    }

    public static function listOne($id){
        $sql = new Database();
        $result = $sql->select("SELECT exemplares.*, livros.nome, livros.volume, livros.autor, livros.urlfoto FROM exemplares INNER JOIN livros ON exemplares.livro = livros.isbn WHERE id = :ID", array(
            ":ID" => $id
        ));

        if(count($result) > 0){
            return $result[0];
        }else{
            throw new \Exception("Exemplar não cadastrada!", 1);
        }
    }

    public function create($q = 1){
        $sql = new Database();

        $result = $sql->query("INSERT INTO exemplares(livro, idfuncionario) VALUES (:LIVRO , :IDFUNCIONARIO)", array(
            ":LIVRO" => $this->getLivro(),
            ":IDFUNCIONARIO" => User::getIdBySession()
        ));
        
        if($result){
            return $sql->LAST_INSERT_ID();
        }else{
            throw new Exception("Erro ao salvar no banco de dados!", 1);
        }
    }

    public function update(){
        $sql = new Database();

        $result = $sql->select("SELECT * FROM exemplares WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));
        
        if(count($result) < 1){
            throw new \Exception("Exemplar não cadastrado!");
        }

        $sql->query("UPDATE exemplares set livro=:LIVRO WHERE id = :ID", array(
            ":ID" => $this->getId(),
            ":LIVRO" => $this->getLivro()
        ));
        
    }

    public function delete(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM exemplares WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));

        if(count($result) != 1){
            throw new \Exception("Exemplar não cadastrado!");
        }
        $sql->query("UPDATE exemplares set ativo=0 WHERE id = :ID", array(
            ":ID" => $this->getId()
        ));
    }

    public function setValues($values){
        $this->setId($values["id"]);
        $this->setLivro($values["livro"]);
        $this->setDataRegistro($values["dataregistro"]);
        $this->setIdFuncionario($values["idfuncionario"]);
        $this->setStatus($values["status"]);
        $this->setAtivo($values["ativo"]);
    }

    public function getValues(){
        return array(
            "id" => $this->getId(),
            "livro" => $this->getLivro(),
            "status" => $this->getStatus(),
            "ativo" => $this->getAtivo(),
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


    public function getLivro(){
        return $this->livro;
    }


    public function setLivro($livro){
        $this->livro = $livro;

    }


    public function getStatus(){
        return $this->status;
    }


    public function setStatus($status){
        $this->status = $status;

    }


    public function getAtivo(){
        return $this->ativo;
    }


    public function setAtivo($ativo){
        $this->ativo = $ativo;

    }

    public function getDataRegistro(){
        return $this->dataRegistro;
    }

    
    public function setDataRegistro($dataRegistro){
        $this->dataRegistro = $dataRegistro;

        
    }
    public function getIdFuncionario(){
        return $this->idfuncionario;
    }

    
    public function setIdFuncionario($id){
        $this->idfuncionario = $id;

    }
}