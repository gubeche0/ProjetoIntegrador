<?php

namespace App\Controllers;

use App\Page;
use App\Model\Aluno;


class AlunoController extends Controller{
    private $id;
    private $aluno;
    
    public function __construct(){
        $this->aluno = new Aluno();
        
    }
    
    public function pageIndex(){
        $query = isset($_GET["query"]) ? $_GET["query"] : "";
        $this->getPage("alunos");

        $this->page->setTpl("alunos", array(
            "alunos" => Aluno::listAll($query)
        ));
    }

    public function pageCreate(){
        $this->getPage("alunos", array(
            "footer" => false
        ));
        $this->page->setTpl("alunos-form");
    }

    public function pageEdit($id){
        $this->aluno->setMatricula($id);
        $this->aluno->loadById();

        $this->getPage("alunos", array(
            "footer" => false
        ));
        $this->page->setTpl("alunos-form", array(
            "aluno" => $this->aluno->getValues()
        ));
        
    }

    private function loadModel(){
        
        $this->aluno->setMatricula($_POST["matricula"]);
        $this->aluno->setNome($_POST["nome"]);
        $this->aluno->setEmail($_POST["email"]);
        $this->aluno->setCurso($_POST["curso"]);
    }

    public function create(){
        try{
            $this->loadModel();
            $this->aluno->create();
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /alunos/create");
            exit;
        }finally{
            Page::setSuccess("Aluno(a) cadastrado(a) com sucesso!");
            header("Location: /alunos/create");
            exit;
        }
    }

    public function update(){
        try{
            $this->loadModel();
            $this->aluno->update();
            
        }catch(\Exception $e){
            var_dump($e);
            exit;
            Page::setErros($e->getMessage());
        }finally{
            Page::setSuccess("Aluno(a) alterado(a) com sucesso!");
            header("Location: /alunos");
            exit;
        }
    }

    public function delete($matricula){
        $this->aluno->setMatricula($matricula);
        $this->aluno->delete();
        header("Location: /alunos");
        exit;
    }

    


    

}