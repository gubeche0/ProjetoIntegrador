<?php

namespace App\Controllers;

use App\Page;
use App\Model\User;


class UserController extends Controller{

    public static function index(){
        $page = new Page(array(
            "header" => false,
            "footer" => false
        ));
        $page->setTpl("login");
    }

    public static function login($email, $senha){
        try{
            User::login($email, $senha);
            header("Location: /");
            exit;
        }catch(\Exception $e){
         
            $page = new Page(array(
                "header" => false,
                "footer" => false
            ));
            $page->setTpl("login", array(
                "erros" => array($e->getMessage())
            ));

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