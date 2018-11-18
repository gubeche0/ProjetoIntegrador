<?php

namespace App\Model;
use App\Model\Database;
use Rain\Tpl\Exception;
use App\Config;

class Livro{

    private $isbn;
    private $nome;
    private $volume;
    private $autor;
    private $categoria;
    private $foto;
    private $dataRegistro;
    private $idFuncionario;

    public static function listAll($query = ""){
        $sql = new Database();
        return $sql->select("SELECT livros.*, categorias.nome as categoriaNome FROM livros INNER JOIN categorias ON livros.categoria = categorias.id WHERE livros.ativo = 1 AND livros.nome LIKE :QUERY ORDER BY isbn ASC; ", array(
            ":QUERY" => ("%" . $query . "%")
        ));
        
    }

    public function loadById(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM livros WHERE isbn = :ISBN", array(
            ":ISBN" => $this->getIsbn()
        ));

        if(count($result) == 0){
            throw new \Exception("Livro não cadastrado!", 1);
        }
        

        $this->setValues($result[0]);
    }
    public static function listOne($id){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM livros WHERE isbn = :ISBN", array(
            ":ISBN" => $id
        ));

        if(count($result) > 0){
            return $result[0];
        }else{
            throw new \Exception("Livro não cadastrado!", 1);
        }
    }

    public function saveFoto(){
        $foto = $_FILES["foto"];
        if($foto["error"]){
            throw new \Exception("Error: ".$file['error']);	
        }
        
        if (!is_dir( Config::DIR_FOTOS)) {

            mkdir(Config::DIR_FOTOS);
        }

        $extensao = explode(".", $foto["name"]);
        $newName = time() . "." .  $extensao[1];
        

        if (!move_uploaded_file($foto['tmp_name'], Config::DIR_FOTOS . DIRECTORY_SEPARATOR . $newName)) {
    
            throw new Exception("Não foi possível realizar o upload da foto.");
    
        }else{
            $this->setFoto($newName);
        }
        
    }

    public function create(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM livros WHERE isbn = :ISBN", array(
            ":ISBN" => $this->getIsbn()
        ));
        
        if(count($result) > 0){
            throw new \Exception("Livro já cadastrado!", 1);
        }

        $result = $sql->query("INSERT INTO livros(isbn, nome, volume, autor, categoria, urlfoto, idfuncionario) VALUES ( :ISBN, :NOME, :VOLUME, :AUTOR, :CATEGORIA, :FOTO, :IDFUNCIONARIO)", array(
            ":ISBN" => $this->getIsbn(),
            ":NOME" => $this->getNome(),
            ":VOLUME" => $this->getVolume(),
            ":AUTOR" => $this->getAutor(),
            ":CATEGORIA" => $this->getCategoria(),
            ":FOTO" => $this->getFoto(),
            ":IDFUNCIONARIO" => User::getIdBySession()
        ));

        if(!$result){
            throw new \Exception("Erro ao salvar no banco de dados!", 1);
        }

    }

    public function update(){
        $sql = new Database();

        $result = $sql->select("SELECT * FROM livros WHERE isbn = :ISBN", array(
            ":ISBN" => $this->getIsbn()
        ));
        
        if(count($result) < 1){
            throw new \Exception("Livro não cadastrado!");
        }

        if($this->getFoto()){
            $sql->query("UPDATE livros set nome=:NOME, volume=:VOLUME, autor=:AUTOR, categoria=:CATEGORIA, urlfoto=:FOTO WHERE isbn = :ISBN", array(
                ":ISBN" => $this->getIsbn(),
                ":NOME" => $this->getNome(),
                ":VOLUME" => $this->getVolume(),
                ":AUTOR" => $this->getAutor(),
                ":CATEGORIA" => $this->getCategoria(),
                ":FOTO" => $this->getFoto(),
            )); 
        }else{
            $sql->query("UPDATE livros set nome=:NOME, volume=:VOLUME, autor=:AUTOR, categoria=:CATEGORIA WHERE isbn = :ISBN", array(
                ":ISBN" => $this->getIsbn(),
                ":NOME" => $this->getNome(),
                ":VOLUME" => $this->getVolume(),
                ":AUTOR" => $this->getAutor(),
                ":CATEGORIA" => $this->getCategoria()
            ));
        }
        
    }

    public function delete(){
        $sql = new Database();
        $result = $sql->select("SELECT * FROM livros WHERE isbn = :ISBN", array(
            ":ISBN" => $this->getIsbn()
        ));

        if(count($result) != 1){
            throw new \Exception("Livro não cadastrado!");
        }
        
        $sql->query("UPDATE livros set ativo=0 WHERE isbn = :ISBN", array(
            ":ISBN" => $this->getIsbn()
        ));
    }

    public function setValues($values){
        $this->setIsbn($values["isbn"]);
        $this->setNome($values["nome"]);
        $this->setAutor($values["autor"]);
        $this->setVolume($values["volume"]);
        $this->setCategoria($values["categoria"]);
        $this->setFoto($values["urlfoto"]);
        $this->setDataRegistro($values["dataregistro"]);
        $this->setIdFuncionario($values["idfuncionario"]);
    }

    public function getValues(){
        return array(
            "isbn" => $this->getIsbn(),
            "nome" => $this->getNome(),
            "autor" => $this->getAutor(),
            "volume" => $this->getVolume(),
            "categoria" => $this->getCategoria(),
            "foto" => $this->getFoto(),
            "dataregistro" => $this->getDataRegistro(),
            "idfuncionario" => $this->getIdFuncionario()
        );
    }
    
    
    


    public function getIsbn(){
        return $this->isbn;
    }
    public function setIsbn($value){
        $this->isbn = $value;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($value){
        $this->nome = $value;
    }

    public function getVolume(){
        return $this->volume;
    }
    public function setVolume($value){
        $this->volume = $value;
    }

    public function getAutor(){
        return $this->autor;
    }
    public function setAutor($value){
        $this->autor = $value;
    }

    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($value){
        $this->categoria = $value;
    }

    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($value){
        $this->foto = $value;
    }

    public function getDataRegistro(){
        return $this->dataRegistro;
    }
    public function setDataRegistro($value){
        $this->dataRegistro = $value;
    }

    public function getfuncionario(){
        return $this->isbn;
    }

    public function setIdFuncionario($value){
        $this->idFuncionario = $value;
    }

    public function getIdFuncionario(){
        return $this->IdFuncionario;
    }
 
    
}