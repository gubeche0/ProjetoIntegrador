<?php

namespace App\Controllers;

use App\Page;
use App\Model\Livro;
use App\Model\Categoria;


class LivroController extends Controller{
    private $id;
    private $livro;
    
    public function __construct(){
        $this->livro = new Livro();
        
    }
    
    public function pageIndex(){
        $query = isset($_GET["query"]) ? $_GET["query"] : "";
        $this->getPage("livros");

        $this->page->setTpl("livros", array(
            "livros" => Livro::listAll($query)
        ));
    }

    public function pageCreate(){
        $this->getPage("livros", array(
            "footer" => false
        ));
        $this->page->setTpl("livros-form", array(
            "categorias" => Categoria::listAll()
        ));
    }

    public function pageEdit($id){
        $this->livro->setIsbn($id);
        $this->livro->loadById();

        $this->getPage("livros", array(
            "footer" => false
        ));
        
        $this->page->setTpl("livros-form", array(
            "livro" => $this->livro->listOne($id),
            "categorias" => Categoria::listAll()
        ));
        
    }

    private function loadModel(){
        $this->livro->setIsbn($_POST["isbn"]);
        $this->livro->setNome($_POST["nome"]);
        $this->livro->setVolume($_POST["volume"]);
        $this->livro->setAutor($_POST["autor"]);
        $this->livro->setCategoria($_POST["categoria"]);
        if(isset($_FILES["foto"]) && $_FILES["foto"]["error"] == \UPLOAD_ERR_OK){
            $this->livro->saveFoto();
        }

    }

    public function create(){
        try{
            $this->loadModel();
            $this->livro->create();
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /livros/create");
            exit;
        }finally{
            Page::setSuccess("Livro cadastrado com sucesso!");
            header("Location: /livros/create");
            exit;
        }
    }

    public function update($id){
        try{
            $this->loadModel();
            $this->livro->setIsbn($id);
            $this->livro->update();
            
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /livros");
            exit;
        }finally{
            Page::setSuccess("Livro alterado com sucesso!");
            header("Location: /livros");
            exit;
        }
    }

    public function delete($id){
        $this->livro->setIsbn($id);
        $this->livro->delete();
        header("Location: /livros");
        exit;
    }

    


    

}