<?php

namespace App\Controllers;

use App\Page;
use App\Model\Emprestimo;
use App\Model\Aluno;
use App\Model\Exemplar;



class EmprestimoController extends Controller{
    private $id;
    private $emprestimo;
    
    public function __construct(){
        $this->emprestimo = new Emprestimo();
        
    }
    
    public function pageIndex(){
        $query = isset($_GET["query"]) ? $_GET["query"] : "";
        $this->getPage("emprestimos", array(
            "footer" => false
        ));

        $this->page->setTpl("emprestimos", array(
            "emprestimos" => Emprestimo::listAll($query)
        ));
    }

    public function pageCreate(){
        $this->getPage("emprestimos", array(
            "footer" => false
        ));
        $this->page->setTpl("emprestimos-form", array(
            "alunos" => Aluno::listAll(),
            "exemplares" => Exemplar::listAll()
        ));
    }

    public function pageDevolver(){
        $this->getPage("emprestimos", array(
            "footer" => false
        ));
        $this->page->setTpl("emprestimos-devolver");
    }

    private function loadModel(){
        
        $this->emprestimo->setExemplar($_POST["exemplar"]);
        $this->emprestimo->setAluno($_POST["aluno"]);
        $this->emprestimo->setPeriodoEntrega($_POST["periodoEntrega"]);
    }

    public function create(){
        try{
            $this->loadModel();
            $this->emprestimo->create();
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /emprestimos/create");
            exit;
        }finally{
            Page::setSuccess("emprestimo cadastrado com sucesso!");
            header("Location: /emprestimos/create");
            exit;
        }
    }


    public function devolver(){
        try{
            
            $status = isset($_POST["statusLivro"]) ? $_POST["idEmprestimo"] : "Não Utilizavel";
            $exemplar = isset($_POST["idExemplar"]) ? $_POST["idExemplar"] : "o";
            $this->emprestimo->devolver($_POST["idEmprestimo"], $status, $exemplar);
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /emprestimos/devolver");
            exit;
        }finally{
            Page::setSuccess("Livro devolvido com sucesso!");
            header("Location: /emprestimos/devolver");
            exit;
        }
    }




    

}