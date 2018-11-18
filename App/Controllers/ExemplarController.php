<?php

namespace App\Controllers;

use App\Page;
use App\Model\Exemplar;
use App\Model\Livro;
use App\Model\Emprestimo;


class ExemplarController extends Controller{
    private $id;
    private $exemplar;
    
    public function __construct(){
        $this->exemplar = new Exemplar();
        
    }
    
    public function pageIndex(){
        $query = isset($_GET["query"]) ? $_GET["query"] : "";
        $this->getPage("exemplares");
        
        $this->page->setTpl("exemplares", array(
            "exemplares" => Exemplar::listAll($query)
        ));
    }

    public function pageCreate(){
        $this->getPage("exemplares", array(
            "footer" => false
        ));
        $this->page->setTpl("exemplares-form", array(
            "livros" => Livro::listAll()
        ));
    }

    public function pageEdit($id){
        $this->exemplar->setId($id);
        $this->exemplar->loadById();

        $this->getPage("exemplares", array(
            "footer" => false
        ));
        
        $this->page->setTpl("exemplares-form", array(
            "exemplar" => $this->exemplar->listOne($id),
            "livros" => Livro::listAll()
        ));
        
    }

    private function loadModel(){
        $this->exemplar->setLivro($_POST["livro"]);

    }

    public function create(){
        try{
            $this->loadModel();
            $quantidade = $_POST["quantidade"];
            $codigos = array();
            
            for ($i=0; $i < $quantidade; $i++) { 
                $codigos[] = $this->exemplar->create();
            }
            $this->pageCreate();
            echo "<script>gerarCodes(" . json_encode($codigos) . ");</script>";
            exit;

        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /exemplares/create");
            exit;
        }finally{
            Page::setSuccess("Exemplares cadastrado com sucesso!");
            header("Location: /exemplares/create");
            exit;
        }
    }

    public function update($id){
        try{
            $this->loadModel();
            $this->exemplar->setId($id);
            $this->exemplar->update();
            
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /exemplares");
            exit;
        }finally{
            Page::setSuccess("Exemplar alterado com sucesso!");
            header("Location: /exemplares");
            exit;
        }
    }

    public function delete($id){
        $this->exemplar->setId($id);
        $this->exemplar->delete();
        header("Location: /exemplares");
        exit;
    }

    public function getInfo($id){
        if(Exemplar::exists($id)){
            $idEmprestimo = Exemplar::emprestado($id);
            return array(
                "status" => true,
                "exists" => true,
                "emprestado" => $idEmprestimo ? true: false,
                "livro" => Exemplar::listOne($id),
                "emprestimo" => Emprestimo::listOne($idEmprestimo)
    
            );
        }else{
            return array(
                "status" => false
            );
        }
    }


    

}