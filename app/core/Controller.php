<?php 

Class Controller {
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}