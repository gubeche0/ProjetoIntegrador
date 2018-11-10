<?php

    require_once("vendor/autoload.php");

    use Slim\Slim;
    use App\Model\User;
    use App\Controllers\UserController;
    use App\Page;
    session_start();

    $app = new Slim();
    $app->config("debug", true);

    $app->get("/", function(){
        User::verifyLogin();
        $page = new page(array(
            "header" => true,
            "footer" => false
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

    $app->get("/aluno", function(){
        
    });

    $app->run();