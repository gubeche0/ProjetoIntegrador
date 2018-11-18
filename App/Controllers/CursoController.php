<?php

namespace App\Controllers;

use App\Page;
use App\Model\Curso;


class CursoController extends Controller{
    private $id;
    private $curso;
    
    public function __construct(){
        $this->curso = new Curso();
        
    }
    
    public function pageIndex(){
        $query = isset($_GET["query"]) ? $_GET["query"] : "";
        $this->getPage("outros", array(
            "footer" => false
        ));

        $this->page->setTpl("cursos", array(
            "curso" => Curso::listAll($query)
        ));
    }

    public function pageCreate(){
        $this->getPage("outros", array(
            "footer" => false
        ));
        $this->page->setTpl("cursos-form");
    }

    public function pageEdit($id){
        $this->curso->setId($id);
        $this->curso->loadById();

        $this->getPage("outros", array(
            "footer" => false
        ));
        
        $this->page->setTpl("cursos-form", array(
            "curso" => $this->curso->listOne($id)
        ));
        
    }

    private function loadModel(){
        $this->curso->setNome($_POST["nome"]);
        $this->curso->setAbreviacao($_POST["abreviacao"]);

    }

    public function create(){
        try{
            $this->loadModel();
            $this->curso->create();
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /cursos/create");
            exit;
        }finally{
            Page::setSuccess("Curso cadastrado com sucesso!");
            header("Location: /cursos/create");
            exit;
        }
    }

    public function update($id){
        try{
            $this->loadModel();
            $this->curso->setId($id);
            $this->curso->update();
            
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /cursos");
            exit;
        }finally{
            Page::setSuccess("Curso alterado com sucesso!");
            header("Location: /cursos");
            exit;
        }
    }

    public function delete($id){
        $this->curso->setId($id);
        $this->curso->delete();
        header("Location: /cursos");
        exit;
    }

    


    

}