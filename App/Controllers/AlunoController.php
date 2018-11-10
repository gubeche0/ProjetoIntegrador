<?php

namespace App\Controllers;

use App\Page;
use App\Model\Aluno;


class AlunoController extends Controller{
    private $id;
    private $page;
    
    public function index(){
        $query = isset($_GET["query"]) ? $_GET["query"] : "";
        $page = new Page(array(
            "page" => "/alunos"
        ));

        // $page->setTpl("alunos", array(
        //     "alunos" => Aluno::listAll($query)
        // ));
    }

    public function create(){

    }

    

}