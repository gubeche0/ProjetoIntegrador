<?php

namespace App\Controllers;

use App\Page;
use App\Model\User;


class UserController extends Controller{

    public function pageIndex(){
        $this->getPage("login", array(
            "header" => false,
            "footer" => false
        ));
        $this->page->setTpl("login");
    }

    public function login($email, $senha){
        try{
            User::login($email, $senha);
            header("Location: /");
            exit;
        }catch(\Exception $e){
            Page::setErros($e->getMessage());
            header("Location: /login");
            exit;
            

        }
    }

    public static function logout(){
        User::logout();
        header("Location: /login");
        exit;
    }

    public static function verifyLogin(){
        User::verifyLogin();
    }

    

}