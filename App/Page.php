<?php


namespace App;
use Rain\Tpl;

class Page{

    const MsgError = "msgErros";
    const MsgSuccess = "msgSuccess";
    private $tpl;
    private $options = [];
    private $defaults = [
        "header" => true,
        "footer" => true,
        "data" =>[],
        "page" => "/"
    ];

    public function __construct($opts = array()){
    
        $this->options = array_merge($this->defaults, $opts);

        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"] . "/views/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . "/views-cache/",
            "debug"         => false // set to false to improve the speed
        );

        Tpl::configure( $config );
        $this->tpl = new Tpl();


        $this->setData($this->options);

        if($this->options["header"] === true) $this->tpl->draw("header");

    }

    private function setData($data = array()){
        
        foreach($data as $key => $value){
            $this->tpl->assign($key, $value);
        }

    }

    public function setTpl($name, $data = [], $returnHTML = false){

        $this->setData($data);
        
        return $this->tpl->draw($name, $returnHTML);

    }

    public function __destruct(){

        if($this->options["footer"] === true) $this->tpl->draw("footer");

    }

    public static function getErros(){
        $erros = (isset($_SESSION[Page::MsgError]) && $_SESSION[Page::MsgError])? $_SESSION[Page::MsgError] : "";
        $_SESSION[Page::MsgError] = null;
        return $erros;
        
    }

    public static function setErros($msg){
        $_SESSION[Page::MsgError][] = $msg;

    }

    public static function getSuccess(){
        $erros = (isset($_SESSION[Page::MsgSuccess]) && $_SESSION[Page::MsgSuccess])? $_SESSION[Page::MsgSuccess] : "";
        $_SESSION[Page::MsgSuccess] = null;
        return $erros;
    }

    public static function setSuccess($msg){
        $_SESSION[Page::MsgSuccess][] = $msg;
    }

}