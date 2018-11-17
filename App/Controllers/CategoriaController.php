<?php

namespace App\Controllers;

use App\Page;
use App\Model\Categoria;


class CategoriaController extends Controller{
    private $id;
    private $categoria;
    
    public function __construct(){
        $this->categoria = new Categoria();
        
    }
    
    public function pageIndex(){
        $query = isset($_GET["query"]) ? $_GET["query"] : "";
        $this->getPage("outros");

        $this->page->setTpl("categorias", array(
            "categoria" => Categoria::listAll($query)
        ));
    }

    public function pageCreate(){
        $this->getPage("outros", array(
            "footer" => false
        ));
        $this->page->setTpl("categorias-form");
    }

    public function pageEdit($id){
        $this->categoria->setId($id);
        $this->categoria->loadById();

        $this->getPage("outros", array(
            "footer" => false
        ));
        
        $this->page->setTpl("categorias-form", array(
            "categoria" => $this->categoria->listOne($id)
        ));
        
    }

    private function loadModel(){
        $this->categoria->setNome($_POST["nome"]);

    }

    public function create(){
        try{
            $this->loadModel();
            $this->categoria->create();
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /categorias/create");
            exit;
        }finally{
            Page::setSuccess("Categoria cadastrado com sucesso!");
            header("Location: /categorias/create");
            exit;
        }
    }

    public function update($id){
        try{
            $this->loadModel();
            $this->categoria->setId($id);
            $this->categoria->update();
            
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /categorias");
            exit;
        }finally{
            Page::setSuccess("Categoria alterado com sucesso!");
            header("Location: /categorias");
            exit;
        }
    }

    public function delete($id){
        $this->categoria->setId($id);
        $this->categoria->delete();
        header("Location: /categorias");
        exit;
    }

    


    

}