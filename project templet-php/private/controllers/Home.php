<?php
//home controller
class Home extends Controller 
{
    public function index() {
        echo $this -> view('home');//get the view of the home from the view method in controller
    // we used the url to navigate the folders and the methods for tho hnow what to do
    // in this case it is to load the ui we used aparameter passed from the navigated class
    // to the controller managing the viw and then that method returned the ui file

    }
}
