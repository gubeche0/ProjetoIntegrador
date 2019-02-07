<?php

namespace App\Controllers;

use App\Page;
use App\Model\Aluno;
use App\Model\Curso;
use App\Model\Emprestimo;


class AlunoController extends Controller{
    private $id;
    private $aluno;
    
    public function __construct(){
        $this->aluno = new Aluno();
        
    }
    
    public function pageIndex(){
        $query = isset($_GET["query"]) ? $_GET["query"] : "";
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
        $itemsPerPage = 10;

        $this->getPage("alunos", array(
            "footer" => false
        ));

        $pages = [];

        for ($i=0; $i < Aluno::countPages($query, $itemsPerPage); $i++) { 
            array_push($pages, [
                'href'=>'/alunos?'.http_build_query([
                    'page'=>$i + 1,
                    'query'=>$query
                ]),
                'text'=>$i + 1
            ]);
        }
        

        $this->page->setTpl("alunos", array(
            "alunos" => Aluno::listPage($page, $query, $itemsPerPage),
            "page" => $page,
            "pages" => $pages,
            "query" => $query
        ));
    }

    public function pageInfo($id){
        $this->aluno->setMatricula($id);
        $this->aluno->loadById();

        $aluno = $this->aluno->getValues();
        $curso = Curso::listOne($aluno["idcurso"]);
        $this->getPage("alunos", array(
            "footer" => false
        ));
        $this->page->setTpl("alunos-info", array(
            "aluno" => $this->aluno->getValues(),
            "curso" => $curso,
            "emprestimos" => Emprestimo::listAllOf($this->aluno)
        ));
    }

    public function pageCreate(){
        $this->getPage("alunos", array(
            "footer" => false
        ));
        $this->page->setTpl("alunos-form", array(
            "cursos" => Curso::listAll()
        ));
    }

    public function pageEdit($id){
        $this->aluno->setMatricula($id);

        $this->getPage("alunos", array(
            "footer" => false
        ));
        $this->page->setTpl("alunos-form", array(
            "aluno" => $this->aluno->listOne($id),
            "cursos" => Curso::listAll()
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

    public function update($id){
        try{
            $this->loadModel();
            $this->aluno->setMatricula($id);
            $this->aluno->update();
            
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /alunos");
            exit;
        }finally{
            Page::setSuccess("Aluno(a) alterado(a) com sucesso!");
            header("Location: /alunos");
            exit;
        }
    }

    public function delete($matricula){
        $page = isset($_GET["page"]) ? $_GET["page"] : "";
        $query = isset($_GET["query"]) ? $_GET["query"] : "";
        $this->aluno->setMatricula($matricula);
        $this->aluno->delete();
        header("Location: /alunos?page={$page}&query={$query}");
        exit;
    }

    


    

}