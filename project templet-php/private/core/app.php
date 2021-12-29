<?php

// main app

class App {
    
    protected $controller = "home";//the class to look for to the task
    protected $method = "index"; //the method to look for to the task
    protected $params = array();

    public function __construct(){
        $URL = $this-> getURL();//fectch the url
        if(file_exists("../private/controllers/".$URL[0].".php")){
             $this ->controller = ucfirst($URL[0]);//set the controller to the url
             unset($URL[0]);//to get the final items to yous as params to the method
        }

        require "../private/controllers/".$this ->controller.".php";//if the file is not found the controller is set to home
        $this ->controller = new $this ->controller();//to create a new instance of the class 
    //now that we can find the class we must know how to 
    // id mathods aswell which the name is set to index at the top
        if(isset($URL[1])){//if some one judt types the class
            if(method_exists($this -> controller,$URL[1])){
            $this -> method = ucfirst($URL[1]);//if the user types and the method is set 
            //it is changed from default value to the value got from the user
            unset($URL[1]);
            }   
        }
        $URL=array_values($URL);//for params to start from index 0
        // echo "<pre>";
        // print_r($URL);
        $this ->params = $URL;
            call_user_func_array([$this ->controller,$this -> method ],$this ->params);
    }


// MVC=model ,view , controller
// is used for this project b/c it makes appdeting easter_days
// view:- user interface showing the resolt 
// model:-does the calculation
// controller:- manages the connection b/n model and view
// from information it gets from url

    private function getURL(){
        $url = isset($_GET['url']) ? $_GET['url'] : "home";//seting a defualt url to the home if the user dont specify one
        return explode("/", filter_var (trim ($url, "/" )), FILTER_SANITIZE_URL);
        // print_r($_GET);
    }

}