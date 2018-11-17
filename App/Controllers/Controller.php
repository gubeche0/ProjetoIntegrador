<?php

namespace App\Controllers;

use App\Page;


abstract class Controller{
    protected $page;

    protected function getPage($name = "", $opts = array()){
        $default = array(
            "page" => $name
        );

        
        $this->page = new Page(array_merge($default, $opts));
    }

}