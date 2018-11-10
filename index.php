<?php

    require_once("vendor/autoload.php");

    use Slim\Slim;
    use App\Controllers\UserController;
    use App\Controllers\AlunoController;
    use App\Page;
    session_start();

    $app = new Slim();
    $app->config("debug", true);

    $app->get("/", function(){
        UserController::verifyLogin();        
        $page = new Page(array(
            "page" => "/alunos"
        ));
        
    });

    $app->get("/login", function(){
        UserController::index();
    });

    $app->post("/login", function(){
       UserController::login($_POST["email"], $_POST["pass"]);
    });

    $app->get("/logout", function(){
        UserController::logout();
    });

    $app->get("/alunos", function(){
        UserController::verifyLogin();
        $aluno = new AlunoController();
        $aluno->index();
        
    });

    $app->get("/alunos/create", function(){
        UserController::verifyLogin();        
        $aluno = new AlunoController();
        $aluno->index();
    });

    $app->post("/alunos/create", function(){
        
    });

    $app->get("/alunos/:id/edit", function($id){
        
    });

    $app->post("/alunos/:id/edit", function($id){
        
    });

    $app->get("/alunos/:id/delete", function($id){
        
    });

    $app->get("/emprestimos", function(){

    });
    
    $app->get("/emprestimos/create", function(){

    });

    $app->post("/emprestimos/create", function(){

    });

    $app->get("/emprestimos/:id/edit", function($id){
        
    });

    $app->post("/emprestimos/:id/edit", function($id){
        
    });

    $app->run();