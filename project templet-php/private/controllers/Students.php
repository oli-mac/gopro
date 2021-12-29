<?php
//student controller
class Students extends Controller 
{
    public function index($id = null) {
        echo("students control " . $id);
    }
}
