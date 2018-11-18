<?php

    require_once("vendor/autoload.php");

    use Slim\Slim;
    use App\Page;
    use App\Controllers\UserController;
    use App\Controllers\AlunoController;
    use App\Controllers\CategoriaController;
    use App\Controllers\CursoController;
    use App\Controllers\LivroController;
    use App\Controllers\ExemplarController;
    use App\Controllers\EmprestimoController;

    session_start();

    $app = new Slim();
    $app->config("debug", true);

    $app->get("/", function(){
        UserController::verifyLogin();        
        $page = new Page(array(
            "page" => "index",
            "header" => false,
            "footer" => false
        ));
        $page->setTpl("index");
        
    });

    $app->get("/login", function(){
        $user = new UserController();
        $user->pageIndex();
    });

    $app->post("/login", function(){
        $user = new UserController();
        $user->login($_POST["email"], $_POST["pass"]);
    });

    $app->get("/logout", function(){
        UserController::logout();
    });


    // Alunos
    $app->get("/alunos", function(){
        UserController::verifyLogin();
        $aluno = new AlunoController();
        $aluno->pageIndex();
        
    });

    $app->get("/alunos/create", function(){
        UserController::verifyLogin();        
        $aluno = new AlunoController();
        $aluno->pageCreate();
        
    });

    $app->post("/alunos/create", function(){
        UserController::verifyLogin();
        $aluno = new AlunoController();
        $aluno->create();
    });


    $app->get("/alunos/:id/edit", function($id){
        UserController::verifyLogin();
        $aluno = new AlunoController();
        $aluno->pageEdit($id);
    });

    $app->post("/alunos/:id/edit", function($id){
        UserController::verifyLogin();
        $aluno = new AlunoController();
        $aluno->update($id);
        
    });

    $app->get("/alunos/:id/delete", function($id){
        UserController::verifyLogin();
        $aluno = new AlunoController();
        $aluno->delete($id);
    });




    // Categorias
    $app->get("/categorias", function(){
        UserController::verifyLogin();
        $categoria = new  CategoriaController();
        $categoria->pageIndex();
        
    });

    $app->get("/categorias/create", function(){
        UserController::verifyLogin();        
        $categoria = new CategoriaController();
        $categoria->pageCreate();
        
    });

    $app->post("/categorias/create", function(){
        UserController::verifyLogin();
        $categoria = new CategoriaController();
        $categoria->create();
    });


    $app->get("/categorias/:id/edit", function($id){
        UserController::verifyLogin();
        $categoria = new CategoriaController();
        $categoria->pageEdit($id);
    });

    $app->post("/categorias/:id/edit", function($id){
        UserController::verifyLogin();
        $categoria = new CategoriaController();
        $categoria->update($id);
        
    });

    $app->get("/categorias/:id/delete", function($id){
        UserController::verifyLogin();
        $categoria = new CategoriaController();
        $categoria->delete($id);
    });



    // Cursos
    $app->get("/cursos", function(){
        UserController::verifyLogin();
        $curso = new CursoController();
        $curso->pageIndex();
        
    });

    $app->get("/cursos/create", function(){
        UserController::verifyLogin();        
        $curso = new CursoController();
        $curso->pageCreate();
        
    });

    $app->post("/cursos/create", function(){
        UserController::verifyLogin();
        $curso = new CursoController();
        $curso->create();
    });


    $app->get("/cursos/:id/edit", function($id){
        UserController::verifyLogin();
        $curso = new CursoController();
        $curso->pageEdit($id);
    });

    $app->post("/cursos/:id/edit", function($id){
        UserController::verifyLogin();
        $curso = new CursoController();
        $curso->update($id);
        
    });

    $app->get("/cursos/:id/delete", function($id){
        UserController::verifyLogin();
        $curso = new CursoController();
        $curso->delete($id);
    });


    //Livros
    $app->get("/livros", function(){
        UserController::verifyLogin();
        $livro = new LivroController();
        $livro->pageIndex();
        
    });

    $app->get("/livros/create", function(){
        UserController::verifyLogin();        
        $livro = new LivroController();
        $livro->pageCreate();
        
    });

    $app->post("/livros/create", function(){
        UserController::verifyLogin();
        $livro = new LivroController();
        $livro->create();
    });


    $app->get("/livros/:id/edit", function($id){
        UserController::verifyLogin();
        $livro = new LivroController();
        $livro->pageEdit($id);
    });

    $app->post("/livros/:id/edit", function($id){
        UserController::verifyLogin();
        $livro = new LivroController();
        $livro->update($id);
        
    });

    $app->get("/livros/:id/delete", function($id){
        UserController::verifyLogin();
        $livro = new LivroController();
        $livro->delete($id);
    });


    // exemplares
    $app->get("/exemplares", function(){
        UserController::verifyLogin();
        $exemplar = new ExemplarController();
        $exemplar->pageIndex();
        
    });

    $app->get("/exemplares/create", function(){
        UserController::verifyLogin();        
        $exemplar = new ExemplarController();
        $exemplar->pageCreate();
        
    });

    $app->post("/exemplares/create", function(){
        UserController::verifyLogin();
        $exemplar = new ExemplarController();
        $exemplar->create();
    });


    $app->get("/exemplares/:id/edit", function($id){
        UserController::verifyLogin();
        $exemplar = new ExemplarController();
        $exemplar->pageEdit($id);
    });

    $app->post("/exemplares/:id/edit", function($id){
        UserController::verifyLogin();
        $exemplar = new ExemplarController();
        $exemplar->update($id);
        
    });

    $app->get("/exemplares/:id/delete", function($id){
        UserController::verifyLogin();
        $exemplar = new ExemplarController();
        $exemplar->delete($id);
    });



    //emprestimos
    $app->get("/emprestimos", function(){
        UserController::verifyLogin();
        $empresimo = new EmprestimoController();
        $empresimo->pageIndex();
        
    });

    $app->get("/emprestimos/create", function(){
        UserController::verifyLogin();        
        $emprestimo = new EmprestimoController();
        $emprestimo->pageCreate();
        
    });

    $app->post("/emprestimos/create", function(){
        UserController::verifyLogin();
        $emprestimo = new EmprestimoController();
        $emprestimo->create();
    });

    $app->get("/emprestimos/devolver", function(){
        UserController::verifyLogin();
        $emprestimos = new EmprestimoController();
        $emprestimos->pageDevolver();
    });

    $app->post("/emprestimos/devolver", function(){
        UserController::verifyLogin();
        $emprestimos = new EmprestimoController();
        $emprestimos->Devolver();
    });






    $app->post("/api/exemplares/info", function(){
        UserController::verifyLogin();
        
        $exemplar = new ExemplarController();
        $id = $_POST["id"];

        echo json_encode($exemplar->getInfo($id));
        // echo json_encode(array("status" => true));
    });

    $app->run();