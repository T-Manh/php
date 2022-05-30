<?php
class App{
//http://localhost/MVC/index.php?url=Home/SayHi/1/3/4
    protected $controller="Home";
    protected $action="List";
    protected $params=[];
    function __construct(){
        //Array ( [0] => Home [1] => List [2] => 1 [3] => 2 [4] => 4 )
        $arr = $this->UrlProcess();
        // xuly Controller
        if(file_exists("./mvc/controllers/".$arr[0].".php")){
            $this->controller = $arr[0];
        unset($arr[0]);
        }
        require_once "./mvc/controllers/".$this->controller.".php";
        $this->controller = new $this->controller;
        //xuly Action
        if(isset($arr[1])){
            if(method_exists($this->controller, $arr[1])){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
         //xuly Params
        $this->params = $arr?array_values($arr):[];
        call_user_func_array([$this->controller, $this->action], $this->params );
    }
    function UrlProcess(){
        if(isset($_GET["url"])){
           return explode("/",   filter_var(trim($u= $_GET["url"], "/")));
          
        }
    }
}
?>